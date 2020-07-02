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
    
    
    static disMess(mess){
        document.querySelector("body").insertAdjacentHTML("beforeend",`<div class="divMess">
        <h1>${mess}</h1>
    </div>`)
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
        
        //for the account treatment
        document.querySelector("#numCompte").value='CI567';
         
         //pour numero agence
         document.querySelector("#numeroAgence").value='Numero Agence : BP0056';
    }
    
    
    static automateDate(){
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
    UI_AddCompte.redirection("verifyCNI.html");
});



document.querySelector("#btn_create").addEventListener("click",(e)=>{
    e.preventDefault();
    var valeur=document.querySelector("#type_m").value;
    let t=0;
    if(valeur=="Epargne"){ 
            t=UI_Compte.verifyAccountEpargne();
            if(t==1){
                alert("INSERTION EFFECTUE AVEC SUCCES !!!");
                UI_AddCompte.redirection("verifyCNI.html");
            }else{
                alert("Veuillez Remplir les champs en Rouge");
            }
    }else if(valeur=="Courant"){
        t = UI_Compte.verifyAccountCourant();
             if(t==1){
                 alert("Insertion Effectuee avec Success!!!");
                 UI_AddCompte.redirection("verifyCNI.html");
             }else{
                  alert("Veuillez Remplir les champs en Rouge");
             }
    }else if(valeur=="Bloque"){
             t=UI_Compte.verifyAccountBloque();
        if(t==1){
            alert("INSERTION EFFECTUE AVEC SUCCESS !!!");
            UI_AddCompte.redirection("verifyCNI.html");
        }else{
             alert("Veuillez Remplir les champs en Rouge");
        }
    }else{
        alert("Veuillez Specifier le Type de Compte !!!!");
    }
});


//1
//UI_Compte.getTypeCompte();

//
//// apres nous commencons a verifier les champs du formualire client Salarie 
//document.querySelector("#btn_Csalarie").addEventListener("click",(e)=>{
//    e.preventDefault();
//    if(document.querySelector("#type_m").value==="Bloque"){
//        var tes1= UI_Salarie.verifyCSalarie();
//        var tesBloq = UI_Compte.verifyAccountBloque();
//        console.log("slarie : "+tes1);
//        console.log("bloque : "+tesBloq);
//    }else if(document.querySelector("#type_m").value==="Courant"){
//        var tes1= UI_Salarie.verifyCSalarie();
//        var tesBloq = UI_Compte.verifyAccountCourant();
//        console.log("slarie : "+tes1);
//        console.log("courant : "+tesBloq);
//    }else if(document.querySelector("#type_m").value==="Epargne"){
//        var tes1= UI_Salarie.verifyCSalarie();
//        var tesBloq = UI_Compte.verifyAccountEpargne();
//        console.log("slarie : "+tes1);
//        console.log("Epargne : "+tesBloq);
//    }else{
//        UI.messageDis("<h1>VEUILLEZ CHOISIR UN TYPE DE COMPTE</h1>");
//    }
//});
//
//
////verificatiuon du formulaire pour la creation client independatnt
//document.querySelector("#button_i").addEventListener("click",(e)=>{
//    e.preventDefault();
//     if(document.querySelector("#type_m").value==="Bloque"){
//        var tes1= UI_Independant.verify_Client_Independant();
//        var tesBloq = UI_Compte.verifyAccountBloque();
//        console.log("ind : "+tes1);
//        console.log("bloque : "+tesBloq);
//    }else if(document.querySelector("#type_m").value==="Epargne"){
//        var tes1= UI_Independant.verify_Client_Independant();
//        var tesBloq = UI_Compte.verifyAccountEpargne();
//        console.log("ind : "+tes1);
//        console.log("Epargne : "+tesBloq);
//    }else if(document.querySelector("#type_m").value==="Courant"){
//        var tes1= UI_Independant.verify_Client_Independant();
//        var tesBloq = UI_Compte.verifyAccountCourant()
//        console.log("ind : "+tes1);
//        console.log("courant : "+tesBloq);
//    }else{
//        UI.messageDis("<h1>VEUILLEZ CHOISIR UN TYPE DE COMPTE</h1>");
//    }
//});
//
//
//
////verificatiuon du formulaire pour la creation client independatnt
//document.querySelector("#button_m").addEventListener("click",(e)=>{
//    e.preventDefault();
//     if(document.querySelector("#type_m").value==="Bloque"){
//        var tes1= UI_Moral.verify_Client_Moral();
//        var tesBloq = UI_Compte.verifyAccountBloque();
//        console.log("ind : "+tes1);
//        console.log("bloque : "+tesBloq);
//    }else if(document.querySelector("#type_m").value==="Epargne"){
//        var tes1=  UI_Moral.verify_Client_Moral();
//        var tesBloq = UI_Compte.verifyAccountEpargne();
//        console.log("ind : "+tes1);
//        console.log("Epargne : "+tesBloq);
//    }else if(document.querySelector("#type_m").value==="Courant"){
//        var tes1=  UI_Moral.verify_Client_Moral();
//        var tesBloq = UI_Compte.verifyAccountCourant()
//        console.log("ind : "+tes1);
//        console.log("courant : "+tesBloq);
//    }else{
//        UI.messageDis("<h1>VEUILLEZ CHOISIR UN TYPE DE COMPTE</h1>");
//    }
//});


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
        document.querySelector("#taux_agios").removeAttribute("required");
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
       document.querySelector("#taux_agios").setAttribute("disabled","");
       
       //for the required attribute 
        document.querySelector("#date_deblocage").setAttribute("required","");
        document.querySelector("#date_deblocage").setAttribute("required","");
        document.querySelector("#cle_rib").setAttribute("required","");
        document.querySelector("#taux_agios").setAttribute("required","");
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
        document.querySelector("#taux_agios").setAttribute("disabled","");
        
        //remove the attribute reqired for specific fields 
        document.querySelector("#date_deblocage").setAttribute("required","");
        document.querySelector("#cle_rib").setAttribute("required","");
        document.querySelector("#taux_agios").setAttribute("required","");
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
        document.querySelector("#date_deblocage").setAttribute("required","");
        document.querySelector("#cle_rib").setAttribute("required","");
        document.querySelector("#taux_agios").setAttribute("required","");
        document.querySelector("#montant").setAttribute("required","");
        document.querySelector("#date_m").setAttribute("required","");
        document.querySelector("#fraisR").setAttribute("required","");
        
        //automate field for frais compte 
        document.querySelector("#choix").style.display='none';
        document.querySelector("#choix2").style.display='block';
    }
}