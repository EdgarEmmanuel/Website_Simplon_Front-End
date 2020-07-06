<?php

include_once(SRC_DAO."/EmpRespCompte_interface.php");
include_once(SRC_DAO."/RespoCompteImpl_class.php");
include_once(SRC_DAO."/SalarieImpl_class.php");
include_once(SRC_DAO."/AgenceImpl_class.php");
include_once(SRC_DAO."/NoSalarieImpl_class.php");
include_once(SRC_DAO."/MoralImpl_class.php");

class Controller_BP{

    public function getPageLogin(){
        include_once(SRC_VIEWS."/login.html");
    }

    
    public function getPageAddCompte(){
        include_once(SRC_VIEWS."/AddCompte.html");
    }

    public function getPageAddClientSalarie(){
        //getMatSalarie()
        $SalarieIMPL = new  SalarieImpl();
        $value = $SalarieIMPL->getMatSalarie();
        include_once(SRC_VIEWS."/AddClientSalarie.html");
    }

    public function getPageClientNoSalarie(){
        //generer le matricule pour client non salarie
        $NoSalarieIMPL = new NoSalarieImpl();
        $matriculeNoSalarie = $NoSalarieIMPL-> getMatriculeNoSalarie();
        include_once(SRC_VIEWS."/AddClientNoSalarie.html");
    }

    public function getPageClientMoral(){
        //
        $IMoralImpl = new  MoralImpl();
        $matriculeMoral =  $IMoralImpl->getMatriculeMoral();
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
        unset($_SESSION);
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=login">';
    }

    public function verifyRespoCompte($login,$mdp){
        $IRespo = new RespoCompteImpl();
        $AgenceImpl = new AgenceImpl();
        $respo = $IRespo->getRespoByLoginAndMdp($login ,$mdp);
        if(!empty($respo)){
            //recuperer l'id Employe du responsable et son matricule
            $_SESSION["idEmploye"] = (int)$respo->idEmp;
            $_SESSION["matricule"] = $respo->matricule;

            //pour aller recuperer les donnees(nom et prenom) de l'utilisateur avec son IDEmploye
            $infos = $IRespo->getAllInfoRespoById($_SESSION["idEmploye"]);
            $_SESSION["nom_complet"]=$infos->nom." ".$infos->prenom;
            $_SESSION["idAgence"]=$infos->idagencEmploye;

            //recuperer l'ID de l'agence
           $value = $AgenceImpl->getAgenceById($infos->idagencEmploye);
           $_SESSION["numAgence"]=$value;


            //redirection vers la page VerifyCNI.html
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }else{
            $_SESSION["message"]="VOUS N'ETES PAS PRESENTS DANS LE SYSTEME";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?code=login">';
        }
    }


    public function ClientAbsentDuSysteme(){
        $_SESSION["message"]="CLIENT ABSENT DU SYSTEME !!!";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
    }

    public function getClientById($data){
        $matricule = $data["matricule"];

        //concatenation des 3 premiers caracteres
        $DebutMatricule = $matricule[0].$matricule[1].$matricule[2];

        //creer l'implementation de Client Salarie
        $SalarieIMPL = new SalarieImpl();

        //creer l'implementation du Client Moral
        $NoSalarieIMPL = new NoSalarieImpl();

        

        //verififier et faire un traitement en fonction du debut de matricule
        switch($DebutMatricule){
            case "BPS": 
                $result = $SalarieIMPL->getClientByMatricule($matricule);
                if($result==false){
                    $this->ClientAbsentDuSysteme();
                }else{
                    //donner toutes les valeurs
                    $_SESSION["idClient"]=(int)$result->idClient;
                    $_SESSION["nomClient"]=$SalarieIMPL->getClientById($_SESSION["idClient"]);

                    //faire une redirection
                    $_SESSION["message"]="CLIENT PRESENT DANS LE  SYSTEME !!!";
                    echo '<meta http-equiv="refresh" content="0;URL=index.php?code=addCompte">';
                }
            break;
            case "BCI": 
               $result = $NoSalarieIMPL->getClientNOSByMatricule($matricule);
               if($result==false){
                $this->ClientAbsentDuSysteme();
               }else{
                   //recuperer toutes les valeurs
                   $_SESSION["idClient"]=(int)$result->idClient;
                   $_SESSION["nomClient"]=$NoSalarieIMPL->getClientNoSById((int)$result->idClient);

                    //faire une redirection
                    $_SESSION["message"]="CLIENT PRESENT DANS LE  SYSTEME !!!";
                    echo '<meta http-equiv="refresh" content="0;URL=index.php?code=addCompte">';
               }
            break;
            case "BCM": 
                echo "Client Moral";
            break;
            default :
                $_SESSION["message"]="CLIENT ABSENT DU SYSTEME !!!";
                echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
            break;
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


    public function repartirVersAccueil(){
        unset($_SESSION["idClient"]);
        unset($_SESSION["nomClient"]);
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
    }

   

}




?>