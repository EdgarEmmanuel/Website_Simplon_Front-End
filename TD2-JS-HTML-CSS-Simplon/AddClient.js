
//=================================Page addclient.html===========================



// get all the buttons in the menu 
let btn_Cindependant = document.querySelector(".btn-Independant");
let btn_Cmoral = document.querySelector(".btn-Moral");
let btn_CSalarie = document.querySelector(".btn-Salarie");


//get all the differets div 
var div_salarie = document.querySelector(".salarie");
var div_clientMoral = document.querySelector(".Moral");
var div_clientIndependant = document.querySelector(".Independant");


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
    
    static verifyCSalarie(){
        var name = document.querySelector("#nom_salarie").value.trim();
        var prenom = document.querySelector("#prenom_salarie").value.trim();
        var adresse = document.querySelector("#addr_salarie").value.trim();
        var tel = document.querySelector("#tele_salarie").value.trim();
        var email = document.querySelector("#email_salarie").value.trim();
        var profession = document.querySelector("#emploi_salarie").value.trim();
        var enterprise_name = document.querySelector("#NameEnter_salarie").value.trim();
        let cpt=0;
    if(name===""){
        cpt+=1;
         document.querySelector("#nom_salarie").style.borderColor='#FA6D63';
    }if(prenom===""){
        cpt+=1;
         document.querySelector("#prenom_salarie").style.borderColor='#FA6D63';
    }if(adresse===""){
        cpt+=1;
        document.querySelector("#addr_salarie").style.borderColor='#FA6D63';
    }if(tel===""){
        cpt+=1;  
        document.querySelector("#tele_salarie").style.borderColor='#FA6D63';
    }if(email===""){
        cpt+=1;
         document.querySelector("#email_salarie").style.borderColor='#FA6D63';
    }if(profession===""){
        cpt+=1;
        document.querySelector("#emploi_salarie").style.borderColor='#FA6D63';
    }if(enterprise_name===""){
        cpt+=1;
        document.querySelector("#NameEnter_salarie").style.borderColor='#FA6D63';
    }
        //verify if all the fields has not  been fill 
    if(cpt!=0){
        UI.messageDis(`<h1>Veuillez Remplir les champs en Rouge </h1>`);
        return 1;
      }else{
          return 2;
      }
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
        return 1;
      }else{
         return 2;
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
        return 1;
      }else{
          return 2;
      }
    }
}






//class pour les informations du compte 
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
    
    static displayAll(){
        document.querySelector("#raison_social").style.display='initial';
        document.querySelector("#nom_Entreprise").style.display='initial';
        document.querySelector("#date_deblocage").style.display='initial';
        document.querySelector("#Adresse_Entreprise").style.display='initial';
        document.querySelector("#date_deblocage").style.display='initial';
        document.querySelector("#cle_rib").style.display='initial';
        document.querySelector("#taux_agios").style.display='initial';
        
        //automate field for frais compte 
        document.querySelector("#Frais_Compte").value="";
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
    
    static verifyAccountEpargne(){
        let cpt = 0;
        let verify =0;
        if(ddocument.querySelector("#raison_social").value.trim()===""){
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
        }
        if(cpt!=0){
            return 2;
        }else{
            return 1;
        }
    }
    
    static AccountBloque(){
        UI_Compte.displayAll();
        document.querySelector("#raison_social").style.display='none';
        document.querySelector("#nom_Entreprise").style.display='none';
        document.querySelector("#Adresse_Entreprise").style.display='none';
        
        //atomate the field for frais compte 
        document.querySelector("#Frais_Compte").value="Frais Compte : 10000FCFA";
    }
    
    static AccountEpargne(){
        UI_Compte.displayAll();
        document.querySelector("#raison_social").style.display='none';
        document.querySelector("#nom_Entreprise").style.display='none';
        document.querySelector("#date_deblocage").style.display='none';
        document.querySelector("#Adresse_Entreprise").style.display='none';
        
        //automate the field for frais compte 
        document.querySelector("#Frais_Compte").value="Frais Compte : 9000FCFA";
    }
    
    static AccountCourant(){
        UI_Compte.displayAll();
        document.querySelector("#date_deblocage").style.display='none';
        
        //automate field for frais compte 
        document.querySelector("#Frais_Compte").value="Frais Ouverture : 10000FCFA";
    }
}







