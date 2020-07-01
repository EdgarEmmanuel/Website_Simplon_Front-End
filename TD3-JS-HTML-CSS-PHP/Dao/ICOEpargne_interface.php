<?php

include_once(SRC_MODELS."/ComptEpargne_class.php");

interface ICOEpargne {
    public function add(ComptEpargne $compte);
    public function getFraisCompteTypeEpargne();
    public function generateNumCompte();
}





?>