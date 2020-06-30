<?php 

include_once("Mysql_connect_class.php");
include_once(SRC_DAO."/ICSalarie_interface.php");
include_once(SRC_MODELS."/CSalarie_class.php");

class SalarieImpl implements ICSalarie{
    public function addSalarie(Client_Salarie $client){
        $tel  = $client->getTelephone();
        $mail = $client->getMail();
        $nom = $client->getNom();
        $salaire = $client->getSalaire();
        $adrEntreprise = $client->getAdresseEntreprise();
        $nomEnter = $client->nomEntreprise();
        $prenom = $client->getPrenom();
        $cni = $client->getCni();
        $matricule = $client->getMatricule();
        $profession = $client->getProfession();

        //creation et execution de la requete pour inserer un client 
        $sql_clients = "INSERT INTO clients VALUES (null,'$tel','$mail','$matricule')";

        MYSqlConnection::executeUpdate($sql_clients);

        //recuperation du lastInsertId dans la table clients
        $idClient = MysqlConnection::lastInsertId();

        //creation et execution de la requete pour inserer un client
        $sql_csalarie = "INSERT INTO client_moral VALUES(null,'$prenom','$profession',$salaire,'$nomEnter','$adrEntreprise',$idClient,
        '$nom','$cni')";

        MysqlConnection::executeUpdate($sql_csalarie);


        return $idClient;
    }
}






?>