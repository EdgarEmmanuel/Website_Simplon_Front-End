<?php


include_once("Mysql_connect_class.php");
include_once(SRC_MODELS."/ComptBloque_class.php");
include_once(SRC_DAO."/ICO_Bloque_interface.php");


class BloqueImpl implements ICOCourant{
    public function add(ComptBloque $compte){
        //ouverture de la connexion 
        MySqlConnection::getConnection();

        //recuperation des donnees 
        $numCompte = $compte->getNumCompte();
        $cleRib = $compte->getCleRib();
        $dateOuv=$compte->getDateOuvert();
        $idCl=$compte->getIdClient();
        $idResp=$compte->getIdRespo();
        $idAgence=$compte->getIdAgence();
        $idAgios=$compte->getIdAgios();
        $solde=$compte->getSolde();
        $fraisCompte=$compte->getFraisOuverture();
        $dateDebloc = $compte->getDateDeblocage();

        //creation de la requete pour table compte
        $sql_compte = "INSERT INTO comptes VALUES(null,'$numCompte',$cleRib,$idCl,$idResp,'$dateOuv',$idAgence,$idAgios)";

       //execution de la requete pour la table compte
        MysqlConnection::executeUpdate($sql_compte);

         //recuperation du lastInsertId apres insertion dans compte
        $idCompte = MysqlConnection::lastInsertId();

        //ensuite creation et execution de la requete pour la table compte_epargne
        $sql_cbloque = "INSERT INTO compte_bloque VALUES($fraisCompte,'$dateDebloc',null,$idCompte,$solde)";

        MysqlConnection::executeUpdate($sql_cbloque);


        return $idCompte;
    }

    
}













?>