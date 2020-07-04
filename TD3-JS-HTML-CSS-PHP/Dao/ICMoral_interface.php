<?php 

include_once(SRC_MODELS."/CMoral_class.php");

interface IClientMoral{
    public function addClient(Client_Moral $client);
    public function getMatriculeMoral();
    public function getClientMoralById($id);
}

















?>