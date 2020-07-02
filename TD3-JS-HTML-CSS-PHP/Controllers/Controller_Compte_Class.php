<?php 
include_once(SRC_DAO."/EpargneImpl_class.php");
include_once(SRC_DAO."/BloqueImpl_class.php");
include_once(SRC_DAO."/AgenceImpl_class.php");

include_once(SRC_MODELS."/ComptEpargne_class.php");
include_once(SRC_MODELS."/ComptBloque_class.php");


class Controller_Compte{

    // public function SalarieAndBloque($data){
    //     $BloqImpl = new BloqueImpl();

    //     //recupere valeur 
    //     $cleRib = $data["cle-rib"];
    //     $montant = $data["montant"];
    //     $dateDebloc = $data["dateDebloc"];
    //     $dateOuvert = $data["dateOuvert"];

    //     //compare two dates 
    //     $value = $BloqImpl->getDurationBetweenDate($dateOuvert , $dateDebloc);

    //     if($value==1){
    //         //have all the frais for locked account
    //         $fraisBloque = $BloqImpl->getFraisWithTypBloque();

    //         //solde final moins les frais d'ouverture
    //         $solde = (int)$montant - (int)$fraisBloque;

    //         //generer le numero de Compte
    //         $numCompte = $BloqImpl->generateNumForCompteBloque();

    //         //infos de $_SESSION
    //         $idAgence = $_SESSION["idAgence"];
    //         $idResp =  $_SESSION["idEmploye"];

    //         //get the IDClient 
    //         $idClient = $this->InsertSalarie($data);

    //         //create CompteBloque
    //         $compteBloque = new ComptBloque($numCompte,$cleRib,$dateOuvert,$idClient,$idResp,$idAgence,$solde,$dateDebloc);

    //         //inserer dans la table
    //         $idCompte = $BloqImpl->add($compteBloque);

    //         //mettre a jour la table Compte
    //         $val = $BloqImpl->UpdateForCompteBloque($idCompte,$dateOuvert);

    //         //redirection
    //         $this->redirect($val);

    //     }else{
    //         $_SESSION["message"]="INSERTION IMPOSSIBLE DUREE DE DEBLOCAGE INFERIEUR A 1 AN !!!";
    //         echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
    //     }

        
    
    // }


    // public function SalarieAndEpargne($data){
    //     //declaration des implementations 
    //     $EpargneImpl = new EpargneImpl();

    //     //recuperation des donnees
    //     $cleRib = $data["cle-rib"];

    //     $montant = $data["montant"];
    //     $dateOuvert = $data["dateOuvert"];

    //     //avec Session voir page Controller_BP_class.php
    //     $idAgence = $_SESSION["idAgence"];
    //     $FraisOuvertureEpargne = $EpargneImpl->getFraisCompteTypeEpargne();
    //     $idResp =  $_SESSION["idEmploye"];


    //     //generer le numero compte 
    //     $numCompte=$EpargneImpl->generateNumCompte();

    //     //generer le solde final du compte
    //     $soldeFinal = (int)$montant - (int)$FraisOuvertureEpargne->montant;

      

    //      //insertion client et recuperation du lastInsertId()
    //     $idClient =$this->InsertSalarie($data);

    //     //creation du Compte Epargne
    //     $compte = new ComptEpargne($numCompte,$cleRib,$dateOuvert,$idClient,$idResp,$idAgence,$soldeFinal);

    //     //ensuite insertion dans la table compte et recuperation du lastInsertId()
    //     $idCompte = $EpargneImpl->add($compte);

    //     //insertion et mis ajour dans la table etatCompte 
    //     $val = $EpargneImpl->UpdateEtatAtAdding($idCompte,$dateOuvert);

    //     //redirection apres insertion
    //     $this->redirect($val);
    // }

}









?>