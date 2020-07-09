<?php

namespace App\Dao;

interface IResponsableCompte {
    public function getRespoByLoginAndMdp($login ,$mdp);
    public function getAllInfoRespoById($id);
}







?>