<?php

include_once(SRC_MODELS."/MoralDao.php");



function redirect($val){
        if($val!=0){
            $_SESSION["message"]="INSERTION EFFECTUE AVEC SUCCES";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=addCompte">';
        }else{
            $_SESSION["message"]="PROBLEME SERVEUR ";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }
    }

    function InsertMoral($data){

        $nom=$data["nom"];
        $mat=$data["matEntreprise"];
        $adresse=$data["adresse"];
        $email=$data["email"];
        $activite=$data["activite"];
        $telephone=$data["tel"];
        $ninea=$data["ninea"];
        $typeEntreprise=$data["type"];

        //insertion client et recuperation du lastInsertId()
        $idClient = addClientMoral($adresse,$telephone,$email,$typeEntreprise,$activite,$nom,$mat,$ninea);

        return $idClient;
    }


    function MoralClient($data){
        $idClient = InsertMoral($data);

        //variable en session 
        $_SESSION["idClient"]=$idClient;

        //avoir le nom Complet du Client Non Salarie INserer
        $_SESSION["nomClient"]=getClientMoralById($idClient);

        //redirection
        redirect($idClient);

    }


















?>