<?php

namespace App\Models;

include_once SRC_PUBLICAUTO."/autoloadFile.php";

//include_once(SRC_MODELS."/Employes_class.php");


class ResponsableCompte extends Employes{
    private $_matricule;
    private $_login;
    private $_password;

    public function __construct($nom,$prenom,$adresse,$mail,$login,$pwd,$matricule){
        parent::__construct($nom,$prenom,$adresse,$mail);
        $this->_matricule=$matricule;
        $this->_password=$pwd;
        $this->_login=$login;
    }

    public function getNom(){
        return parent::getNom();
    }

    public function getPrenom(){
        return parent::getPrenom();
    }

    public function getAdresse(){
        return parent::getAdresse();
    }

    public function getMail(){
        return parent::getMail();
    }

    public function getMatricule(){
        return $this->_matricule;
    }

    public function getLogin(){
        return $this->_login;
    }

    public function getPassword(){
        return $this->_password;
    }
}










?>