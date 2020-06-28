
//get all the fields

let login_input = document.querySelector("#login");
let password_input = document.querySelector("#pwd");
let type_employe = document.querySelector("#type_employe");


class User{
    constructor(login,pwd,employe){
        this.login=login;
        this.pwd=pwd;
        this.employe=employe;
    }
}

class UI_loginPage{
    
    static clearField(){
        document.querySelector("#login").value="";
        document.querySelector("#pwd").value="";
        document.querySelector("#type_employe").value="";
    }
    
    static messageDis(mess){
        document.querySelector("body").insertAdjacentHTML("beforeend",`<div class="divMess">
        <h1>${mess} </h1>
    </div>`);
        
        setTimeout(()=>{
            document.querySelector("body").removeChild(document.querySelector(".divMess"));
        },3000)
        
    }
    
    static sendRequestConnex(){
        var xhr = new XMLHttpRequest();
        xhr.open("POST","../index.php",true);
        xhr.setRequestHeader("Content-type","application/json");
        var jsonString ={
            "value":"connex",
            "login":"test",
            "pwd":"aba",
            "employe":"resp"
        }
        //"application/x-www-form-urlencoded"
        const str = JSON.stringify(jsonString);
        xhr.send(JSON.stringify(jsonString));
    }
    
    static verify_loginPage(){
            if(login_input.value.trim()==="" || password_input.value.trim()==="" || type_employe.value.trim()===""){
            UI_loginPage.messageDis("VEUILLEZ REMPLIR TOUS LES CHAMPS ");
        }else{
            //get the value of all the field 
             var login =login_input.value.trim() ;
             var pwd =password_input.value.trim();
              var employe  = type_employe.value.trim();
            
            //create the class User 
            var user = new User(login,pwd,employe);
            
            //send the request
            UI_loginPage.sendRequestConnex(user);
            
            //clear all the field 
            UI_loginPage.clearField();
        }
    }
    
    
    
}
    
UI_loginPage.sendRequestConnex();


//after click on the butoton connexionn
document.querySelector("#connect").addEventListener("click",(e)=>{
    e.preventDefault();
    //UI_loginPage.verify_loginPage();
    UI_loginPage.sendRequestConnex();
});


//when we click on the button annuler
document.querySelector("#annuler").addEventListener("click",(e)=>{
    e.preventDefault();
     UI_loginPage.clearField();
})



