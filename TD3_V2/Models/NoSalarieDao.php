<?php 

include_once("Mysql_connect_class.php");


function addCNoSalarie($tel,$mail,$nom,$prenom,$activite,$cni,$matricule,$localisation){
        $conn = connect();

        //creation et execution de la requete pour inserer un client 
        $sql_clients = "INSERT INTO clients VALUES (null,'$tel','$mail','$matricule')";

        $conn->exec($sql_clients);

        //recuperation du lastInsertId dans la table clients
        $idClient = $conn->lastInsertId();

        //creation et execution de la requete pour inserer un client_non_salarie
        $sql_cnoSalarie = "INSERT INTO client_non_salarie VALUES(null,'$prenom','$activite',$idClient,'$nom','$cni','$localisation')";

        $conn->exec($sql_cnoSalarie);


        return $idClient;
    }

    function getMatriculeNoSalarie(){
        $conn = connect();

        $sql ="SELECT count(idClient) as num FROM clients where SUBSTR(matricule,1,3) = 'BPNS' ";

        $val = $conn->query($sql)->fetch();
        //"BPS".(int)
        $tot = (int)$val["num"] +1;
        return "BPNS-".(int)$tot;
    }

    function getClientNoSById($id){
        $conn = connect();

        $sql ="SELECT nom , prenom from client_non_salarie where id_non_salarie=$id ";

        $client = $conn->query($sql)->fetch();

        $nomComplet = $client["nom"]." ".$client["prenom"];

        return $nomComplet;
    }







?>