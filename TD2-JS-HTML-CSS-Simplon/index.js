let secretaire_radio = document.querySelector("#a");
let admin_radio = document.querySelector("#b");
let respo_compte = document.querySelector("#c");


class UI_loginPage{
    static Buuton_checked_treatment(){
        
        secretaire_radio.addEventListener("click",(e)=>{
            //let the initial buttons to  white
            respo_compte.parentElement.style.color='white';
           admin_radio.parentElement.style.color='white';
            
            //change for the current checked
            secretaire_radio.parentElement.style.color='#ea6a9f';
        });

        admin_radio.addEventListener("click",(e)=>{
            //let the initial color of the others radio buttons
            secretaire_radio.parentElement.style.color='white';
            respo_compte.parentElement.style.color='white';
            
            //change for the current checked
           admin_radio.parentElement.style.color='#ea6a9f';
        });

        respo_compte.addEventListener("click",(e)=>{
            //let the initial color of the others radio 
            secretaire_radio.parentElement.style.color='white';
            admin_radio.parentElement.style.color='white';
            
            //change for the current checked
            respo_compte.parentElement.style.color='#ea6a9f';
        });
    }
}


//for the button when we checked them 
UI_loginPage.Buuton_checked_treatment();


