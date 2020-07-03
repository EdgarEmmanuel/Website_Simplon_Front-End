<?php

include_once(SRC_MODELS."/ComptCourant_class.php");

interface ICOCourant {
    public function add(ComptCourant $compte);
    public function getFraisCompteTypeCourant();
    public function generateNumCompte();
    public function UpdateForCompteBloque($idCompte,$date);
}





?>