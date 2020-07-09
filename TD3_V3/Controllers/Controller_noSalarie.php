<?php 


namespace App\Controllers;

include_once SRC_PUBLICAUTO."/autoloadFile.php";
// include_once(SRC_DAO."/NoSalarieImpl_class.php");
// include_once(SRC_MODELS."/CNoSalarie_class.php");

class Controller_noSalarie{

    public function redirect($val){
        if($val!=0){
            $_SESSION["message"]="INSERTION EFFECTUE AVEC SUCCES";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=addCompte">';
        }else{
            $_SESSION["message"]="PROBLEME SERVEUR ";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }
        
    }

    private function InsertNoSalarie($data){
        $ISalariImpl = new  \App\Dao\NoSalarieImpl();

        $nom=$data["nomi"];
        $prenom=$data["prenomi"];
        $mat=$data["mati"];
        $cni=$data["cni"];
        $adresse=$data["adressei"];
        $email=$data["emaili"];
        $activite=$data["activitei"];
        $telephone=$data["teli"];

        //creation du Salarie
        $Salarie = new \App\Models\Client_Non_Salarie($telephone,$email,$nom,$activite,$prenom,$cni,$mat,$adresse);

        //insertion client et recuperation du lastInsertId()
        $idClient = $ISalariImpl->addCNoSalarie($Salarie);

        return $idClient;
    }


    public function NoSalarie($data){
        $ISalariImpl = new  \App\Dao\NoSalarieImpl();
        $idClient = $this->InsertNoSalarie($data);

        //variable en session 
        $_SESSION["idClient"]=$idClient;

        //avoir le nom Complet du Client Non Salarie INserer
        $_SESSION["nomClient"]=$ISalariImpl->getClientNoSById($idClient);

        //redirection
        $this->redirect($idClient);

    }



}














?>