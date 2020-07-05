<?php 

include_once(SRC_MODELS."/SalarieDao.php");



function redirectS($val){
        if($val!=0){
            $_SESSION["message"]="INSERTION EFFECTUE AVEC SUCCES";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=addCompte">';
        }else{
            $_SESSION["message"]="PROBLEME SERVEUR ";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }
        
    }

    function InsertSalarie($data){

        $nom=$data["nom"];
        $prenom=$data["prenom"];
        $mat=$data["matricule"];
        $nomEnterforCL = $data["nom_Entreprise"];
        $cni=$data["cni"];
        $adresseforCL=$data["adresseforCl"];
        $email=$data["email"];
        $profession=$data["profession"];
        $telephone=$data["telephone"];

        //insertion client et recuperation du lastInsertId()
        $idClient = addSalarie($telephone,$email,$nom,$adresseforCL,$nomEnterforCL,$prenom,$cni,$mat,$profession);

        return $idClient;
    }
    

    function Salarie($data){

        //apres insertion on recupere le LastInsertId
        $idClient = InsertSalarie($data);
        

        //variable en session getClientById($id)
        $_SESSION["idClient"]=$idClient;

        //avoir le nom Complet du Client
        $_SESSION["nomClient"]=getClientSalarieById($idClient);

        //redirection
        redirectS($idClient);
    }








?>