<?php

namespace App\Dao;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

//include_once(SRC_MODELS."/CNoSalarie_class.php");

interface INonSalarie{
    public function addCNoSalarie(\App\Models\Client_Non_Salarie $client);
    public function getClientNoSById($id);
    public function getClientNOSByMatricule($mat);
    public function getMatriculeNoSalarie();
}


?>