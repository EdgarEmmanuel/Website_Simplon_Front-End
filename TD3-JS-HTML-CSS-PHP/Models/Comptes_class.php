<?php

include_once(SRC_MODELS."/Client_class.php");

class Comptes {
    protected $_numCompte;
    protected $_cleRib;
    protected $_dateOuverture;
    protected  $_Client;
    protected $_idRespoCompte;
    protected $_idAgence;
    protected $_idAgios;

    public function __construct($numCompte,$cleRib,$dateOu,$idCl,$idResp,$idAgence,$idAgios){
           $this->_cleRib=$cleRib;
           $this->_numCompte=$numCompte;
           $this->_dateOuverture = $dateOu;
           $this->_idRespoCompte = $idResp;
           $this->_idAgence = $idAgence;
           $this->_idClient=$idCl;
           $this->_idAgios=$idAgios;
    }

    public function getIdAgence(){
        return $this->_idAgence;
    }


    public function getIdRespo(){
        return $this->_idRespoCompte;
    }

    public function getIdClient(){
        return $this->_idClient;
    }


    public function getNumCompte(){
        return $this->_numCompte;
    }

    public function getCleRib(){
        return $this->_cleRib;
    }

    public function getDateOuvert(){
        return $this->_dateOuverture;
    }

    public function getIdAgios(){
        return $this->_idAgios;
    }
}




?>