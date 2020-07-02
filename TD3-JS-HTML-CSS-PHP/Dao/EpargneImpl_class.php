<?php

include_once("Mysql_connect_class.php");
include_once(SRC_DAO."/ICOEpargne_interface.php");
include_once(SRC_MODELS."/ComptEpargne_class.php");

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
        // var_dump($sql_compte);
        // die();

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

        $val=MysqlConnection::execOne($sql);

        return $val->montant;
    }

    public function UpdateEtatAtAdding($idCompte,$date){
        MysqlConnection::getConnection();

        $sql = "INSERT INTO etat_compte VALUES(null,'OUVERT','$date',$idCompte)";

        return $val = MysqlConnection::executeUpdate($sql);
    }



    public function generateNumCompte(){
        MysqlConnection::getConnection();

        $sql ="SELECT count(id_compte_epargne) as num from compte_epargne";

        $id = MysqlConnection::execOne($sql);

        $val = (int)$id->num +1 ;

        return "CE".$val ;
    }

}


?>