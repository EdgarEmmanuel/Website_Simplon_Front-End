<?php

include_once("Mysql_connect_class.php");
include_once(SRC_DAO."/ICOEpargne_interface.php");

class EpargneImpl implements ICOEpargne {
    public function add(ComptEpargne $compte){
        //ouverture de la connexion 
        MySqlConnection::getConnection();

        //recuperation des donnees
        $numCompte = $compte->getNumCompte();
        $cleRib = $compte->getCleRib();
        $dateOuv=$compte->getDateOuvert();
        $idCl=$compte->getIdClient();
        $idResp=$compte->getIdRespo();
        $idAgence=$compte->getIdAgence();
        $solde=$compte->getSolde();

        //creation de la requete pour table compte
        $sql_compte = "INSERT INTO comptes VALUES(null,'$numCompte',$cleRib,$idCl,$idResp,'$dateOuv',$idAgence)";

       //execution de la requete pour la table compte
        MysqlConnection::executeUpdate($sql_compte);

         //recuperation du lastInsertId apres insertion dans compte
        $idCompte = MysqlConnection::lastInsertId();

        //ensuite creation et execution de la requete pour la table compte_epargne
        $sql_cepargne = "INSERT INTO compte_epargne VALUES(null,$idCompte,$solde)";

        MysqlConnection::executeUpdate($sql_cepargne);


        return $idCompte;


    }

    public function getFraisCompteTypeEpargne(){
        MysqlConnection::getConnection();

        $sql = "SELECT montant from frais_compte where typeCompte='epargne' ";

        return MysqlConnection::execOne($sql);
    }

}


?>