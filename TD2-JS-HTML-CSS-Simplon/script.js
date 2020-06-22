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


class UI_Salarie{
static displayDate(){
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
          document.querySelector("#date_ouvert").value=`${tr}/${t}/${date.getFullYear()}`;
}
    
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
        var type_compte = document.querySelector("#type_compte").value;
        var etat_compte = document.querySelector("#etat_compte").value;
        var mess="";
        let cpt=0;
    if(name===""){
       mess+=" nom,";
        cpt+=1;
    }if(prenom===""){
        mess+=" prenom,"; 
        cpt+=1;
    }if(adresse===""){
        mess+=" adresse,";
        cpt+=1;
    }if(tel===""){
        mess+=" telephone,";
        cpt+=1;  
    }if(email===""){
        mess+=" email,";
        cpt+=1;
    }if(profession===""){
         mess+=" profession,";
        cpt+=1;
    }if(enterprise_name===""){
        mess+=" Nom Entreprise,";
        cpt+=1;
    }if(etat_compte===""){
        cpt+=1;
        mess+=" Etat Compte,";
    }if(type_compte===""){
        cpt+=1;
        mess+=" Type Compte,";
    }
        //verify if all the fields has not  been fill 
    if(cpt!=0){
        UI.messageDis(`<h1>Les Champs Suivants sont Vides : <h3>${mess}</h3></h1>`);
      }else{
          UI.messageDis("Les champs sont remplis !!!!");
          UI_Salarie.clearFiedlC_salarie();
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
        var type_compte = document.querySelector("#type_i").value;
        var etat_compte = document.querySelector("#etat_i").value;
       var dateOuver = document.querySelector("#dateOuverture_i").value.trim();
        var mess="";
        let cpt=0;
    if(name===""){
       mess+=" Nom,";
        cpt+=1;
    }if(prenom===""){
        mess+=" Prenom,"; 
        cpt+=1;
    }if(adresse===""){
        mess+=" Adresse,";
        cpt+=1;
    }if(tel===""){
        mess+=" Telephone,";
        cpt+=1;  
    }if(email===""){
        mess+=" Email,";
        cpt+=1;
    }if(activite===""){
         mess+=" Activite,";
        cpt+=1;
    }if(etat_compte===""){
        cpt+=1;
        mess+=" Etat Compte,";
    }if(type_compte===""){
        cpt+=1;
        mess+=" Type Compte,";
    }if(dateOuver===""){
        cpt+=1;
        mess+=" date Ouverture ,";
    }
        //verify if all the fields has not  been fill 
    if(cpt!=0){
        UI.messageDis(`<h1>Les Champs Suivants sont Vides : <h3>${mess}</h3></h1>`);
      }else{
          UI.messageDis("Client Independant Bien Enregistre!!!!");
          UI_Independant.clearFiedlC_independant();
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
        var activite = document.querySelector("#activite_i").value.trim();
       var type_entreprise = document.querySelector("#type_enter_m").value.trim();
        var mess="";
        let cpt=0;
    if(name===""){
        cpt+=1;
    }if(adresse===""){
        cpt+=1;
    }if(tel===""){
        cpt+=1;  
    }if(email===""){
        cpt+=1;
    }if(activite===""){
        cpt+=1;
    }if(type_entreprise===""){
        cpt+=1;
    }
       //verify if all the fields has not  been fill 
    if(cpt!=0){
        UI.messageDis(`<h1>Veuillez Remplir les champs en rouge</h1>`);
      }else{
          UI.messageDis("Client Independant Bien Enregistre!!!!");
          UI_Moral.clearFiedlC_moral();
      }
    }
}


class UI{
    static messageDis(message){
document.querySelector(".form").insertAdjacentHTML("afterbegin",`<div class="text">${ message }</div>`);
        setTimeout((e)=>{
document.querySelector(".form").removeChild(document.querySelector(".text"));
        },5000);
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
    }
    
    static displayCSalarie(){
    div_clientIndependant.style.display="none";
    div_clientMoral.style.display="none";
    div_salarie.style.display='block';
        
        //for the buttons 
        btn_m.style.display='none';
        btn_s.style.display='block';
        btn_i.style.display='none';
    }
    
    static displayCMoral(){
    div_clientIndependant.style.display="none";
    div_salarie.style.display="none";
    div_clientMoral.style.display='block';
        
         //for the button 
        btn_m.style.display='block';
        btn_s.style.display='none';
        btn_i.style.display='none';
    }
}


document.addEventListener('reload',()=>{
    UI_Salarie.displayDate()
    
});


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
    UI_Salarie.verifyCSalarie();
});



//verificatiuon du formulaire pour la creation client independatnt
document.querySelector("#button_i").addEventListener("click",(e)=>{
    e.preventDefault();
    UI_Independant.verify_Client_Independant();
});


//verification formualire clienty moral 
document.querySelector("#button_m").addEventListener("click",(e)=>{
    e.preventDefault();
    UI_Moral.verify_Client_Moral();
});



