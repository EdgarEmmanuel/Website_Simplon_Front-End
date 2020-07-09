<?php
namespace App\Dao;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

// include_once("Mysql_connect_class.php");
// include_once(SRC_MODELS."/ComptBloque_class.php");
// include_once(SRC_DAO."/ICO_Bloque_interface.php");


class BloqueImpl implements ICOBloque{
    public function add(\App\Models\ComptBloque $compte){
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
        $dateDebloc = $compte->getDateDeblocage();

        //creation de la requete pour table compte
        $sql_compte = "INSERT INTO comptes VALUES(null,'$numCompte',$cleRib,$idCl,$idResp,'$dateOuv',$idAgence)";

       //execution de la requete pour la table compte
        MySqlConnection::executeUpdate($sql_compte);

         //recuperation du lastInsertId apres insertion dans compte
        $idCompte = MySqlConnection::lastInsertId();

        //ensuite creation et execution de la requete pour la table compte_epargne
        $sql_cbloque = "INSERT INTO compte_bloque VALUES('$dateDebloc',null,$idCompte,$solde)";

        MySqlConnection::executeUpdate($sql_cbloque);


        return $idCompte;
    }

    public function getFraisWithTypBloque(){
        MysqlConnection::getConnection();

        $sql = "SELECT montant from frais_compte where typeCompte='bloque' ";

        $val=MysqlConnection::execOne($sql);

        return $val->montant;
    }

    public function generateNumForCompteBloque(){

        $sql ="SELECT count(id_compte_bloque) as num from compte_bloque";

        $id = MysqlConnection::execOne($sql);

        $val = (int)$id->num +1 ;

        return "CB".$val ;
    }

    public function getDurationBetweenDate($date1 , $date2){
        //compare two date

        $diff = abs(strtotime($date2) - strtotime($date1));

        $years = floor($diff / (365*60*60*24));

        if($years>=1){
            return 1;
        }else{
            return 2;
        }
    }

    public function UpdateForCompteBloque($idCompte,$date){
        MysqlConnection::getConnection();

        $sql = "INSERT INTO etat_compte VALUES(null,'BLOQUE','$date',$idCompte)";

        return $val = MysqlConnection::executeUpdate($sql);
    }

    
}













?>