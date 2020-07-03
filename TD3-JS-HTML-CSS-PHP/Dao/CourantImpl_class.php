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
        $solde=$compte->getSolde();
        $adresse = $compte->getAdresse();
        $nomEntreprise = $compte->getNomEntreprise();
        $raisonSocial = $compte->getRaisonSoc();
        $solde = $compte->getSolde();
        $idAgios = $compte->getIdAgence();

        //creation de la requete pour table compte
        $sql_compte = "INSERT INTO comptes VALUES(null,'$numCompte',$cleRib,$idCl,$idResp,'$dateOuv',$idAgence)";

       //execution de la requete pour la table compte
        MysqlConnection::executeUpdate($sql_compte);

         //recuperation du lastInsertId apres insertion dans compte
        $idCompte = MysqlConnection::lastInsertId();

        //ensuite creation et execution de la requete pour la table compte_epargne
        $sql_courant = "INSERT INTO compte_courant VALUES(null,'$adresse','$nomEntreprise','$raisonSocial',$idCompte,$solde,$idAgios)";

        MysqlConnection::executeUpdate($sql_courant);


        return $idCompte;
    }

    public function getFraisCompteTypeCourant(){
        MysqlConnection::getConnection();

        $sql = "SELECT montant from frais_compte where typeCompte='courant' ";

        $val=MysqlConnection::execOne($sql);

        return $val->montant;
    }

    public function getAgiosEntretien(){
        MysqlConnection::getConnection();

        $sql = "SELECT id_agios FROM agios where descritpion='entretien'";

        $val = MysqlConnection::execOne($sql);

        return $val->id_agios;
    }

    public function generateNumCompte(){
        MysqlConnection::getConnection();

        $sql ="SELECT count(id_compte_courant) as num from compte_courant";

        $id = MysqlConnection::execOne($sql);

        $val = (int)$id->num +1 ;

        return "CC".$val ;
    }


    public function UpdateForCompteBloque($idCompte,$date){
        MysqlConnection::getConnection();

        $sql = "INSERT INTO etat_compte VALUES(null,'OUVERT','$date',$idCompte)";

        return $val = MysqlConnection::executeUpdate($sql);
    }
}

    














?>