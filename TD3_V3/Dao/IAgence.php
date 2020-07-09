<?php

namespace App\Dao;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

// include_once(SRC_MODELS."/Agence_class.php");


interface IAgence{
    public function addAgence(\App\Models\Agence $agence);
    public function getAgenceById($id);
}







?>