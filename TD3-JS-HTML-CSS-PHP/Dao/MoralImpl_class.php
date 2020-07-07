<?php

include_once("Mysql_connect_class.php");
include_once(SRC_DAO."/ICMoral_interface.php");
include_once(SRC_MODELS."/CMoral_class.php");

class MoralImpl implements IClientMoral {
    public function addClient(Client_Moral $client){
        MysqlConnection::getConnection();

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

         MYSqlConnection::executeUpdate($sql_clients);

         //recuperation du lastInsertId dans la table clients
         $idClient = MysqlConnection::lastInsertId();

         //creation et execution de la requete pour inserer un client
         $sql_cmoral = "INSERT INTO client_moral VALUES(null,'$type','$activite',$idClient,'$nomEnter','$adresse',$ninea)";

         MysqlConnection::executeUpdate($sql_cmoral);


         return $idClient;
    }

    public function getMatriculeMoral(){
        MysqlConnection::getConnection();

        $sql ="SELECT count(idClient) as num FROM clients where SUBSTR(matricule,1,3) = 'BCM' ";

        $val = MysqlConnection::execOne($sql);
        //"BPS".(int)
        $tot = (int)$val->num +1;
        return "BCM".(int)$tot;
    }

    public function getClientMoralById($id){
        MysqlConnection::getConnection();

        $sql ="SELECT nom_entreprise from client_moral where idClient=$id ";

        $client = MysqlConnection::execOne($sql);

        $nomComplet = $client->nom_entreprise;

        return $nomComplet;
    }


    public function getClientMoralByMatricule($matricule){
        MysqlConnection::getConnection();
        $sql = "SELECT * from clients where matricule= '$matricule' ";

        $result = MysqlConnection::execOne($sql);
        return $result;
    }

}




?>