<?php
session_start();

// POUR STYLE
define("WEBROOT",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));
define("SRC_STYLE_JS",WEBROOT."Style_JS");
define("SRC_STYLE_CSS",WEBROOT."Style_CSS");
define("SRC_IMG",WEBROOT."img");



// POUR DOSSIER controllers , views and Models.
define("ROOT",str_replace("index.php","",$_SERVER['SCRIPT_FILENAME']));
define("SRC_VIEWS",ROOT."views");
define("SRC_DAO",ROOT."dao");
define("SRC_CONTROLLERS",ROOT."controllers");
define("SRC_MODELS",ROOT."models"); 

// echo '<meta http-equiv="refresh" content="0;URL=index.php?code=add_tissu">';
include_once(SRC_VIEWS."/login.html");

?>