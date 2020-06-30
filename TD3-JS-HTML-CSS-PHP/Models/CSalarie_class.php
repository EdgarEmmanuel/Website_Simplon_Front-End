<?php 

include_once(SRC_MODELS."/Client_class.php");


class Client_Salarie extends Client{
    private $_nom;
    private $_prenom;
    private $_cni;
    private $_salaire;
    private $_nomEntreprise;
    private $_adresseEntreprise;
    private $_profession;

    public function __construct($tel,$mail,$nom,$nomEntreprise,$prenom,$cni,$salaire,$adreEntre,$matricule,$profession){
        parent::__construct( $tel , $mail,$matricule);
        $this->_prenom=$prenom;
        $this->_cni=$cni;
        $this->_nom=$nom;
        $this->_nom_entreprise=$nomEntreprise;
        $this->_salaire=$salaire;
        $this->_profession=$profession;
        $this->_adresseEntreprise=$adreEntre;
    }

    public function getProfession(){
        return $this->_profession;
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

    public function getAdresseEntreprise(){
        return $this->_adresseEntreprise;
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