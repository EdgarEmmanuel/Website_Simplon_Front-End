<?php 

include_once(SRC_MODELS."/Comptes_class.php");

class ComptEpargne extends Comptes {
    private $_solde;
    private $_fraisOuverture;

    public function __construct($numCompte,$cleRib,$dateOuv,$idCl,$idResp,$idAgence,$idAgios,$solde,$fraisOuvert){
        parent::__construct($numCompte,$cleRib,$dateOuv,$idCl,$idResp,$idAgence,$idAgios);
        $this->_solde=$solde;
        $this->_fraisOuverture=$fraisOuvert;
    }

    public function getSolde(){
        return $this->_solde;
    }

    public function setSolde($solde){
        return $this->_solde=$solde;
    }

    public function getFraisOuverture(){
        return $this->_fraisOuverture;
    }

    public function getIdAgios(){
        return parent::getIdAgios();
    }

public function getIdRespo(){
    return parent::getIdRespo();
}

 public function getIdClient(){
     return parent::getIdClient();
 }

 public function getNumCompte(){
     return parent::getNumCompte();
 }

 public function getIdAgence(){
     return parent::getIdAgence();
 }

 public function getDateOuverture(){
     return parent::getDateOuvert();
 }

 public function getCleRib(){
     return parent::getCleRib();
 }


}
?>