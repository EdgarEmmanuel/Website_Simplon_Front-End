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
    
    
    static verifyAccountBloque(){
        let cpt = 0;
        let verify =0;
        if(cle_rib.value===""){
           cpt+=1;
        cle_rib.style.borderColor='#FA6D63';
        }if(taux_agios.value===""){
               cpt+=1;
            taux_agios.style.borderColor='#FA6D63';
        }if(date_deblocage.value===""){ 
            cpt+=1;
            date_deblocage.style.borderColor='#FA6D63';
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
UI_AddCompte.displayInfoClient();

//set the fields for the form enable or disable
UI_Compte.getTypeCompte();



document.querySelector("#return").addEventListener("click",(e)=>{
    UI_AddCompte.redirection("index.html");
})