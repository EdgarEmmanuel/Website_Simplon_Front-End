<?php


interface IResponsableCompte {
    public function getRespoByLoginAndMdp($login ,$mdp);
    public function getAllInfoRespoById($id);
}







?>