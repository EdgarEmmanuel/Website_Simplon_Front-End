<?php 


namespace App\Dao;


include_once SRC_PUBLICAUTO."/autoloadFile.php";

// include_once("Mysql_connect_class.php");
// include_once(SRC_MODELS."/Agence_class.php");
// include_once(SRC_DAO."/IAgence_interface.php");

class AgenceImpl implements IAgence{
    public function addAgence(\App\Models\Agence $agence){

    }
    public function getAgenceById($id){
        MySqlConnection::getConnection();

        $sql = "SELECT * FROM agences where id_agence=$id";

        $agence = MySqlConnection::execOne($sql);
        return $agence->numero_agence;
    }
}




?>