<?php 

include_once(SRC_MODELS."/Client_class.php");


class Client_Salarie extends Client{
    private $_telephone;
    private $_mail;
    private $_nom;
    private $_prenom;
    private $_cni;
    private $_salaire;
    private $_nomEntreprise;
    private $_adresseEntreprise;

    public function __construct($tel,$mail,$nom,$nomEntreprise,$prenom,$cni,$salaire,$adreEntre){
        parent::__construct( $tel , $mail);
        $this->_prenom=$prenom;
        $this->_cni=$cni;
        $this->_nom=$nom;
        $this->_nom_entreprise=$nomEntreprise;
        $this->_salaire=$salaire;
        $this->_adresseEntreprise=$adreEntre;
    }

    public function getTelephone(){
        return $this->_telephone;
    }

    public function getMail(){
        return $this->_mail;
    }

    public function getSalaire(){
        return $this->_salaire;
    }

    public function getCni(){
        return $this->_cni;
    }

    public function nomEntreprise(){
        return $this->_nomEntreprise;
    }

    public function getAdresse(){
        return $this->_adresseEntreprise;
    }

    public function getNom(){
        return $this->_nom;
    }

    public function getPrenom(){
        return $this->_prenom;
    }
}













?>