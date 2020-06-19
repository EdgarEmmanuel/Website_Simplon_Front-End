// get all the buttons in the menu 
let btn_Cindependant = document.querySelector(".btn-Independant");
let btn_Cmoral = document.querySelector(".btn-Moral");
let btn_CSalarie = document.querySelector(".btn-Salarie");


//get all the differets div 
var div_salarie = document.querySelector(".salarie");
var div_clientMoral = document.querySelector(".Moral");
var div_clientIndependant = document.querySelector(".Independant");


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
    document.querySelector("#type_compte").value="";
    document.querySelector("#etat_compte").value="";
        //location.reload();
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
          UI.clearFiedlC_salarie();
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
        div_clientIndependant.style.display="none";
    div_clientMoral.style.display="none";
    div_salarie.style.display="none";
    
    div_clientIndependant.style.display='block';
    }
    
    static displayCSalarie(){
    div_clientIndependant.style.display="none";
    div_clientMoral.style.display="none";
    div_salarie.style.display="none";
    
    div_salarie.style.display='block';
    }
    
    static displayCMoral(){
        div_clientIndependant.style.display="none";
    div_clientMoral.style.display="none";
    div_salarie.style.display="none";
    
    div_clientMoral.style.display='block';
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
})