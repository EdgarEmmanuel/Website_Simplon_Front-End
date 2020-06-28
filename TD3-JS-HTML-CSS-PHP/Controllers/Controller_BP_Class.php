<?php


class Controller_BP{
    public function getPageLogin(){
        $pr=200;
        include_once(SRC_VIEWS."/login.html");
    }

    public function getPageAddCompte(){
        include_once(SRC_VIEWS."/AddCompte.html");
    }

    public function getPageAddClient(){
        include_once(SRC_VIEWS."/AddClient.html");
    }

    public function getPageVerifyCNI(){
        include_once(SRC_VIEWS."/verifyCNI.html");
    }
}




?>