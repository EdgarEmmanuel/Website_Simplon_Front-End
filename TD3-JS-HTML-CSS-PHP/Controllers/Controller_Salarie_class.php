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
        $nomEntreprise=$data[""];
        $cni=$data["cni"];
        $adresse=$data["adresse"];
        $email=$data["email"];
        $profession=$data["profession"];
        $telephone=$data["telephone"];
        $cleRib = $data["cle-rib"];
        $montant = $data["montant"];
        $dateOuvert = $data["dateOuvert"];
        $idAgence = $data["numAgence"];
        $FRaisOuvertureEpargne = $EpargneImpl->getFraisCompteTypeEpargne();

        //debut insertion
        $idClient = $ISalariImpl->addSalarie($Salarie = new Client_Salarie($telephone,$email,$nom,$nomEntreprise,$prenom,$cni,$adresse,$mat,$profession));
        
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