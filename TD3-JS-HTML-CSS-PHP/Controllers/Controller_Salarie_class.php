<?php 

include_once(SRC_DAO."/SalarieImpl_class.php");
include_once(SRC_DAO."/EpargneImpl_class.php");
include_once(SRC_DAO."/BloqueImpl_class.php");
include_once(SRC_DAO."/AgenceImpl_class.php");

include_once(SRC_MODELS."/ComptEpargne_class.php");
include_once(SRC_MODELS."/CSalarie_class.php");


class Salarie_Controller{

    public function redirect($val){
        if($val!=0){
            $_SESSION["message"]="INSERTION EFFECTUE !!!";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }else{
            $_SESSION["message"]="ERREUR D'INSERTION !!!";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }
    }

    public function InsertSalarie($telephone,$email,$nom,$nomEnterforCL,$prenom,$cni,$adresseforCL,$mat,$profession){
        $ISalariImpl = new  SalarieImpl();
        //creation du Salarie
        $Salarie = new Client_Salarie($telephone,$email,$nom,$nomEnterforCL,$prenom,$cni,$adresseforCL,$mat,$profession);

        //insertion client et recuperation du lastInsertId()
        $idClient = $ISalariImpl->addSalarie($Salarie);

        return $idClient;
    }

    public function SalarieAndEpargne($data){
        //declaration des implementations 
        $EpargneImpl = new EpargneImpl();

        //recuperation des donnees
        $nom=$data["nom"];
        $prenom=$data["prenom"];
        $mat=$data["matricule"];
        $nomEnterforCL = $data["nom_Entreprise"];
        $cni=$data["cni"];
        $adresseforCL=$data["adresseforCl"];
        $email=$data["email"];
        $profession=$data["profession"];
        $telephone=$data["telephone"];
        $cleRib = $data["cle-rib"];
        $montant = $data["montant"];
        $dateOuvert = $data["dateOuvert"];

        //avec Session voir page Controller_BP_class.php
        $idAgence = $_SESSION["idAgence"];
        $FraisOuvertureEpargne = $EpargneImpl->getFraisCompteTypeEpargne();
        $idResp =  $_SESSION["idEmploye"];


        //generer le numero compte 
        $numCompte=$EpargneImpl->generateNumCompte();

        //generer le solde final du compte
        $soldeFinal = (int)$montant - (int)$FraisOuvertureEpargne->montant;

         //insertion client et recuperation du lastInsertId()
        $idClient =$this->InsertSalarie($telephone,$email,$nom,$nomEnterforCL,$prenom,$cni,$adresseforCL,$mat,$profession);

        //creation du Compte Epargne
        $compte = new ComptEpargne($numCompte,$cleRib,$dateOuvert,$idClient,$idResp,$idAgence,$soldeFinal);

        //ensuite insertion dans la table compte et recuperation du lastInsertId()
        $idCompte = $EpargneImpl->add($compte);

        //insertion et mis ajour dans la table etatCompte 
        $val = $EpargneImpl->UpdateEtatAtAdding($idCompte,$dateOuvert);

        //redirection apres insertion
        $this->redirect($val);
    }


    public function SalarieAndBloque(){
        $BloqImpl = new BloqueImpl();

        $fraisBloque = $BloqImpl->getFraisWithTypBloque();
        var_dump($fraisBloque);
    }


    public function Salarie($data){
        $type = $data["typeCompte"];
        switch($type){
            case "Epargne": 
                $this->SalarieAndEpargne($data);
            break;
            case "Bloque" : 
                $this->SalarieAndBloque();
            break;
            case "Courant": 
                echo "courant";
            break;
        }
    }



}







?>