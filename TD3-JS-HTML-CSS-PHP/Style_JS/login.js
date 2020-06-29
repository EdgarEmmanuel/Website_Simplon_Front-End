
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
    
    static sendRequestConnex(User){
         var xhr = new XMLHttpRequest();
            xhr.open("POST","hello.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.responseType="blob";
        xhr.onreadystatechange=(e)=>{
            e.preventDefault();
            if(xhr.status==200 && xhr.readyState==2){
                //xhr.responseText="json";
                console.log(xhr);
                //console.log(JSON.parse(xhr.response));
            }
        }
        
        xhr.send("btn="+encodeURI("connex")+"&nom="+encodeURI("edgar"));   
    }
    
    static redirection(url){
        location.href=url;
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

//document.querySelector("#connect").style.display='none';
//document.querySelector("#annuler").style.display='none';
//
//document.querySelector("#pwd").addEventListener("focus",(e)=>{
//    e.preventDefault();
//    setTimeout((e)=>{console.log("wait")
//                if(password_input.value.trim()==="" || type_employe.value.trim()===""){
//        console.log(0);
//    }else{
//        document.querySelector("#connect").style.display='initial';
//        document.querySelector("#annuler").style.display='initial';
//    }     
//                    
//    },100);
//   
//})

////after click on the butoton connexionn
document.querySelector("#connect").addEventListener("click",(e)=>{
    e.preventDefault();
    UI_loginPage.verify_loginPage();
});


//when we click on the button annuler
document.querySelector("#annuler").addEventListener("click",(e)=>{
    e.preventDefault();
     UI_loginPage.clearField();
})



