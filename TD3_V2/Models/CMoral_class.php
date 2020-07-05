<?php 

include_once(SRC_MODELS."/Client_class.php");

class Client_Moral extends Client{
    private $_adresse;
    private $_type_entreprise;
    private $_activite_entreprise; 
    private $_nom_entreprise;
    private $_ninea;
   
    public function __construct($adr,$tel,$mail,$type,$activite,$nomEnter,$matricule,$ninea){
        parent::__construct($tel , $mail,$matricule);
        $this->_adresse=$adr;
        $this->_type_entreprise=$type;
        $this->_activite_entreprise=$activite;
        $this->_nom_entreprise=$nomEnter;
        $this->_ninea=$ninea;
    }

    public function getNinea(){
        return $this->_ninea;
    }

    public function getTypeEntreprise(){
        return $this->_type_entreprise;
    }

    public function getActiviteEntreprise(){
        return $this->_activite_entreprise;
    }

    public function getNomEntreprise(){
        return $this->_nom_entreprise;
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