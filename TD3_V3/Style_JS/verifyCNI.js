caissieres =[
    {"idCaissier":"CAI675" , "nom":"XXY" ,"Prenom":"YYY"},
]

clients = [
    {"idClient":12,"cni":"345DK","nom":"Ngor Seck","solde":1000000},
     {"idClient":12,"cni":"357DK","nom":"Malik Tiemogo","solde":100000}
];

class UI_GestClient{
    
    static clearFiled(){
        document.querySelector("#cni").value="";
    }
    
    static displayErreurDiv(){
        document.querySelector(".message").style.display='block';
        UI_GestClient.clearFiled();
    }
    
    static verifyCNI(str){
        clients.forEach((client)=>{
            if(client.cni==str){
                localStorage.setItem("client",JSON.stringify(client));
                UI_GestClient.redirection("AddCompte.html");
            }else{
                UI_GestClient.displayErreurDiv();
            }
        });
    }
    
    static redirection(url){
        location.href=url;
    }
    
     static displayMessErr(){
            var main = document.querySelector("main");
         main.insertAdjacentHTML('afterbegin',`<div class="desMess">
            Remplir le champ CNI
        </div>`);
         setTimeout((e)=>{
             main.removeChild(document.querySelector(".desMess"));
         },2500);
         
        }
    
    static verifyGestClient(){
        var cni =document.querySelector("#cni").value.trim();
        if(cni===""){
            UI_GestClient.displayMessErr();
        }else{
            UI_GestClient.verifyCNI(cni);
        }
    }
    
    static getAllButons(){
        document.querySelector(".new").addEventListener('click',(e)=>{
            e.preventDefault();
            if(document.querySelector(".addM").style.display==='none'){
               document.querySelector(".addM").style.display='initial';
                document.querySelector(".addI").style.display='initial';
                document.querySelector(".addS").style.display='initial';
               }else{
                   document.querySelector(".addM").style.display='none';
                    document.querySelector(".addI").style.display='none';
                    document.querySelector(".addS").style.display='none';
               }
        
        })
    }
}

document.querySelector(".addM").style.display='none';
document.querySelector(".addI").style.display='none';
document.querySelector(".addS").style.display='none';

UI_GestClient.getAllButons();
//
//document.querySelector("#annuler").addEventListener("click",(e)=>{
//    e.preventDefault();
//    location.reload();
//    UI_GestClient.clearFiled();
//})

//remove the div when she appears
var div = document.querySelector(".desMess");
setTimeout(()=>{
    document.querySelector("main").removeChild(div);
},4000)   



