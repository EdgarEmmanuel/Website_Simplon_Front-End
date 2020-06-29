<?php 



class Client{
    protected $_adresse;
    protected $_telephone;
    protected $_mail;

    public function __construct($adresse , $telephone , $mail){
        $this->_adresse=$adresse;
        $this->_telephone=$telephone;
        $this->_mail=$mail;
    }

    public function getAdresse(){
        return $this->_adresse;
    }

    public function getTelephone(){
        return $this->_telephone;
    }

    public function getMail(){
        return $this->_mail;
    }

    public function setMail($mail){
        $this->_mail=$mail;
    }

    public function setAdresse($adr){
        $this->_adresse=$adr;
    }

    public function setTelephone($tel){
        $this->_telephone=$tel;
    }
}








?>