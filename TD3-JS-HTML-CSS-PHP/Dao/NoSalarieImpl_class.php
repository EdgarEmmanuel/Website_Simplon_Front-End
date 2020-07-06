<?php 

include_once("Mysql_connect_class.php");
include_once(SRC_MODELS."/CNoSalarie_class.php");
include_once(SRC_DAO."/ICNonSalarie_interface.php");


class NoSalarieImpl implements ICNonSalarie {
    public function addCNoSalarie(Client_Non_Salarie $client){
        MysqlConnection::getConnection();
        //$adr,$tel,$mail,$nom,$activite,$prenom,$cni,$matricule
        $tel  = $client->getTelephone();
        $mail = $client->getMail();
        $nom = $client->getNom();
        $prenom = $client->getPrenom();
        $activite = $client->getActivite();
        $cni=$client->getCni();
        $matricule = $client->getMatricule();
        $localisation=$client->getLocalisation();


        //creation et execution de la requete pour inserer un client 
        $sql_clients = "INSERT INTO clients VALUES (null,'$tel','$mail','$matricule')";

        MysqlConnection::executeUpdate($sql_clients);

        //recuperation du lastInsertId dans la table clients
        $idClient = MysqlConnection::lastInsertId();

        //creation et execution de la requete pour inserer un client_non_salarie
        $sql_cnoSalarie = "INSERT INTO client_non_salarie VALUES(null,'$prenom','$activite',$idClient,'$nom','$cni','$localisation')";

        MysqlConnection::executeUpdate($sql_cnoSalarie);


        return $idClient;
    }

    public function getClientNOSByMatricule($mat){
        MysqlConnection::getConnection();

        $sql = "SELECT * from clients where matricule='$mat' ";

        $resultat = MysqlConnection::execOne($sql);
        return $resultat;
    }

    public function getMatriculeNoSalarie(){
        MysqlConnection::getConnection();

        $sql ="SELECT count(idClient) as num FROM clients where SUBSTR(matricule,1,3) = 'BCI' ";

        $val = MysqlConnection::execOne($sql);
        //"BPS".(int)
        $tot = (int)$val->num +1;
        return "BCI".(int)$tot;
    }

    public function getClientNoSById($id){
        MysqlConnection::getConnection();

        $sql ="SELECT nom , prenom from client_non_salarie where idClient=$id ";
       

        $client = MysqlConnection::execOne($sql);
        

        $nomComplet = $client->nom." ".$client->prenom;

        return $nomComplet;
    }
}







?>