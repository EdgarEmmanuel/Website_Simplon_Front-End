
//get all the fields

let login_input = document.querySelector("#login");
let password_input = document.querySelector("#pwd");
let type_employe = document.querySelector("#type_employe");

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
    
    static verify_loginPage(){
            if(login_input.value.trim()==="" || password_input.value.trim()==="" || type_employe.value.trim()===""){
            UI_loginPage.messageDis("VEUILLEZ REMPLIR TOUS LES CHAMPS ");
        }else{
             console.log(login_input.value.trim());
             console.log(password_input.value.trim());
              console.log(type_employe.value.trim());
            UI_loginPage.clearField();
        }
    }
    
    
    
}
    

//after click on the butoton connexionn
document.querySelector("#connect").addEventListener("click",(e)=>{
    e.preventDefault();
    UI_loginPage.verify_loginPage();
});


//when we click on the button annuler
document.querySelector("#annuler").addEventListener("click",(e)=>{
    e.preventDefault();
     UI_loginPage.clearField();
})



