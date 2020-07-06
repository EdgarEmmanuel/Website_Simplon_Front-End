<?php

include_once(SRC_MODELS."/CNoSalarie_class.php");

interface ICNonSalarie{
    public function addCNoSalarie(Client_Non_Salarie $client);
    public function getClientNoSById($id);
    public function getClientNOSByMatricule($mat);
    public function getMatriculeNoSalarie();
}


?>