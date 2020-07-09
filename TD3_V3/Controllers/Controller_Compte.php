<?php 


namespace App\Controllers;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

// include_once(SRC_DAO."/EpargneImpl_class.php");
// include_once(SRC_DAO."/BloqueImpl_class.php");
// include_once(SRC_DAO."/AgenceImpl_class.php");
// include_once(SRC_DAO."/CourantImpl_class.php");

// include_once(SRC_MODELS."/ComptEpargne_class.php");
// include_once(SRC_MODELS."/ComptBloque_class.php");
// include_once(SRC_MODELS."/ComptCourant_class.php");


class Controller_Compte{

    public function redirect($val){
        unset($_SESSION['nomClient']);
        unset($_SESSION['idClient']);
        if($val!=0){
            $_SESSION["message"]="INSERTION EFFECTUE AVEC SUCCES";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }else{
            $_SESSION["message"]="PROBLEME SERVEUR ";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }
    }

    public function AddAccountCourant($data){
        $CourantImpl = new \App\Dao\CourantImpl();

        //recuperer donnees
        $cleRib = $data["cle-rib"];
        $montant = $data["montant"];
        $dateOuvert = $data["dateOuvert"];
        $nomEnter = $data["Nameentreprise"];
        $raison = $data ["raison"];
        $adres = $data["adrEntreprise"];

         //have all the frais for locked account
         $fraisCourant = $CourantImpl->getFraisCompteTypeCourant();

          //infos de $_SESSION voir page Controller_BP_Class.php
          $idAgence = $_SESSION["idAgence"];
          $idResp =  $_SESSION["idEmploye"];

          //solde final moins les frais d'ouverture
          $solde = (int)$montant - (int)$fraisCourant;

          //infos de $_SESSION voir page Controller_BP_Class.php
          $idAgence = $_SESSION["idAgence"];
          $idResp =  $_SESSION["idEmploye"];

          //insertion client et recuperation du lastInsertId()
          $idClient =$_SESSION["idClient"];

          //get the agios 
          $idAgios = $CourantImpl->getAgiosEntretien();

           //generer le numero de Compte Bloque
           $numCompte = $CourantImpl->generateNumCompte();

          //create compte courant
          $courant = new \App\Models\ComptCourant($numCompte,$cleRib,$dateOuvert,$idClient,$idResp,$idAgence,$adres,$nomEnter
          ,$raison,$solde,$idAgios);

          //creation Compte Courant
          $idCompte = $CourantImpl->add($courant);

          //mettre a jour table
          $val = $CourantImpl->UpdateForCompteBloque($idCompte,$dateOuvert);


          //redirection
          $this->redirect($val);


    }

    public function AddAccountBloque($data){
        $BloqImpl = new \App\Dao\BloqueImpl();

        //recupere valeur 
        $cleRib = $data["cle-rib"];
        $montant = $data["montant"];
        $dateDebloc = $data["dateDebloc"];
        $dateOuvert = $data["dateOuvert"];

            //have all the frais for locked account
            $fraisBloque = $BloqImpl->getFraisWithTypBloque();

            //solde final moins les frais d'ouverture
            $solde = (int)$montant - (int)$fraisBloque;

            //generer le numero de Compte Bloque
            $numCompte = $BloqImpl->generateNumForCompteBloque();

            //infos de $_SESSION voir page Controller_BP_Class.php
            $idAgence = $_SESSION["idAgence"];
            $idResp =  $_SESSION["idEmploye"];

            //insertion client et recuperation du lastInsertId()
            $idClient =$_SESSION["idClient"];

            //create CompteBloque
            $compteBloque = new \App\Models\ComptBloque($numCompte,$cleRib,$dateOuvert,$idClient,$idResp,$idAgence,$solde,$dateDebloc);

            //inserer dans la table
            $idCompte = $BloqImpl->add($compteBloque);

            //mettre a jour la table Compte
            $val = $BloqImpl->UpdateForCompteBloque($idCompte,$dateOuvert);

            //redirection
            $this->redirect($val);

    }


    public function addEpargne($data){
        //declaration des implementations 
        $EpargneImpl = new \App\Dao\EpargneImpl();

        //recuperation des donnees
        $cleRib = $data["cle-rib"];

        $montant = $data["montant"];
        $dateOuvert = $data["dateOuvert"];

        //avec Session voir page Controller_BP_class.php
        $idAgence = $_SESSION["idAgence"];

        //recuperer les frais
        $FraisOuvertureEpargne = $EpargneImpl->getFraisCompteTypeEpargne();

        //recupere l'ID dyu responsable qui est en Session voir Controller_BP_class.php(function verifyRespoCompte)
        $idResp =  $_SESSION["idEmploye"];


        //generer le numero compte 
        $numCompte=$EpargneImpl->generateNumCompte();

        //generer le solde final du compte
        $soldeFinal = (int)$montant - (int)$FraisOuvertureEpargne;

      
         //insertion client et recuperation du lastInsertId()
        $idClient =$_SESSION["idClient"];


        //creation du Compte Epargne
        $compte = new \App\Models\ComptEpargne($numCompte,$cleRib,$dateOuvert,$idClient,
        $idResp,$idAgence,$soldeFinal);

        //ensuite insertion dans la table compte et recuperation du lastInsertId()
        $idCompte = $EpargneImpl->add($compte);

        //insertion et mis a jour dans la table etatCompte 
        $val = $EpargneImpl->UpdateEtatAtAdding($idCompte,$dateOuvert);

        //redirection selon le resultat de l'insertion 
        $this->redirect($val);
    }


    public function DecideAccountBeforeInsert($data){
        $typeCompte = $data["typeCompte"];
        switch($typeCompte){
            case "Epargne": 
                $this->addEpargne($data);
            break;
            case "Bloque":
                $this->AddAccountBloque($data);
            break;
            case "Courant": 
                $this->AddAccountCourant($data);
            break;
        }
    }


}









?>