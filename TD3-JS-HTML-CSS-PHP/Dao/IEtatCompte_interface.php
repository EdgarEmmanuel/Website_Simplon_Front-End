<?php 

include_once(SRC_MODELS."/etatCompte_class.php");

interface IEtatCompte{
    public function insertEtat(etatCompte $etat);
}








?>