// get all the buttons in the menu 
let btn_Cindependant = document.querySelector(".btn-Independant");
let btn_Cmoral = document.querySelector(".btn-Moral");
let btn_CSalarie = document.querySelector(".btn-Salarie");


//get all the differets div 
var div_salarie = document.querySelector(".salarie");
var div_clientMoral = document.querySelector(".Moral");
var div_clientIndependant = document.querySelector(".Independant");


btn_Cindependant.addEventListener("click",(e)=>{
    e.preventDefault();
    div_clientIndependant.style.display="none";
    div_clientMoral.style.display="none";
    div_salarie.style.display="none";
    
    div_clientIndependant.style.display='block';
});


btn_Cmoral.addEventListener("click",(e)=>{
    e.preventDefault();
    div_clientIndependant.style.display="none";
    div_clientMoral.style.display="none";
    div_salarie.style.display="none";
    
    div_clientMoral.style.display='block';
});


btn_CSalarie.addEventListener("click",(e)=>{
    e.preventDefault();
    div_clientIndependant.style.display="none";
    div_clientMoral.style.display="none";
    div_salarie.style.display="none";
    
    div_salarie.style.display='block';
})