<?php 

include_once(SRC_MODELS."/NoSalarieDao.php");


function redirectNS($val){
        if($val!=0){
            $_SESSION["message"]="INSERTION EFFECTUE AVEC SUCCES";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=addCompte">';
        }else{
            $_SESSION["message"]="PROBLEME SERVEUR ";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }
        
    }

    function InsertNoSalarie($data){

        $nom=$data["nomi"];
        $prenom=$data["prenomi"];
        $mat=$data["mati"];
        $cni=$data["cni"];
        $adresse=$data["adressei"];
        $email=$data["emaili"];
        $activite=$data["activitei"];
        $telephone=$data["teli"];

        //insertion client et recuperation du lastInsertId()
        $idClient = addCNoSalarie($telephone,$email,$nom,$prenom,$activite,$cni,$mat,$adresse);

        return $idClient;
    }


function NoSalarie($data){
        $idClient = InsertNoSalarie($data);

        //variable en session 
        $_SESSION["idClient"]=$idClient;

        //avoir le nom Complet du Client Non Salarie INserer
        $_SESSION["nomClient"]=getClientNoSById($idClient);

        //redirection
        redirectNS($idClient);

    }








?>