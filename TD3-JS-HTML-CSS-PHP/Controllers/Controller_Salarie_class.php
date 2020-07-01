<?php 

include_once(SRC_DAO."/SalarieImpl_class.php");
include_once(SRC_DAO."/EpargneImpl_class.php");
include_once(SRC_DAO."/AgenceImpl_class.php");

include_once(SRC_MODELS."/ComptEpargne_class.php");
include_once(SRC_MODELS."/CSalarie_class.php");


class Salarie_Controller{
    public function SalarieAndEpargne($data){
        //declaration des implementations 
        $ISalariImpl = new  SalarieImpl();
        $EpargneImpl = new EpargneImpl();

        //recuperation des donnees
        $nom=$data["nom"];
        $prenom=$data["prenom"];
        $mat=$data["matricule"];
        $nomEntreprise=$data["Nameentreprise"];
        $cni=$data["cni"];
        $adresse=$data["adresse"];
        $email=$data["email"];
        $profession=$data["profession"];
        $telephone=$data["telephone"];
        $cleRib = $data["cle-rib"];
        $montant = $data["montant"];
        $dateOuvert = $data["dateOuvert"];
        $idAgence = $data["numAgence"];
        $FraisOuvertureEpargne = $EpargneImpl->getFraisCompteTypeEpargne();
        $idResp =  $_SESSION["idEmploye"];


        //generer le numero compte 
        $numCompte=$EpargneImpl->generateNumCompte();

        //generer le solde final du compte
        $soldeFinal = (int)$montant - (int)$FraisOuvertureEpargne->montant;

        //insertion client et recuperation du lastInsertId()
        $idClient = $ISalariImpl->addSalarie($Salarie = new Client_Salarie($telephone,$email,$nom,$nomEntreprise,$prenom,$cni,$adresse,$mat,$profession));

        //ensuite insertion dans la table compte et recuperation du lastInsertId()
        $idCompte = $EpargneImpl->add($compte = new ComptEpargne($numCompte,$cleRib,$dateOuvert,$idClient,$idResp,$idAgence,$soldeFinal));

        //insertion dans etatCompte 
        $val = $EpargneImpl->UpdateEtatAtAdding($idCompte,$dateOuvert);

        if($val!=0){
            $_SESSION["message"]="INSERTION EFFECTUE !!!";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }else{
            $_SESSION["message"]="ERREUR D'INSERTION !!!";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }
    }


    public function Salarie($data){
        $type = $data["typeCompte"];
        switch($type){
            case "Epargne": 
                $this->SalarieAndEpargne($data);
            break;
            case "Bloque" : 
                echo "bloque";
            break;
            case "Courant": 
                echo "courant";
            break;
        }
    }



}







?>