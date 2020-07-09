<?php

namespace App\Dao;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

//include_once(SRC_MODELS."/ComptEpargne_class.php");

interface ICOEpargne {
    public function add(\App\Models\ComptEpargne $compte);
    public function getFraisCompteTypeEpargne();
    public function generateNumCompte();
}





?>