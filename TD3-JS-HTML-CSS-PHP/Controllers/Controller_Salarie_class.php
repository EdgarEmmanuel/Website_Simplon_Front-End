<?php 

include_once(SRC_DAO."/SalarieImpl_class.php");
include_once(SRC_MODELS."/CSalarie_class.php");



class Salarie_Controller{

    public function redirect($val){
        if($val!=0){
            $_SESSION["message"]="INSERTION EFFECTUE AVEC SUCCES";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=addCompte">';
        }else{
            $_SESSION["message"]="PROBLEME SERVEUR ";
        echo '<meta http-equiv="refresh" content="0;URL=index.php?code=cni">';
        }
        
    }

    public function InsertSalarie($data){
        $ISalariImpl = new  SalarieImpl();

        $nom=$data["nom"];
        $prenom=$data["prenom"];
        $mat=$data["matricule"];
        $nomEnterforCL = $data["nom_Entreprise"];
        $cni=$data["cni"];
        $adresseforCL=$data["adresseforCl"];
        $email=$data["email"];
        $profession=$data["profession"];
        $telephone=$data["telephone"];

        //creation du Salarie
        $Salarie = new Client_Salarie($telephone,$email,$nom,$nomEnterforCL,$prenom,$cni,$adresseforCL,$mat,$profession);

        //insertion client et recuperation du lastInsertId()
        $idClient = $ISalariImpl->addSalarie($Salarie);

        return $idClient;
    }
    

    public function Salarie($data){
        $ISalariImpl = new  SalarieImpl();
        $idClient = $this->InsertSalarie($data);

        //variable en session getClientById($id)
        $_SESSION["idClient"]=$idClient;

        //avoir le nom Complet du Client
        $_SESSION["nomClient"]=$ISalariImpl->getClientById($idClient);

        //redirection
        $this->redirect($idClient);
    }



}







?>