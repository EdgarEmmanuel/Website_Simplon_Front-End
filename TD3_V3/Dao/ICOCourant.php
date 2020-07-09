<?php

namespace App\Dao;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

// include_once(SRC_MODELS."/ComptCourant_class.php");

interface ICOCourant {
    public function add(\App\Models\ComptCourant $compte);
    public function getFraisCompteTypeCourant();
    public function generateNumCompte();
    public function UpdateForCompteBloque($idCompte,$date);
}





?>