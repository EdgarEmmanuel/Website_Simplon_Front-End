<?php
session_start();

// POUR STYLE
define("WEBROOT",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));

//chemin absolu pour dossier Style_JS
define("SRC_STYLE_JS",WEBROOT."Style_JS");

//chemin absolu pour dossier Style_CSS
define("SRC_STYLE_CSS",WEBROOT."Style_CSS");

//chemin absolu pour dossier img
define("SRC_IMG",WEBROOT."Images");

// POUR DOSSIER controllers , views and Models and Dao.
define("ROOT",str_replace("index.php","",$_SERVER['SCRIPT_FILENAME']));
define("SRC_VIEWS",ROOT."views");
define("SRC_DAO",ROOT."Dao");
define("SRC_CONTROLLERS",ROOT."Controllers");
define("SRC_MODELS",ROOT."Models"); 

// echo '<meta http-equiv="refresh" content="0;URL=index.php?code=add_tissu">';

//inclure le controllers
include_once(SRC_CONTROLLERS."/Controller_BP_Class.php");
$controller = new Controller_BP();

//pour les pages 
if(isset($_GET["code"])){
    $code = $_GET["code"];
    switch($code){
        case "cni": 
            $controller->getPageVerifyCNI();
        break;
        case "login": 
            $controller->getPageLogin();
        break;
        case "newCli": 
            $controller->getPageAddClientSalarie();
        break;
        case "CliNoSalarie": 
            $controller->getPageClientNoSalarie();
        break;
        case "CliMoral": 
            $controller->getPageClientMoral();
        break;
        //deconnexion
        case "deconnex": 
            $controller->Deconnexion();
        break;
        default : 
            $controller->getPageLogin();
        break;
    }
}else{
    $controller->getPageLogin();
}


//pour les post

if(isset($_POST["btn"])){
    $post = $_POST["btn"];
    switch($post){
        case "connex": 
            //var_dump($_POST);
            $controller->verifyPersonnel($_POST);
            //echo '<meta http-equiv="refresh" content="0;URL=index.php?code=login">';
        break;
        case "cSalarie": 
            //var_dump($_POST);
            $controller->Salarie($_POST);
            //echo '<meta http-equiv="refresh" content="0;URL=index.php?code=newCli">';
        break;
    }
}


?>