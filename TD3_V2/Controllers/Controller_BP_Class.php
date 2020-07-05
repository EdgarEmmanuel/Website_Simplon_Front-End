<?php
include_once(SRC_MODELS."/RespoCompteDao.php");
include_once(SRC_MODELS."/SalarieDao.php");
include_once(SRC_MODELS."/AgenceDao.php");
include_once(SRC_MODELS."/NoSalarieDao.php");
include_once(SRC_MODELS."/MoralDao.php");


    function getPageLogin(){
        include_once(SRC_VIEWS."/login.html");
    }

    
    function getPageAddCompte(){
        include_once(SRC_VIEWS."/AddCompte.html");
    }

    function getPageAddClientSalarie(){
        $value = getMatSalarie();
        include_once(SRC_VIEWS."/AddClientSalarie.html");
    }

    function getPageClientNoSalarie(){
        $matriculeNoSalarie = getMatriculeNoSalarie();
        include_once(SRC_VIEWS."/AddClientNoSalarie.html");
    }

      function getPageClientMoral(){
        $matriculeMoral =  getMatriculeMoral();
        include_once(SRC_VIEWS."/AddClientMoral.html");
    }

      function getPageVerifyCNI(){
        include_once(SRC_VIEWS."/verifyCNI.html");
    }

      function getPageOPerations(){
        include_once(SRC_VIEWS."/operations.html");
    }


    //deconnexion fonction
      function Deconnexion(){
        session_unset();
        unset($_SESSION);
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=login">';
    }

      function verifyRespoCompte($login,$mdp){
        $respo = getRespoByLoginAndMdp($login ,$mdp);
        
        if(!empty($respo)){
            //recuperer l'id Employe du responsable et son matricule
            $_SESSION["idEmploye"] = (int)$respo[0]["idEmp"];
            $_SESSION["matricule"] = $respo[0]["matricule"];

            //pour aller recuperer les donnees(nom et prenom) de l'utilisateur avec son IDEmploye
            $infos = getAllInfoRespoById($_SESSION["idEmploye"]);
            $_SESSION["nom_complet"]=$infos[0]["nom"]." ".$infos[0]["prenom"];
            $_SESSION["idAgence"]=$infos[0]["idagencEmploye"];
            // var_dump($_SESSION);
            //     die();

            //recuperer l'ID de l'agence
           $value = getAgenceById($infos[0]["idagencEmploye"]);
        
           $_SESSION["numAgence"]=$value[0]["numero_agence"];


            //redirection vers la page VerifyCNI.html
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }else{
            $_SESSION["message"]="VOUS N'ETES PAS PRESENTS DANS LE SYSTEME";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=login">';
        }
    }

      function verifyPersonnel($data){
        $personne = $data["type"];
        $password = $data["password"];
        $login = $data["login"];
        if($personne=="" || $password=="" || $login==""){
            $_SESSION["message"]="VEUILLEZ REMPLIR TOUS LES CHAMPS ";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=login">';
        }else{
            switch($personne){
                case "caissiere": 
                getPageOPerations();
                break;
                case "responsable": 
                verifyRespoCompte($login,$password);
                break;
                case "administrateur": 
                    echo "administrateur";
                break;
                }
        }
        
    }




?>