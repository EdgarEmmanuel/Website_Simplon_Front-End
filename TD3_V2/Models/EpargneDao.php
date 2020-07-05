<?php

include_once("Mysql_connect_class.php");


function addEpargne($numCompte,$cleRib,$dateOuv,$idCl,$idResp,$idAgence,$solde){
        //ouverture de la connexion 
        $conn = connect();


        //creation de la requete pour table compte
        $sql_compte = "INSERT INTO comptes VALUES(null,'$numCompte',$cleRib,$idCl,$idResp,'$dateOuv',$idAgence)";
        // var_dump($sql_compte);
        // die();

       //execution de la requete pour la table compte
        $conn->exec($sql_compte);

         //recuperation du lastInsertId apres insertion dans compte
        $idCompte = $conn->lastInsertId();

        //ensuite creation et execution de la requete pour la table compte_epargne
        $sql_cepargne = "INSERT INTO compte_epargne VALUES(null,$idCompte,$solde)";

      $conn->exec($sql_cepargne);


        return $idCompte;


    }


    function UpdateEtatEpargneAtAdding($idCompte,$dateOuvert){
        $conn = connect();

        $sql = "INSERT INTO etat_compte VALUES(null,'BLOQUE','$dateOuvert',$idCompte)";

        return $val = $conn->exec($sql);
    }

        function getFraisCompteTypeEpargne(){
            $conn = connect();

        $sql = "SELECT montant from frais_compte where typeCompte='epargne' ";

        $val=$conn->query($sql)->fetch();

        return $val["montant"];
    }

        function UpdateEtatAtAdding($idCompte,$date){
            $conn = connect();

        $sql = "INSERT INTO etat_compte VALUES(null,'OUVERT','$date',$idCompte)";

        return $val = $conn->exec($sql);
    }



        function generateNumCompteEpargne(){
            $conn = connect();

        $sql ="SELECT count(id_compte_epargne) as num from compte_epargne";

        $id = $conn->query($sql)->fetch();

        $val = (int)$id["num"] +1 ;

        return "CE".$val ;
    }


?>