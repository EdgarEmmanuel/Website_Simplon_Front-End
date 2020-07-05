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

//Gerer la date en global
$date = Date("yy-m-d");
$_SESSION["date"]=$date;

// POUR DOSSIER controllers , views and Models and Dao.
define("ROOT",str_replace("index.php","",$_SERVER['SCRIPT_FILENAME']));
define("SRC_VIEWS",ROOT."views");
define("SRC_CONTROLLERS",ROOT."Controllers");
define("SRC_MODELS",ROOT."Models"); 

// echo '<meta http-equiv="refresh" content="0;URL=index.php?code=add_tissu">';

//inclure les controllers et leurs variables
include_once(SRC_CONTROLLERS."/Controller_BP_Class.php");
include_once(SRC_CONTROLLERS."/Controller_Salarie.php");
include_once(SRC_CONTROLLERS."/Controller_Compte.php");
include_once(SRC_CONTROLLERS."/Controller_noSalarie.php");
include_once(SRC_CONTROLLERS."/Controller_Moral.php");


//pour  toutes les requetes get 
if(isset($_GET["code"])){
    $code = $_GET["code"];
    switch($code){
        case "cni": 
            if(!empty($_SESSION["nom_complet"])){
                getPageVerifyCNI();
            }else{
                getPageLogin();
            }
        break;
        case "addCompte": 
            if(empty($_SESSION["nom_complet"]) ){
                getPageLogin();
            }else if(!empty($_SESSION["nom_complet"]) && empty($_SESSION['nomClient']) && empty($_SESSION['idClient'])){
                getPageVerifyCNI();
            }else{
                getPageAddCompte();
            }
        break;
        case "login": 
            $controller->getPageLogin();
        break;
        case "newCli": 
            if(!empty($_SESSION["nom_complet"])){
            getPageAddClientSalarie();
            }else{
                getPageLogin();
            }
        break;
        case "CliNoSalarie": 
            if(!empty($_SESSION["nom_complet"])){
            getPageClientNoSalarie();
            }else{
                getPageLogin();
            }
        break;
        case "CliMoral": 
            if(!empty($_SESSION["nom_complet"])){
                getPageClientMoral();
            }else{
                getPageLogin();
            }
        break;
        //deconnexion
        case "deconnex": 
            Deconnexion();
        break;
        default : 
            getPageLogin();
        break;
    }
}else{
    getPageLogin();
}


//pour toutesles requetes post
if(isset($_POST["btn"])){
    $post = $_POST["btn"];
    switch($post){
        case "connex": 
            verifyPersonnel($_POST);
        break;
        case "cSalarie": 
            $controllerSalarie->Salarie($_POST);
        break;
        case "C_compte": 
            DecideAccountBeforeInsert($_POST);
            //echo '<meta http-equiv="refresh" content="0;URL=index.php?code=addCompte">';
        break;
        case "Cindependant" : 
            //var_dump($_POST);
            NoSalarie($_POST);
        break;
        case "CMoral": 
            //var_dump($_POST);
            MoralClient($_POST);
        break;
    }
}


?>