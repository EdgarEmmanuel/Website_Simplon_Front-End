<?php 

include_once("Mysql_connect_class.php");


function getAgenceById($id){
        $conn = connect();
        $sql = "SELECT * FROM agences where id_agence=$id";

        $agence = $conn->query($sql)->fetchAll();
        return $agence;
    }




?>