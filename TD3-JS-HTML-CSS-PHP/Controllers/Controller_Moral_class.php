<?php

include_once(SRC_DAO."/MoralImpl_class.php");
include_once(SRC_MODELS."/CMoral_class.php");


class Controller_Moral{
    public function redirect($val){
        if($val!=0){
            $_SESSION["message"]="INSERTION EFFECTUE AVEC SUCCES";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=addCompte">';
        }else{
            $_SESSION["message"]="PROBLEME SERVEUR ";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }
    }

    private function InsertMoral($data){
        $IMoralImpl = new MoralImpl();

        $nom=$data["nom"];
        $mat=$data["matEntreprise"];
        $adresse=$data["adresse"];
        $email=$data["email"];
        $activite=$data["activite"];
        $telephone=$data["tel"];
        $ninea=$data["ninea"];
        $typeEntreprise=$data["type"];

        //creation du Salarie
        $Salarie = new Client_Moral($adresse,$telephone,$email,$typeEntreprise,$activite,$nom,$mat,$ninea);

        //insertion client et recuperation du lastInsertId()
        $idClient = $IMoralImpl-> addClient($Salarie);

        return $idClient;
    }


    public function MoralClient($data){
        $IMoralImpl = new MoralImpl();
        $idClient = $this->InsertMoral($data);

        //variable en session 
        $_SESSION["idClient"]=$idClient;

        //avoir le nom Complet du Client Non Salarie INserer
        $_SESSION["nomClient"]=$IMoralImpl->getClientMoralById($idClient);

        //redirection
        $this->redirect($idClient);

    }
}

















?>