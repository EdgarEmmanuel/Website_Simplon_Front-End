<?php 

namespace App\Dao;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

//include_once(SRC_MODELS."/CSalarie_class.php");


interface ICSalarie{
    public function addSalarie(\App\Models\Client_Salarie $client);
    public function getMatSalarie();
    public function getClientById($id);
    public function getClientByMatricule($mat);
}






?>