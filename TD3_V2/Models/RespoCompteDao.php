<?php
include_once("Mysql_connect_class.php");


function getRespoByLoginAndMdp($login ,$mdp){
    $conn = connect();
    $respo=[];

        $sql = "SELECT * FROM responsable_compte where login='$login' and password='$mdp' ";

        $respo = $conn->query($sql)->fetchAll();
        return $respo;
    }

    function getAllInfoRespoById($id){
        $conn = connect();

        $sql = "SELECT * from employes where idEmploye=$id";

        $infosRespo = $conn->query($sql)->fetchAll();

        return $infosRespo;
    }




?>