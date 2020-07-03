
//=================================Page addclientSalrie.html===========================


//get all the button afetr the div with class compte
var btn_m = document.querySelector(".button_for_m");
var btn_i= document.querySelector(".button_for_i");
var btn_s=document.querySelector(".button_for_s");


//get all my input fields in the form 
let raison =document.querySelector("#raison_social");
let cle_rib = document.querySelector("#cle_rib");
let taux_agios = document.querySelector("#taux_agios");
let nom_enterprise = document.querySelector("#nom_Entreprise");
let adrr_entreprise = document.querySelector("#Adresse_Entreprise");
let date_deblocage = document.querySelector("#date_deblocage");
let date_ouverture = document.querySelector("#date_m");





class UI_Salarie{
   
    
     static clearFiedlC_salarie(){
        document.querySelector("#nom_salarie").value="";
        document.querySelector("#prenom_salarie").value="";
        document.querySelector("#addr_salarie").value="";
        document.querySelector("#tele_salarie").value="";
        document.querySelector("#email_salarie").value="";
        document.querySelector("#emploi_salarie").value="";
        document.querySelector("#NameEnter_salarie").value="";
    }
    
    
    static verifyFieldNom(){
        
        //for nom
        document.querySelector("#nom_salarie").addEventListener('keyup',(e)=>{
            e.preventDefault();
            if(e.code[3]==="i"){
               var a =document.querySelector("#nom_salarie").value.trim().length;
                var recup="";
                for(var i=0;i<a-1;i++){
                    recup+=document.querySelector("#nom_salarie").value[i];
                }
                document.querySelector("#nom_salarie").value=recup;
            }
        });
        
        document.querySelector("#nom_salarie").addEventListener('blur',(e)=>{
            e.preventDefault();
            if(document.querySelector("#nom_salarie").value===""){
                document.querySelector("#nom_salarie").style.borderColor='#FA6D63';
                 UI.messageDis("Tous les champs sont Obligatoires");
            }else{
                document.querySelector("#nom_salarie").style.borderColor='none';
            }
        })
        
        //for prenom
        document.querySelector("#prenom_salarie").addEventListener('keyup',(e)=>{
            e.preventDefault();
            if(e.code[3]==="i"){
                var a =document.querySelector("#prenom_salarie").value.trim().length;
                var recup="";
                for(var i=0;i<a-1;i++){
                    recup+=document.querySelector("#prenom_salarie").value[i];
                }
                document.querySelector("#prenom_salarie").value=recup;
            }
        });
        document.querySelector("#prenom_salarie").addEventListener('blur',(e)=>{
            e.preventDefault();
            if(document.querySelector("#prenom_salarie").value===""){
                document.querySelector("#prenom_salarie").style.borderColor='#FA6D63';
                 UI.messageDis("Tous les champs sont Obligatoires");
            }else{
                document.querySelector("#prenom_salarie").style.borderColor='none';
            }
        })
        
        //for adresseEntreprise Client
        document.querySelector("#addr_salarie").addEventListener('keyup',(e)=>{
            e.preventDefault();
            
            if(e.code[3]==="i"){
                var a = document.querySelector("#addr_salarie").value.trim().length;
                var recup="";
                for(var i=0;i<a-1;i++){
                    recup+= document.querySelector("#addr_salarie").value[i];
                }
                 document.querySelector("#addr_salarie").value=recup;
            }
        });
        document.querySelector("#addr_salarie").addEventListener('blur',(e)=>{
            e.preventDefault();
            if(document.querySelector("#addr_salarie").value===""){
                document.querySelector("#addr_salarie").style.borderColor='#FA6D63';
                 UI.messageDis("Tous les champs sont Obligatoires");
            }else{
                document.querySelector("#addr_salarie").style.borderColor='none';
            }
        })
        
        //for telephone du Salarie
        document.querySelector("#tele_salarie").addEventListener('blur',(e)=>{
            e.preventDefault();
            var a = document.querySelector("#tele_salarie").value[0];
            var b = document.querySelector("#tele_salarie").value[1];
            var c = document.querySelector("#tele_salarie").value[2];
            var d = document.querySelector("#tele_salarie").value[3];
            var tot = b+c+d;
            if(a!="+" && tot!="221"){
                document.querySelector("#tele_salarie").style.borderColor='red';
                 UI.messageDis("Format de Numero : +221 xx xxx xx xx avec 14 chiffres ");
            }if(document.querySelector("#tele_salarie").value.length!=13){
                document.querySelector("#tele_salarie").style.borderColor='#FA6D63';
                 UI.messageDis("Format de Numero : +221 xx xxx xx xx avec 14 chiffres ");
            }
        });
        document.querySelector("#tele_salarie").addEventListener('blur',(e)=>{
            e.preventDefault();
            if(document.querySelector("#tele_salarie").value===""){
                document.querySelector("#tele_salarie").style.borderColor='#FA6D63';
                 UI.messageDis("Tous les champs sont Obligatoires");
            }else{
               document.querySelector("#tele_salarie").style.borderColor='none';
            }
        })
        
        //for email salarie
        document.querySelector("#email_salarie").addEventListener('blur',(e)=>{
            e.preventDefault();
            if(document.querySelector("#email_salarie").value===""){
                document.querySelector("#email_salarie").style.borderColor='#FA6D63';
            }else{
                document.querySelector("#email_salarie").style.borderColor='none';
            }
        })
        
        //for emploi salarie
        document.querySelector("#emploi_salarie").addEventListener('keyup',(e)=>{
            e.preventDefault();
           if(e.code[3]==="i"){
                var a =document.querySelector("#emploi_salarie").value.trim().length;
                var recup="";
                for(var i=0;i<a-1;i++){
                    recup+=document.querySelector("#emploi_salarie").value[i];
                }
                document.querySelector("#emploi_salarie").value=recup;
            }
        });
        document.querySelector("#emploi_salarie").addEventListener('blur',(e)=>{
            e.preventDefault();
            if(document.querySelector("#emploi_salarie").value===""){
                document.querySelector("#emploi_salarie").style.borderColor='#FA6D63';
                 UI.messageDis("Tous les champs sont Obligatoires");
            }else{
                document.querySelector("#emploi_salarie").style.borderColor='none';
            }
        })
        
        //pour nom Entrprise
        document.querySelector("#NameEnter_salarie").addEventListener('keyup',(e)=>{
            e.preventDefault();
           if(e.code[3]==="i"){
                var a =document.querySelector("#NameEnter_salarie").value.length;
                var recup="";
                for(var i=0;i<a-1;i++){
                    recup+=document.querySelector("#NameEnter_salarie").value[i];
                }
                document.querySelector("#NameEnter_salarie").value=recup;
            }
        });
        document.querySelector("#NameEnter_salarie").addEventListener('blur',(e)=>{
            e.preventDefault();
            if(document.querySelector("#NameEnter_salarie").value===""){
                document.querySelector("#NameEnter_salarie").style.borderColor='#FA6D63';
                UI.messageDis("Tous les champs sont Obligatoires ");
            }else{
                document.querySelector("#NameEnter_salarie").style.borderColor='none';
            }
        })
        
        //for CNI cni_salarie
        document.querySelector("#cni_salarie").addEventListener('blur',(e)=>{
            e.preventDefault();
            if(document.querySelector("#cni_salarie").value===""){
                document.querySelector("#cni_salarie").style.borderColor='#FA6D63';
                UI.messageDis("Tous les champs sont Obligatoires");
            }else{
                document.querySelector("#cni_salarie").style.borderColor='none';
            }
        })
        
       
    }
    
}


