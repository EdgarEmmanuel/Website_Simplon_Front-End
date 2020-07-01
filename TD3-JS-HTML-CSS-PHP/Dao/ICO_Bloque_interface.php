<?php

include_once(SRC_MODELS."/ComptBloque_class.php");


interface ICOBloque {
    public function add(ComptBloque $compte);
    public function getFraisWithTypBloque();
    public function getDurationBetweenDate($date1 , $date2);
    public function generateNumForCompteBloque();
    public function UpdateForCompteBloque($idCompte,$date);
}





?>