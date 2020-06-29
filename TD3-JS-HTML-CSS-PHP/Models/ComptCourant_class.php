<?php 

include_once(SRC_MODELS."/Comptes_class.php");

class ComptCourant extends Comptes{
    private $_adresse;
    private $_nomEntreprise ;
    private $_raisonSociale;


    public function __construct($numCompte,$cleRib,$dateOuv,$idCl,$idResp,$idAgence,$idAgios,$adres,$nomEnter,$raison){
        parent::__construct($numCompte,$cleRib,$dateOuv,$idCl,$idResp,$idAgence,$idAgios);
        $this->_adresse=$adres;
        $this->_nomEntreprise=$nomEnter;
        $this->_raisonSociale=$raison;
    }


   public function getIdRespo(){
       return parent::getIdRespo();
   }

    public function getIdClient(){
        return parent::getIdClient();
    }

    public function getNumCompte(){
        return parent::getNumCompte();
    }

    public function getIdAgence(){
        return parent::getIdAgence();
    }

    public function getDateOuverture(){
        return parent::getDateOuvert();
    }

    public function getCleRib(){
        return parent::getCleRib();
    }

    public function getAdresse(){
        return $this->_adresse;
    }

    public function getNomEntreprise(){
        return $this->_nomEntreprise;
    }

    public function getRaisonSoc(){
        return $this->_raisonSociale;
    }

    public function getIdAgios(){
        return parent::getIdAgios();
    }


}











?>