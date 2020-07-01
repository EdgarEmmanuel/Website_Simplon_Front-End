<?php 

include_once(SRC_MODELS."/CSalarie_class.php");


interface ICSalarie{
    public function addSalarie(Client_Salarie $client);
    public function getMatSalarie();
}






?>