<?php 
namespace App;

class autoloader{
    static function register(){
        spl_autoload_register(array(__CLASS__,'loadClass'));
    }

    static function loadClass($classname){

        

        //enlver le namespace dans la classname
        $a = str_replace(__NAMESPACE__.'\\',"",$classname);
       

        //remplacer antislash par slash
        $b = str_replace('\\','/',$a);

        

        //enlever le reprtoire de la fonction autoload
        $c =  str_replace("/public","", __DIR__ . '/' . $b . ".php");

        // echo $c;
        // die();

        if(file_exists($c)){
            require_once $c;
        }

    }
}


//load the class with his static methods 

autoloader::register();



?>