class UI_Independant{
    
     static clearFiedlC_independant(){
        document.querySelector("#nom_i").value="";
        document.querySelector("#prenom_i").value="";
        document.querySelector("#adresse_i").value="";
        document.querySelector("#telephone_i").value="";
        document.querySelector("#email_i").value="";
        document.querySelector("#activite_i").value="";
    }
    
    
   static verify_Client_Independant(){
        var name = document.querySelector("#nom_i").value.trim();
        var prenom = document.querySelector("#prenom_i").value.trim();
        var adresse = document.querySelector("#adresse_i").value.trim();
        var tel = document.querySelector("#telephone_i").value.trim();
        var email = document.querySelector("#email_i").value.trim();
        var activite = document.querySelector("#activite_i").value.trim();
        let cpt=0;
    if(name===""){
        cpt+=1;
        document.querySelector("#nom_i").style.borderColor='#FA6D63';
    }if(prenom===""){
        cpt+=1;
        document.querySelector("#prenom_i").style.borderColor='#FA6D63';
    }if(adresse===""){
        cpt+=1;
        document.querySelector("#adresse_i").style.borderColor='#FA6D63';
    }if(tel===""){
        cpt+=1;  
        document.querySelector("#telephone_i").style.borderColor='#FA6D63';
    }if(email===""){
        cpt+=1;
        document.querySelector("#email_i").style.borderColor='#FA6D63';
    }if(activite===""){
        cpt+=1;
        document.querySelector("#activite_i").style.borderColor='#FA6D63';
    }
       //verify if all the fields has not  been fill 
    if(cpt!=0){
        UI.messageDis(`<h1>Veuillez Remplir les champs Indiques</h1>`);
        return 2;
      }else{
         return 1;
      }
    }
}



