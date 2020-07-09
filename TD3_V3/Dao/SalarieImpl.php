<?php 

namespace App\Dao;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

// include_once("Mysql_connect_class.php");
// include_once(SRC_DAO."/ICSalarie_interface.php");
// include_once(SRC_MODELS."/CSalarie_class.php");

class SalarieImpl implements ICSalarie{
    public function addSalarie(\App\Models\Client_Salarie $client){
        MySqlConnection::getConnection();
        $tel  = $client->getTelephone();
        $mail = $client->getMail();
        $nom = $client->getNom();
        $adrEntreprise = $client->getAdresseEntreprise();
        $nomEnter = $client->getnomEntreprise();
        $prenom = $client->getPrenom();
        $cni = $client->getCni();
        $matricule = $client->getMatricule();
        $profession = $client->getProfession();
       

        //creation et execution de la requete pour inserer un client 
        $sql_clients = "INSERT INTO clients VALUES (null,'$tel','$mail','$matricule')";

        MySqlConnection::executeUpdate($sql_clients);

        //recuperation du lastInsertId dans la table clients
        $idClient = MySqlConnection::lastInsertId();

        //creation et execution de la requete pour inserer un client
        $sql_csalarie = "INSERT INTO client_salarie VALUES(null,'$prenom','$profession','$nomEnter','$adrEntreprise',$idClient,'$nom','$cni')";
        // var_dump($sql_csalarie);
        // die();

        MySqlConnection::executeUpdate($sql_csalarie);


        return $idClient;
    }

    public function getMatSalarie(){
        MySqlConnection::getConnection();

        $sql ="SELECT count(idClient) as num FROM clients where SUBSTR(matricule,1,3) = 'BPS' ";

        $val = MySqlConnection::execOne($sql);
        //"BPS".(int)
        $tot = (int)$val->num +1;
        return "BPS".(int)$tot;
    }

    public function getClientByMatricule($mat){
        MySqlConnection::getConnection();

        $sql = "SELECT * from clients where matricule='$mat' ";

        $resultat = MySqlConnection::execOne($sql);
        return $resultat;
    }

    public function getClientById($id){
        MySqlConnection::getConnection();

        $sql ="SELECT nom , prenom from client_salarie where id_salarie=$id ";

        $client = MySqlConnection::execOne($sql);

        $nomComplet = $client->nom." ".$client->prenom;

        return $nomComplet;
    }
}






?>