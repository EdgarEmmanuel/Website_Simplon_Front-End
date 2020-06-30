<?php

include_once(SRC_DAO."/EmpRespCompte_interface.php");
include_once(SRC_DAO."/RespoCompteImpl_class.php");
include_once(SRC_DAO."/SalarieImpl_class.php");
include_once(SRC_DAO."/EpargneImpl_class.php");

class Controller_BP{

    public function getPageLogin(){
        include_once(SRC_VIEWS."/login.html");
    }

    public function getPageAddCompte(){
        include_once(SRC_VIEWS."/AddCompte.html");
    }

    public function getPageAddClientSalarie(){
        include_once(SRC_VIEWS."/AddClientSalarie.html");
    }

    public function getPageClientNoSalarie(){
        include_once(SRC_VIEWS."/AddClientNoSalarie.html");
    }

    public function getPageClientMoral(){
        include_once(SRC_VIEWS."/AddClientMoral.html");
    }

    public function getPageVerifyCNI(){
        include_once(SRC_VIEWS."/verifyCNI.html");
    }

    public function getPageOPerations(){
        include_once(SRC_VIEWS."/operations.html");
    }


    //deconnexion fonction
    public function Deconnexion(){
        session_unset();
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=login">';
    }

    public function verifyRespoCompte($login,$mdp){
        $IRespo = new RespoCompteImpl();
        $respo = $IRespo->getRespoByLoginAndMdp($login ,$mdp);
        if(!empty($respo)){
            //recuperer l'id Employe du responsable et son matricule
            $_SESSION["idEmploye"] = (int)$respo->idEmp;
            $_SESSION["matricule"] = $respo->matricule;

            //pour aller recuperer les donnees(nom et prenom) du client avec son IDEmploye
            $infos = $IRespo->getAllInfoRespoById($_SESSION["idEmploye"]);
            $_SESSION["nom_complet"]=$infos->nom." ".$infos->prenom;
            $_SESSION["idAgence"]=$infos->idagencEmploye;

           
            //redirection vers la page VerifyCNI.html
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }else{
            $_SESSION["message"]="VOUS N'ETES PAS PRESENTS DANS LE SYSTEME";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=login">';
        }
    }

    public function verifyPersonnel($data){
        $personne = $data["type"];
        $password = $data["password"];
        $login = $data["login"];
        if($personne=="" || $password=="" || $login==""){
            $_SESSION["message"]="VEUILLEZ REMPLIR TOUS LES CHAMPS ";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=login">';
        }else{
            switch($personne){
                case "caissiere": 
                    $this->getPageOPerations();
                break;
                case "responsable": 
                $this->verifyRespoCompte($login,$password);
                break;
                case "administrateur": 
                    echo "administrateur";
                break;
                }
        }
        
    }

    public function SalarieAndEpargne($data){
        $nom=$data["nom"];
        $prenom=$data["prenom"];
        $mat=$data["matricule"];
        $nomEntreprise=$data[""];
        $adresse=$data["adresse"];
        $email=$data["email"];
        $profession=$data["profession"];
        $telephone=$data["telephone"];
        $ISalariImpl = new  RespoCompteImpl();
        $EpargneImpl = new EpargneImpl();
    }


    public function Salarie($data){
        $type = $data["typeCompte"];
        switch($type){
            case "Epargne": 
                $this->SalarieAndEpargne($data);
            break;
            case "Bloque" : 
                echo "bloque";
            break;
            case "Courant": 
                echo "courant";
            break;
        }
    }

}




?>