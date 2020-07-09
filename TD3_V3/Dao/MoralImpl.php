<?php

namespace App\Dao;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

// include_once("Mysql_connect_class.php");
// include_once(SRC_DAO."/ICMoral_interface.php");
// include_once(SRC_MODELS."/CMoral_class.php");

class MoralImpl implements IClientMoral {
    public function addClient(\App\Models\Client_Moral $client){
        MySqlConnection::getConnection();

        $adresse  = $client->getAdresse();
         $tel  = $client->getTelephone();
         $mail = $client->getMail();
         $type = $client->getTypeEntreprise();
         $activite = $client->getActiviteEntreprise();
         $nomEnter = $client->getNomEntreprise();
         $matricule = $client->getMatricule();
         $ninea=$client->getNinea();

         //creation et execution de la requete pour inserer un client 
         $sql_clients = "INSERT INTO clients VALUES (null,'$tel','$mail','$matricule')";

         MySqlConnection::executeUpdate($sql_clients);

         //recuperation du lastInsertId dans la table clients
         $idClient = MySqlConnection::lastInsertId();

         //creation et execution de la requete pour inserer un client
         $sql_cmoral = "INSERT INTO client_moral VALUES(null,'$type','$activite',$idClient,'$nomEnter','$adresse',$ninea)";

         MySqlConnection::executeUpdate($sql_cmoral);


         return $idClient;
    }

    public function getMatriculeMoral(){
        MySqlConnection::getConnection();

        $sql ="SELECT count(idClient) as num FROM clients where SUBSTR(matricule,1,3) = 'BCM' ";

        $val = MySqlConnection::execOne($sql);
        //"BPS".(int)
        $tot = (int)$val->num +1;
        return "BCM".(int)$tot;
    }

    public function getClientMoralById($id){
        MySqlConnection::getConnection();

        $sql ="SELECT nom_entreprise from client_moral where idClient=$id ";

        $client = MySqlConnection::execOne($sql);

        $nomComplet = $client->nom_entreprise;

        return $nomComplet;
    }


    public function getClientMoralByMatricule($matricule){
        MySqlConnection::getConnection();
        $sql = "SELECT * from clients where matricule= '$matricule' ";

        $result = MySqlConnection::execOne($sql);
        return $result;
    }

}




?>