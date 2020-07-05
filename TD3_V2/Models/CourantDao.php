<?php

include_once("Mysql_connect_class.php");


function addCourant($numCompte, $cleRib,$dateOuv, $idCl, $idResp, $idAgence, $solde,$adresse, $nomEntreprise, $raisonSocial,$idAgios){
        //ouverture de la connexion 
        $conn = connect();

        //creation de la requete pour table compte
        $sql_compte = "INSERT INTO comptes VALUES(null,'$numCompte',$cleRib,$idCl,$idResp,'$dateOuv',$idAgence)";

       //execution de la requete pour la table compte
       $conn->exec($sql_compte);

         //recuperation du lastInsertId apres insertion dans compte
         $idCompte = $conn->lastInsertId();

        //ensuite creation et execution de la requete pour la table compte_epargne
        $sql_courant = "INSERT INTO compte_courant VALUES(null,'$adresse','$nomEntreprise','$raisonSocial',$idCompte,$solde,$idAgios)";

        $conn->exec($sql_courant);


        return $idCompte;
    }

    function getFraisCompteTypeCourant(){
        $conn = connect();

        $sql = "SELECT montant from frais_compte where typeCompte='courant' ";

        $val=$conn->query($sql)->fetch();

        return $val["montant"];
    }

    function getAgiosEntretien(){
        $conn = connect();
        $sql = "SELECT id_agios FROM agios where descritpion='entretien'";
        $val = $conn->query($sql)->fetch();
        return $val["id_agios"];
    }

  function generateNumCompteC(){
    $conn = connect();

        $sql ="SELECT count(id_compte_courant) as num from compte_courant";

        $id =  $conn->query($sql)->fetch();

        $val = (int)$id["num"] +1 ;

        return "CC".$val ;
    }


   function UpdateForCompteCourant($idCompte,$date){
    $conn = connect();

        $sql = "INSERT INTO etat_compte VALUES(null,'OUVERT','$date',$idCompte)";

        return $val =  $conn->exec($sql);
    }

    














?>