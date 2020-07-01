<?php

include_once(SRC_MODELS."/Agence_class.php");


interface IAgence{
    public function addAgence(Agence $agence);
    public function getAgenceById($id);
}







?>