<?php


include_once("Mysql_connect_class.php");
include_once(SRC_DAO."/ICMoral_interface.php");
include_once(SRC_MODELS."/CMoral_class.php");

class MoralImpl implements IClientMoral {
    public function addClient(Client_Moral $client){
        $adresse  = $client->getAdresse();
         $tel  = $client->getTelephone();
         $mail = $client->getMail();
         $type = $client->getTypeEntreprise();
         $activite = $client->getActiviteEntreprise();
         $nomEnter = $client->getNomEntreprise();
         $raison = $client->getRaisonSocial();
         $matricule = $client->getMatricule();

         //creation et execution de la requete pour inserer un client 
         $sql_clients = "INSERT INTO clients VALUES (null,'$tel','$mail','$matricule')";

         MYSqlConnection::executeUpdate($sql_clients);

         //recuperation du lastInsertId dans la table clients
         $idClient = MysqlConnection::lastInsertId();

         //creation et execution de la requete pour inserer un client
         $sql_cmoral = "INSERT INTO client_moral VALUES(null,'$type','$activite',$idClient,'$nomEnter','$raison','$adresse')";

         MysqlConnection::executeUpdate($sql_cmoral);


         return $idClient;
    }
}




?>