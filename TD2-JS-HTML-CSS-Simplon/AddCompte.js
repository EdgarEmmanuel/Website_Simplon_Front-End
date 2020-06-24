class UI_Compte{
    
    static getTypeCompte(){
        document.querySelector("#type_m").addEventListener("change",()=>{
            var valueOption = document.querySelector("#type_m").value;
            switch(valueOption){
                case 'Epargne': 
                    UI_Compte.AccountEpargne();
                    break;
                case 'Courant': 
                    UI_Compte.AccountCourant();
                    break;
                case 'Bloque':
                    UI_Compte.AccountBloque();
                    break;
                default:
                    UI_Compte.displayAll();
                    break;
            }
        });
    }
    
    static clearFieldCompte(){
          document.querySelector("#raison_social").value="";
        document.querySelector("#nom_Entreprise").value="";
        document.querySelector("#date_deblocage").value="";
    document.querySelector("#Adresse_Entreprise").value="";
        document.querySelector("#date_deblocage").value="";
        document.querySelector("#cle_rib").value="";
        document.querySelector("#taux_agios").value="";
        document.querySelector("#montant").value="";
    }
    
    static displayAll(){
        UI_Compte.clearFieldCompte();
        document.querySelector("#raison_social").removeAttribute("disabled");
        document.querySelector("#nom_Entreprise").removeAttribute("disabled");
        document.querySelector("#date_deblocage").removeAttribute("disabled");
    document.querySelector("#Adresse_Entreprise").removeAttribute("disabled");
        document.querySelector("#date_deblocage").removeAttribute("disabled");
        document.querySelector("#cle_rib").removeAttribute("disabled");
        document.querySelector("#taux_agios").removeAttribute("disabled");
        document.querySelector("#montant").removeAttribute("disabled");
    }
    
     
    static verifyAccountEpargne(){
        let cpt = 0;
      if( document.querySelector("#taux_agios").value.trim()===""){
               cpt+=1;
             document.querySelector("#taux_agios").style.borderColor='#FA6D63';
        }if(document.querySelector("#montant").value.trim()===""){ 
            cpt+=1;
           document.querySelector("#montant").style.borderColor='#FA6D63';
        }if(document.querySelector("#cle_rib").value.trim()===""){ 
            cpt+=1;
           document.querySelector("#cle_rib").style.borderColor='#FA6D63';
        }
        if(cpt!=0){
            return 2;
        }else{
            return 1;
        }
    }
    
    
    static verifyAccountBloque(){
        let cpt = 0;
        let verify =0;
        if(document.querySelector("#cle_rib").value.trim()===""){
           cpt+=1;
        document.querySelector("#cle_rib").style.borderColor='#FA6D63';
        }if( document.querySelector("#taux_agios").value.trim()===""){
               cpt+=1;
             document.querySelector("#taux_agios").style.borderColor='#FA6D63';
        }if(document.querySelector("#date_deblocage").value.trim()===""){ 
            cpt+=1;
           document.querySelector("#date_deblocage").style.borderColor='#FA6D63';
        }
        if(cpt!=0){
            return 2;
        }else{
            return 1;
        }
    }
    
    static verifyAccountCourant(){
        let cpt = 0;
        let verify =0;
        if(document.querySelector("#cle_rib").value.trim()===""){
           cpt+=1;
        document.querySelector("#cle_rib").style.borderColor='#FA6D63';
        }if( document.querySelector("#taux_agios").value.trim()===""){
               cpt+=1;
             document.querySelector("#taux_agios").style.borderColor='#FA6D63';
        }if(document.querySelector("#montant").value.trim()===""){ 
            cpt+=1;
           document.querySelector("#montant").style.borderColor='#FA6D63';
        }if( document.querySelector("#raison_social").value.trim()===""){
               cpt+=1;
             document.querySelector("#raison_social").style.borderColor='#FA6D63';
        }if(  document.querySelector("#Adresse_Entreprise").value.trim()===""){
               cpt+=1;
        document.querySelector("#Adresse_Entreprise").style.borderColor='#FA6D63';
        }if(  document.querySelector("#nom_Entreprise").value.trim()===""){
               cpt+=1;
        document.querySelector("#nom_Entreprise").style.borderColor='#FA6D63';
        }
        if(cpt!=0){
            return 2;
        }else{
            return 1;
        }
    }
    
    static AccountBloque(){
        UI_Compte.displayAll();
        document.querySelector("#raison_social").setAttribute("disabled","");
        document.querySelector("#nom_Entreprise").setAttribute("disabled","");
        document.querySelector("#Adresse_Entreprise").setAttribute("disabled","");
         document.querySelector("#montant").setAttribute("disabled","");
        
        //atomate the field for frais compte 
        document.querySelector("#Frais_Compte").value="Frais Ouverture : 10000FCFA";
    }
    
    static AccountEpargne(){
        UI_Compte.displayAll();
        document.querySelector("#raison_social").setAttribute("disabled","");
        document.querySelector("#nom_Entreprise").setAttribute("disabled","");
        document.querySelector("#date_deblocage").setAttribute("disabled","");
        document.querySelector("#Adresse_Entreprise").setAttribute("disabled","");
        
        //automate the field for frais compte 
        document.querySelector("#Frais_Compte").value="Frais Ouverture : 9000FCFA";
    }
    
    static AccountCourant(){
        UI_Compte.displayAll();
        document.querySelector("#date_deblocage").setAttribute("disabled","");
        
        //automate field for frais compte 
        document.querySelector("#Frais_Compte").value="Frais Ouverture : 10000FCFA";
    }
}




