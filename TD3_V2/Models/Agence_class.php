<?php 



class Agence{
    private $_adresse;
    private $_numeroAgence;


    public function __construct($adresse,$numAgence){
        $this->_adresse=$adresse;
        $this->_numeroAgence=$numAgence;
    }

    public function getAdresse(){
        return $this->_adresse;
    }

    public function setAdresse($adresse){
        $this->_adresse=$adresse;
    }

    public function getNumerAgence(){
        return $this->_numeroAgence;
    }

    public function setAgence($agence){
        $this->_numeroAgence=$agence;
    }
}






?>