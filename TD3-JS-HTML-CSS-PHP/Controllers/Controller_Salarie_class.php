<?php 

include_once(SRC_DAO."/SalarieImpl_class.php");
include_once(SRC_DAO."/EpargneImpl_class.php");
include_once(SRC_DAO."/BloqueImpl_class.php");
include_once(SRC_DAO."/AgenceImpl_class.php");

include_once(SRC_MODELS."/ComptEpargne_class.php");
include_once(SRC_MODELS."/CSalarie_class.php");
include_once(SRC_MODELS."/ComptBloque_class.php");


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

    public function InsertSalarie($data){
        $ISalariImpl = new  SalarieImpl();

        $nom=$data["nom"];
        $prenom=$data["prenom"];
        $mat=$data["matricule"];
        $nomEnterforCL = $data["nom_Entreprise"];
        $cni=$data["cni"];
        $adresseforCL=$data["adresseforCl"];
        $email=$data["email"];
        $profession=$data["profession"];
        $telephone=$data["telephone"];


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
        $idClient =$this->InsertSalarie($data);

        //creation du Compte Epargne
        $compte = new ComptEpargne($numCompte,$cleRib,$dateOuvert,$idClient,$idResp,$idAgence,$soldeFinal);

        //ensuite insertion dans la table compte et recuperation du lastInsertId()
        $idCompte = $EpargneImpl->add($compte);

        //insertion et mis ajour dans la table etatCompte 
        $val = $EpargneImpl->UpdateEtatAtAdding($idCompte,$dateOuvert);

        //redirection apres insertion
        $this->redirect($val);
    }


    


    public function SalarieAndBloque($data){
        $BloqImpl = new BloqueImpl();

        //recupere valeur 
        $cleRib = $data["cle-rib"];
        $montant = $data["montant"];
        $dateDebloc = $data["dateDebloc"];
        $dateOuvert = $data["dateOuvert"];

        //compare two dates 
        $value = $BloqImpl->getDurationBetweenDate($dateOuvert , $dateDebloc);

        if($value==1){
            //have all the frais for locked account
            $fraisBloque = $BloqImpl->getFraisWithTypBloque();

            //solde final moins les frais d'ouverture
            $solde = (int)$montant - (int)$fraisBloque;

            //generer le numero de Compte
            $numCompte = $BloqImpl->generateNumForCompteBloque();

            //infos de $_SESSION
            $idAgence = $_SESSION["idAgence"];
            $idResp =  $_SESSION["idEmploye"];

            //get the IDClient 
            $idClient = $this->InsertSalarie($data);

            //create CompteBloque
            $compteBloque = new ComptBloque($numCompte,$cleRib,$dateOuvert,$idClient,$idResp,$idAgence,$solde,$dateDebloc);

            //inserer dans la table
            $idCompte = $BloqImpl->add($compteBloque);

            //mettre a jour la table Compte
            $val = $BloqImpl->UpdateForCompteBloque($idCompte,$dateOuvert);

            //redirection
            $this->redirect($val);

        }else{
            $_SESSION["message"]="INSERTION IMPOSSIBLE DUREE DE DEBLOCAGE INFERIEUR A 1 AN !!!";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }

        
    
    }


    public function Salarie($data){
        // $type = $data["typeCompte"];
        // switch($type){
        //     case "Epargne": 
        //         $this->SalarieAndEpargne($data);
        //     break;
        //     case "Bloque" : 
        //         $this->SalarieAndBloque($data);
        //     break;
        //     case "Courant": 
        //         echo "courant";
        //     break;
        // }

        var_dump($data);
    }



}







?>