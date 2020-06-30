<?php
include_once("Mysql_connect_class.php");
include_once(SRC_DAO."/EmpRespCompte_interface.php");
include_once(SRC_MODELS."/ResponsableCompte_class.php");

class RespoCompteImpl implements IResponsableCompte{
    public function getRespoByLoginAndMdp($login ,$mdp){
        MySqlConnection::getConnection();

        $sql = "SELECT * FROM responsable_compte where login='$login' and password='$mdp' ";

        $respo = MySqlConnection::execOne($sql);
        return $respo;
    }

    public function getAllInfoRespoById($id){
        MySqlConnection::getConnection();

        $sql = "SELECT * from employes where idEmploye=$id";

        $infosRespo = MySqlConnection::execOne($sql);

        return $infosRespo;
    }
}








?>