<?php 

include_once("Mysql_connect_class.php");

    function addSalarie($tel,$mail,$nom,$adrEntreprise,$nomEnter,$prenom,$cni,$matricule,$profession){
        $conn = connect();   

        //creation et execution de la requete pour inserer un client 
        $sql_clients = "INSERT INTO clients VALUES (null,'$tel','$mail','$matricule')";

        $conn->exec($sql_clients);

        //recuperation du lastInsertId dans la table clients
        $idClient = $conn->lastInsertId();

        //creation et execution de la requete pour inserer un client
        $sql_csalarie = "INSERT INTO client_salarie VALUES(null,'$prenom','$profession','$nomEnter','$adrEntreprise',$idClient,'$nom','$cni')";
        // var_dump($sql_csalarie);
        // die();

        $conn->exec($sql_csalarie);


        return $idClient;
    }

    function getMatSalarie(){
        $conn = connect();

        $sql ="SELECT count(idClient) as num FROM clients where SUBSTR(matricule,1,3) = 'BPS' ";

        $val = $conn->query($sql)->fetch();
        //"BPS".(int)
        $tot = (int)$val["num"] +1;
        return "BPS".(int)$tot;
    }

    function getClientSalarieById($id){
        $conn = connect();

        $sql ="SELECT nom , prenom from client_salarie where idClient=$id ";

        $client =  $conn->query($sql)->fetch();
        // var_dump($client);
        // die();

        $nomComplet = $client["nom"]." ".$client["prenom"];

        return $nomComplet;
    }







?>