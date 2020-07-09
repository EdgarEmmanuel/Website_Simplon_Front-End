<?php

namespace App\Dao;

class MySqlConnection {
    private static $_pdo;
 private static $USER = "root";
 private static  $PASSWD="" ;
 private static $SERVER="localhost";
 private static $BASE="banque_peuple"; 

    public static function getConnection(){
            $dsn="mysql:dbname=".self::$BASE.";host=".self::$SERVER;
            try{
                self::$_pdo=new \PDO($dsn,self::$USER,self::$PASSWD);
                self::$_pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            }
            catch(\PDOException $e){
                printf("Échec de la connexion : %s\n", $e->getMessage());
                exit();
            }
    }

    public static function lastInsertId(){
        return self::$_pdo->lastInsertId();
    }

    public static  function executeUpdate($sql){
         return self::$_pdo->exec($sql);
    }

    public static function execOne($sql){
        $data=[];
        if(!self::$_pdo->query($sql)) echo "Pb d'accès à la Basse de Donnée";
        else{
            $data=self::$_pdo->query($sql)->fetch() ;
        }
        return $data;
    }

    public static  function executeAll($sql){
        $data=[];
        if(!self::$_pdo->query($sql)) echo "Pb d'accès à la Base de Donnée";
        else{
                $data=self::$_pdo->query($sql)->fetchAll() ;
         }
        return $data;
    }

}

?>