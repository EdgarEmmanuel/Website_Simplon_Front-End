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

if(isset($_GET["page"])){

}else{
    $controller->getPageLogin();
}
$req = 2;
if($req==2){
    $data = json_decode(file_get_contents("php://input"));
    var_dump($data);
}

?>