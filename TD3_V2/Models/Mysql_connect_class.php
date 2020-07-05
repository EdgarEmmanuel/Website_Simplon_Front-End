<?php
define('USER',"root");
define('PASSWD',"");
define('SERVER',"localhost");
define('BASE',"banque_peuple");

function connect(){
//Chaine de Connexion
  $dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
      $connexion=new PDO($dsn,USER,PASSWD);
      $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }

    return  $connexion;
}

?>