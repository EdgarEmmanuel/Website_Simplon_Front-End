<?php 

include_once(SRC_MODELS."/Client_class.php");

class Client_Non_Salarie extends Client{
    private $_adresse;
    private $_prenom;
    private $_activite_client;
    private $_cni;
    private $_nom;
   
    public function __construct($adr,$tel,$mail,$nom,$activite,$prenom,$cni,$matricule){
        parent::__construct( $tel , $mail,$matricule);
        $this->_adresse=$adr;
        $this->_prenom=$prenom;
        $this->_cni=$cni;
        $this->_nom=$nom;
        $this->_activite_entreprise=$activite;
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

    public function getAdresse(){
        return $this->_adresse;
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