class UI_AddCompte{
    static displayInfoClient(){
        //insert the dynamic data into a variable
        let client = JSON.parse(localStorage.getItem("client"));
       //displaying data in all the fields
        document.querySelector("#prenom").value=`${client.nom}`;
        document.querySelector("#idClient").value=`${client.idClient}`;
        document.querySelector("#cni").value=`${client.cni}`;
        
         //creation d'une date 
            var tr ="";
            var t ="";
            var date = new Date();
            if(date.getDate().toLocaleString().length==2  ) {
                tr = date.getDate().toLocaleString();
            }else{
                tr="0"+date.getDate().toLocaleString();
            }
            if(date.getMonth().toLocaleString().length==2){
                t = date.getMonth().toLocaleString();
            }else{
                t = "0"+date.getMonth().toLocaleString();
            }
        document.querySelector("#date_m").value=`${tr}/${t}/${date.getFullYear()}`;
        
        //for the account treatment
        document.querySelector("#numCompte").value='CI567';
         
         //pour numero agence
         document.querySelector("#numeroAgence").value='Numero Agence : BP0056';
    }
    
    
     static redirection(url){
        location.href=url;
    }

}

//displaying userData
if(localStorage.getItem("client")!=null){
    UI_AddCompte.displayInfoClient();
}

//set the fields for the form enable or disable
UI_Compte.getTypeCompte();


//return to the index page 
document.querySelector("#return").addEventListener("click",(e)=>{
    UI_AddCompte.redirection("index.html");
});



document.querySelector("#btn_create").addEventListener("click",(e)=>{
    e.preventDefault();
    var valeur=document.querySelector("#type_m").value;
    let t=0;
    if(valeur=="Epargne"){ 
            t=UI_Compte.verifyAccountEpargne();
            if(t==1){
                alert("INSERTION EFFECTUE AVEC SUCCES !!!");
            }else{
                alert("Veuillez Remplir les champs en Rouge");
            }
    }else if(valeur=="Courant"){
        t = UI_Compte.verifyAccountCourant();
             if(t==1){
                 alert("Insertion Effectuee avec Success!!!");
             }else{
                  alert("Veuillez Remplir les champs en Rouge");
             }
    }else{
        alert("Veuillez Specifier le Type de Compte !!!!");
    }
})