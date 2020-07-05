<?php

include_once("Mysql_connect_class.php");


function addClientMoral($adresse,$tel,$mail,$type,$activite,$nomEnter,$matricule,$ninea){
        $conn = connect();

         //creation et execution de la requete pour inserer un client 
         $sql_clients = "INSERT INTO clients VALUES (null,'$tel','$mail','$matricule')";

         $conn->exec($sql_clients);

         //recuperation du lastInsertId dans la table clients
         $idClient = $conn->lastInsertId();

         //creation et execution de la requete pour inserer un client
         $sql_cmoral = "INSERT INTO client_moral VALUES(null,'$type','$activite',$idClient,'$nomEnter','$adresse',$ninea)";

        $conn->exec($sql_cmoral);

         return $idClient;
    }

         function getMatriculeMoral(){
            $conn = connect();

        $sql ="SELECT count(idClient) as num FROM clients where SUBSTR(matricule,1,3) = 'BPMS' ";

        $val = $conn->query($sql)->fetch();
        //"BPS".(int)
        $tot = (int)$val +1;
        return "BPMS-".(int)$tot;
    }

         function getClientMoralById($id){
            $conn = connect();

        $sql ="SELECT nom_entreprise from client_moral where id_entreprise=$id ";

        $client = $conn->query($sql)->fetch();

        $nomComplet = $client["nom_entreprise"];

        return $nomComplet;
    }






?>