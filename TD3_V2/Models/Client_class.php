<?php 

class Client{
    protected $_telephone;
    protected $_mail;
    protected $_mat;

    public function __construct($telephone , $mail,$matricule){
        $this->_telephone=$telephone;
        $this->_mail=$mail;
        $this->_mat=$matricule;
    }

    public function getMatricule(){
        return $this->_mat;
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


    public function setTelephone($tel){
        $this->_telephone=$tel;
    }
}








?>