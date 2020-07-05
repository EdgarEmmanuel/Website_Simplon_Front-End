<?php


include_once("Mysql_connect_class.php");

 function addCompteBloq($numCompte,$cleRib,$dateOuv,$idCl,$idResp,$idAgence,$solde,$dateDebloc){
        //ouverture de la connexion 
        $conn = connect();

        //creation de la requete pour table compte
        $sql_compte = "INSERT INTO comptes VALUES(null,'$numCompte',$cleRib,$idCl,$idResp,'$dateOuv',$idAgence)";

       //execution de la requete pour la table compte
       $conn->exec($sql_compte);

         //recuperation du lastInsertId apres insertion dans compte
        $idCompte = $conn->lastInsertId();

        //ensuite creation et execution de la requete pour la table compte_epargne
        $sql_cbloque = "INSERT INTO compte_bloque VALUES('$dateDebloc',null,$idCompte,$solde)";

        $conn->exec($sql_cbloque);


        return $idCompte;
    }

       function getFraisWithTypBloque(){
        $conn = connect();

        $sql = "SELECT montant from frais_compte where typeCompte='bloque' ";

        $val=$conn->query($sql)->fetch();

        return $val["montant"];
    }

       function generateNumForCompteBloque(){
        $conn = connect();

        $sql ="SELECT count(id_compte_bloque) as num from compte_bloque";

        $id = $conn->query($sql)->fetch();

        $val = (int)$id["num"] +1 ;

        return "CB".$val ;
    }

       function getDurationBetweenDate($date1 , $date2){
        //compare two date

        $diff = abs(strtotime($date2) - strtotime($date1));

        $years = floor($diff / (365*60*60*24));

        if($years>=1){
            return 1;
        }else{
            return 2;
        }
    }

    function UpdateForCompteBloque($idCompte,$date){
        $conn = connect();

        $sql = "INSERT INTO etat_compte VALUES(null,'BLOQUE','$date',$idCompte)";

        return $val = $conn->exec($sql);
    }

    





?>