class UI_Moral{
     static clearFiedlC_moral(){
        document.querySelector("#nom_enter_m").value="";
        document.querySelector("#adresse_m").value="";
        document.querySelector("#type_enter_m").value="";
        document.querySelector("#tel_m").value="";
        document.querySelector("#email_m").value="";
        document.querySelector("#activite_m").value="";
    }
    
    
   static verify_Client_Moral(){
        var name = document.querySelector("#nom_enter_m").value.trim();
        var adresse = document.querySelector("#adresse_m").value.trim();
        var tel = document.querySelector("#tel_m").value.trim();
        var email = document.querySelector("#email_m").value.trim();
        var activite = document.querySelector("#activite_m").value.trim();
       var type_entreprise = document.querySelector("#type_enter_m").value.trim();
        let cpt=0;
    if(name===""){
        cpt+=1;
        document.querySelector("#nom_enter_m").style.borderColor='#FA6D63';
    }if(adresse===""){
        cpt+=1;
         document.querySelector("#adresse_m").style.borderColor='#FA6D63';
    }if(tel===""){
        cpt+=1;  
         document.querySelector("#tel_m").style.borderColor='#FA6D63';
    }if(email===""){
        cpt+=1;
         document.querySelector("#email_m").style.borderColor='#FA6D63';
    }if(activite===""){
        cpt+=1;
         document.querySelector("#activite_m").style.borderColor='#FA6D63';
    }if(type_entreprise===""){
        cpt+=1;
         document.querySelector("#type_enter_m").style.borderColor='#FA6D63';
    }
       //verify if all the fields has not  been fill 
    if(cpt!=0){
        UI.messageDis(`<h1>Veuillez Remplir les champs en rouge</h1>`);
        return 2;
      }else{
          return 1;
      }
    }
}

//class pour le User INterface generale 
class UI{
    static messageDis(message){
document.querySelector(".form").insertAdjacentHTML("beforeend",`<div class="text">${ message }</div>`);
        setTimeout((e)=>{
document.querySelector(".form").removeChild(document.querySelector(".text"));
        },2500);
    }
    
    static redirection(url){
        location.href=url;
    }
    
}

//operations 
UI_Salarie.verifyFieldNom();


