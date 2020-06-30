<?php

include_once("Mysql_connect_class.php");
include_once(SRC_MODELS."/ComptCourant_class.php");
include_once(SRC_DAO."/ICO_Courant_interface.php");


class CourantImpl implements ICOCourant{
    public function add(ComptCourant $compte){
        //ouverture de la connexion 
        MySqlConnection::getConnection();

        //recuperation des donnees 
        //$adres,$nomEnter,$raison,$solde
        $numCompte = $compte->getNumCompte();
        $cleRib = $compte->getCleRib();
        $dateOuv=$compte->getDateOuvert();
        $idCl=$compte->getIdClient();
        $idResp=$compte->getIdRespo();
        $idAgence=$compte->getIdAgence();
        $idAgios=$compte->getIdAgios();
        $solde=$compte->getSolde();
        $adresse = $compte->getAdresse();
        $nomEntreprise = $compte->getNomEntreprise();
        $raisonSocial = $compte->getRaisonSoc();
        $solde = $compte->getSolde();

        //creation de la requete pour table compte
        $sql_compte = "INSERT INTO comptes VALUES(null,'$numCompte',$cleRib,$idCl,$idResp,'$dateOuv',$idAgence,$idAgios)";

       //execution de la requete pour la table compte
        MysqlConnection::executeUpdate($sql_compte);

         //recuperation du lastInsertId apres insertion dans compte
        $idCompte = MysqlConnection::lastInsertId();

        //ensuite creation et execution de la requete pour la table compte_epargne
        $sql_courant = "INSERT INTO compte_courant VALUES(null,'$adresse','$nomEntreprise','$raisonSocial',$idCompte,$solde)";

        MysqlConnection::executeUpdate($sql_courant);


        return $idCompte;
    }

    
}













?>