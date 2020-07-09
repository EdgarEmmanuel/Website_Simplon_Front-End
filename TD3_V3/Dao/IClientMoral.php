<?php 

namespace App\Dao;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

// include_once(SRC_MODELS."/CMoral_class.php");

interface IClientMoral{
    public function addClient(\App\Models\Client_Moral $client);
    public function getMatriculeMoral();
    public function getClientMoralById($id);
    public function getClientMoralByMatricule($matricule);
}

















?>