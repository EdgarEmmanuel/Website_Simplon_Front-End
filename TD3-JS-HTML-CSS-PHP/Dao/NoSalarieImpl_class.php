<?php 

include_once("Mysql_connect_class.php");
include_once(SRC_MODELS."/CNoSalarie_class.php");
include_once(SRC_DAO."/ICNonSalarie_interface.php");


class NoSalarieImpl implements ICNonSalarie {
    public function addCNoSalarie(Client_Non_Salarie $client){
        //$adr,$tel,$mail,$nom,$activite,$prenom,$cni,$matricule
        $tel  = $client->getTelephone();
        $mail = $client->getMail();
        $nom = $client->getNom();
        $prenom = $client->getPrenom();
        $activite = $client->getActivite();
        $cni=$client->getCni();
        $matricule = $client->getMatricule();


        //creation et execution de la requete pour inserer un client 
        $sql_clients = "INSERT INTO clients VALUES (null,'$tel','$mail','$matricule')";

        MYSqlConnection::executeUpdate($sql_clients);

        //recuperation du lastInsertId dans la table clients
        $idClient = MysqlConnection::lastInsertId();

        //creation et execution de la requete pour inserer un client_non_salarie
        $sql_cnoSalarie = "INSERT INTO client_non_salarie VALUES(null,'$prenom','$activite',$idClient,'$nom','$cni')";

        MysqlConnection::executeUpdate($sql_cnoSalarie);


        return $idClient;
    }
}







?>