<?php 

include_once(SRC_MODELS."/EpargneDao.php");
include_once(SRC_MODELS."/BloqueDao.php");
include_once(SRC_MODELS."/CourantDao.php");

function redirectC($val){
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

    function AddAccountCourant($data){

        //recuperer donnees
        $cleRib = $data["cle-rib"];
        $montant = $data["montant"];
        $dateOuvert = $data["dateOuvert"];
        $nomEnter = $data["Nameentreprise"];
        $raison = $data ["raison"];
        $adres = $data["adrEntreprise"];

         //have all the frais for locked account
         $fraisCourant = getFraisCompteTypeCourant();

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
          $idAgios = getAgiosEntretien();

           //generer le numero de Compte Bloque
           $numCompte = generateNumCompteC();

          //creation Compte Courant
          $idCompte = addCourant($numCompte, $cleRib,$dateOuvert, $idClient, $idResp, $idAgence,
           $solde,$adres, $nomEnter, $raison,$idAgios);

          //mettre a jour table
          $val = UpdateForCompteCourant($idCompte,$dateOuvert);


          //redirection
          redirectC($val);


    }

    function AddAccountBloque($data){

        //recupere valeur 
        $cleRib = $data["cle-rib"];
        $montant = $data["montant"];
        $dateDebloc = $data["dateDebloc"];
        $dateOuvert = $data["dateOuvert"];

            //have all the frais for locked account
            $fraisBloque = getFraisWithTypBloque();

            //solde final moins les frais d'ouverture
            $solde = (int)$montant - (int)$fraisBloque;

            //generer le numero de Compte Bloque
            $numCompte = generateNumForCompteBloque();

            //infos de $_SESSION voir page Controller_BP_Class.php
            $idAgence = $_SESSION["idAgence"];
            $idResp =  $_SESSION["idEmploye"];

            //insertion client et recuperation du lastInsertId()
            $idClient =$_SESSION["idClient"];

            //inserer dans la table
            $idCompte = addCompteBloq($numCompte,$cleRib,$dateOuvert,$idClient,$idResp,$idAgence,$solde,$dateDebloc);

            //mettre a jour la table Compte
            $val = UpdateForCompteBloque($idCompte,$dateOuvert);

            //redirection
            redirectC($val);

    }


    function addCEpargne($data){

        //recuperation des donnees
        $cleRib = $data["cle-rib"];
        $montant = $data["montant"];
        $dateOuvert = $data["dateOuvert"];

        //avec Session voir page Controller_BP_class.php
        $idAgence = $_SESSION["idAgence"];

        //recuperer les frais
        $FraisOuvertureEpargne = getFraisCompteTypeEpargne();

        //recupere l'ID dyu responsable qui est en Session voir Controller_BP_class.php(function verifyRespoCompte)
        $idResp =  $_SESSION["idEmploye"];


        //generer le numero compte 
        $numCompte=generateNumCompteEpargne();

        //generer le solde final du compte
        $soldeFinal = (int)$montant - (int)$FraisOuvertureEpargne;

      
         //insertion client et recuperation du lastInsertId()
        $idClient =$_SESSION["idClient"];

        //ensuite insertion dans la table compte et recuperation du lastInsertId()
        $idCompte =addEpargne($numCompte,$cleRib,$dateOuvert,$idClient,$idResp,$idAgence,$soldeFinal);

        //insertion et mis a jour dans la table etatCompte 
        $val = UpdateEtatEpargneAtAdding($idCompte,$dateOuvert);

        //redirection selon le resultat de l'insertion 
        redirectC($val);
    }


    function DecideAccountBeforeInsert($data){
        $typeCompte = $data["typeCompte"];
        switch($typeCompte){
            case "Epargne": 
                addCEpargne($data);
            break;
            case "Bloque":
                AddAccountBloque($data);
            break;
            case "Courant": 
                AddAccountCourant($data);
            break;
        }
    }










?>