//class pour le User INterface generale 
class UI{
    static messageDis(message){
document.querySelector(".form").insertAdjacentHTML("afterbegin",`<div class="text">${ message }</div>`);
        setTimeout((e)=>{
document.querySelector(".form").removeChild(document.querySelector(".text"));
        },5000);
    }
    
     static displayStaticData(){
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
        document.querySelector("#date_m").value=`Date Ouverture Compte : ${tr}/${t}/${date.getFullYear()}`;
         
         //pour numero agence
         document.querySelector("#numeroAgence").value='Numero Agence : BP0056';
         
    }
    
    static displayCinde(){
        //for the div 
    div_clientMoral.style.display="none";
    div_salarie.style.display="none";
    div_clientIndependant.style.display='block';
        
        //for the button 
        btn_m.style.display='none';
        btn_s.style.display='none';
        btn_i.style.display='block';
        
        //pour le champ input numero compte dans le formulaire compte 
        document.querySelector("#numCompte").value="Numero Compte : CI456";
    }
    
    static displayCSalarie(){
    div_clientIndependant.style.display="none";
    div_clientMoral.style.display="none";
    div_salarie.style.display='block';
        
        //for the buttons 
        btn_m.style.display='none';
        btn_s.style.display='block';
        btn_i.style.display='none';
        
        //pour le champ input numero compte dans le formulaire compte 
        document.querySelector("#numCompte").value="Numero Compte : CS456";
    }
    
    static displayCMoral(){
    div_clientIndependant.style.display="none";
    div_salarie.style.display="none";
    div_clientMoral.style.display='block';
        
         //for the button 
        btn_m.style.display='block';
        btn_s.style.display='none';
        btn_i.style.display='none';
        
        //pour le champ input numero compte dans le formulaire compte 
        document.querySelector("#numCompte").value="Numero Compte : CM456";
    }
}



//aficher la donnees constantes 
UI.displayStaticData();


//pour formulaire des donnees du compte 
UI_Compte.getTypeCompte();


// pour afficher le formulaire des clients independants 
btn_Cindependant.addEventListener("click",(e)=>{
    e.preventDefault();
    UI.displayCinde();
});


//pour afficher le formulaire de client Moral 
btn_Cmoral.addEventListener("click",(e)=>{
    e.preventDefault();
    UI.displayCMoral();
});


//pour le formulaire du client salarie 
btn_CSalarie.addEventListener("click",(e)=>{
    e.preventDefault();
    UI.displayCSalarie();
});


// apres nous commencons a verifier les champs du formualire client Salarie 
document.querySelector("#btn_Csalarie").addEventListener("click",(e)=>{
    e.preventDefault();
    
    if(document.querySelector("#type_m").value==="Bloque"){
        var tes1= UI_Salarie.verifyCSalarie();
        var tesBloq = UI_Compte.verifyAccountBloque();
        console.log("slarie : "+tes1);
        console.log("bloque : "+tesBloq);
    }else{
        UI.messageDis("<h1>VEUILLEZ CHOISIR UN TYPE DE COMPTE</h1>");
    }
});



//verificatiuon du formulaire pour la creation client independatnt
document.querySelector("#button_i").addEventListener("click",(e)=>{
    e.preventDefault();
    
     if(document.querySelector("#type_m").value==="Bloque"){
        var tes1= UI_Independant.verify_Client_Independant();
        var tesBloq = UI_Compte.verifyAccountBloque();
        console.log("slarie : "+tes1);
        console.log("bloque : "+tesBloq);
    }else{
        UI.messageDis("<h1>VEUILLEZ CHOISIR UN TYPE DE COMPTE</h1>");
    }
});


//verification formualire clienty moral 
document.querySelector("#button_m").addEventListener("click",(e)=>{
    e.preventDefault();
    
    if(document.querySelector("#type_m").value==="Bloque"){
        var tes1= UI_Moral.verify_Client_Moral();
        var tesBloq = UI_Compte.verifyAccountBloque();
        console.log("slarie : "+tes1);
        console.log("bloque : "+tesBloq);
    }else{
        UI.messageDis("<h1>VEUILLEZ CHOISIR UN TYPE DE COMPTE</h1>");
    }
});



