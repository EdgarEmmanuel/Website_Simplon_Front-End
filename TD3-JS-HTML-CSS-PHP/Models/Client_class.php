<?php 

class Client{
    protected $_telephone;
    protected $_mail;

    public function __construct($telephone , $mail){
        $this->_telephone=$telephone;
        $this->_mail=$mail;
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