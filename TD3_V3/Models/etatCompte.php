<?php 

namespace App\Models;

class etatCompte{

    
    private $_etat;
    private $_dateChangement;

    public function __construct($etat,$date){
        $this->_etat;
        $this->_dateChangement;
    }

    public function getEtat(){
        return $this->_etat;
    }

    public function getDate(){
        return $this->_dateChangement;
    }

    public function setEtat($etat){
        $this->_etat=$etat;
    }

    public function setDate($date){
        $this->_dateChangement=$date;
    }



}












?>