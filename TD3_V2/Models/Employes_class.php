<?php



class Employes{
    protected $_nom;
    protected $_prenom;
    protected $_adresse;
    protected $_mail;
    
    public function __construct($nom,$prenom,$adresse,$mail){
        $this->_nom=$nom;
        $this->_prenom=$prenom;
        $this->_adresse=$adresse;
        $this->_mail=$mail;
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
        return $this->_mail;
    }
    
}










?>