<?php 

include_once(SRC_MODELS."/Client_class.php");

class Client_Non_Salarie extends Client{
    private $_prenom;
    private $_activite_client;
    private $_cni;
    private $_nom;
    private $_localisation;
   
    public function __construct($tel,$mail,$nom,$activite,$prenom,$cni,$matricule,$localisation){
        parent::__construct( $tel , $mail,$matricule);
        $this->_prenom=$prenom;
        $this->_cni=$cni;
        $this->_localisation= $localisation;
        $this->_nom=$nom;
        $this->_activite_client=$activite;
    }

    public function getLocalisation(){
        return $this->_localisation;
    }

    public function getCni(){
        return $this->_cni;
    }

    public function getActivite(){
        return $this->_activite_client;
    }

    public function getNom(){
        return $this->_nom;
    }

    public function getPrenom(){
        return $this->_prenom;
    }

    public function getMail(){
        return parent::getMail();
    }

    public function getTelephone(){
        return parent::getTelephone();
    }

    public function getMatricule(){
        return parent::getMatricule();
    }
}





















?>