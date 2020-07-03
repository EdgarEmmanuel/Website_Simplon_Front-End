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
    document.querySelector("#Adresse_Entreprise").value="";
        document.querySelector("#cle_rib").value="";
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
        document.querySelector("#montant").removeAttribute("disabled");
        document.querySelector("#date_m").removeAttribute("disabled");
        document.querySelector("#choix").style.display='none';
        document.querySelector("#choix2").style.display='none';
        
        //remove all the field required 
         document.querySelector("#raison_social").removeAttribute("required");
        document.querySelector("#nom_Entreprise").removeAttribute("required");
        document.querySelector("#date_deblocage").removeAttribute("required");
    document.querySelector("#Adresse_Entreprise").removeAttribute("required");
        document.querySelector("#date_deblocage").removeAttribute("required");
        document.querySelector("#cle_rib").removeAttribute("required");
        document.querySelector("#montant").removeAttribute("required");
        document.querySelector("#date_m").removeAttribute("required");
        document.querySelector("#frais").removeAttribute("required");
        document.querySelector("#fraisR").removeAttribute("required");
    }
    
    static verifyAccountBloque(){
        let cpt = 0;
        if(cle_rib.value===""){
           cpt+=1;
        cle_rib.style.borderColor='#FA6D63';
        }if(taux_agios.value===""){
               cpt+=1;
            taux_agios.style.borderColor='#FA6D63';
        }if(date_deblocage.value===""){ 
            cpt+=1;
            date_deblocage.style.borderColor='#FA6D63';
        }if(date_ouverture.value===""){
            cpt+=1;
            date_ouverture.style.borderColor='#FA6D63';
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
        if(document.querySelector("#raison_social").value.trim()===""){
           cpt+=1;
        document.querySelector("#raison_social").style.borderColor='#FA6D63';
        }if( document.querySelector("#taux_agios").value.trim()===""){
               cpt+=1;
             document.querySelector("#taux_agios").style.borderColor='#FA6D63';
        }if(document.querySelector("#Adresse_Entreprise").value.trim()===""){ 
            cpt+=1;
        document.querySelector("#Adresse_Entreprise").style.borderColor='#FA6D63';
        }if(document.querySelector("#nom_Entreprise").value.trim()===""){ 
            cpt+=1;
          document.querySelector("#nom_Entreprise").style.borderColor='#FA6D63';
        }if(document.querySelector("#montant").value.trim()===""){ 
            cpt+=1;
           document.querySelector("#montant").style.borderColor='#FA6D63';
        }if(document.querySelector("#cle_rib").value.trim()===""){ 
            cpt+=1;
           document.querySelector("#cle_rib").style.borderColor='#FA6D63';
        }if(date_ouverture.value===""){
            cpt+=1;
            date_ouverture.style.borderColor='#FA6D63';
            }
        if(cpt!=0){
            return 2;
        }else{
            return 1;
        }
    }
    
    static verifyAccountEpargne(){
        let cpt = 0;
        let verify =0;
        if( document.querySelector("#taux_agios").value.trim()===""){
               cpt+=1;
             document.querySelector("#taux_agios").style.borderColor='#FA6D63';
        }if(document.querySelector("#montant").value.trim()===""){ 
            cpt+=1;
           document.querySelector("#montant").style.borderColor='#FA6D63';
        }if(document.querySelector("#cle_rib").value.trim()===""){ 
            cpt+=1;
           document.querySelector("#cle_rib").style.borderColor='#FA6D63';
        }if(date_ouverture.value===""){
            cpt+=1;
            date_ouverture.style.borderColor='#FA6D63';
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
       
       //for the required attribute 
        document.querySelector("#date_deblocage").setAttribute("required","");
        document.querySelector("#cle_rib").setAttribute("required","");
        document.querySelector("#montant").setAttribute("required","");
        document.querySelector("#date_m").setAttribute("required","");
       document.querySelector("#frais").setAttribute("required","");
       
        
        //atomate the field for frais compte 
       document.querySelector("#choix").style.display='block';
       document.querySelector("#choix2").style.display='none';
    }
    
    static AccountEpargne(){
        UI_Compte.displayAll();
        document.querySelector("#raison_social").setAttribute("disabled","");
        document.querySelector("#date_deblocage").setAttribute("disabled","");
        document.querySelector("#Adresse_Entreprise").setAttribute("disabled","");
        document.querySelector("#nom_Entreprise").setAttribute("disabled","");
        
        //remove the attribute reqired for specific fields 
        document.querySelector("#cle_rib").setAttribute("required","");
        document.querySelector("#montant").setAttribute("required","");
        document.querySelector("#date_m").setAttribute("required","");
        document.querySelector("#frais").setAttribute("required","");
        
        
        //automate the field for frais compte 
        document.querySelector("#choix").style.display='block';
        document.querySelector("#choix2").style.display='none';
    }
    
    static AccountCourant(){
        UI_Compte.displayAll();
        document.querySelector("#date_deblocage").setAttribute("disabled","");
        
        //remove the attribute required for specific fields
         document.querySelector("#raison_social").setAttribute("required","");
        document.querySelector("#nom_Entreprise").setAttribute("required","");
    document.querySelector("#Adresse_Entreprise").setAttribute("required","");
        document.querySelector("#cle_rib").setAttribute("required","");
        document.querySelector("#montant").setAttribute("required","");
        document.querySelector("#date_m").setAttribute("required","");
        document.querySelector("#fraisR").setAttribute("required","");
        
        //automate field for frais compte 
        document.querySelector("#choix").style.display='none';
        document.querySelector("#choix2").style.display='block';
    }
}

//get all the account
UI_Compte.getTypeCompte();

//hiddng the div 

var div = document.querySelector(".div");
setTimeout(()=>{
        document.querySelector("main").removeChild(div);
},5000)


