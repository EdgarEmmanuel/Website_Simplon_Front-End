<?php 

namespace App\Dao;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

//include_once(SRC_MODELS."/etatCompte_class.php");

interface IEtatCompte{
    public function insertEtat(\App\Models\etatCompte $etat);
}








?>