 
 let isPassShown = false;

 function change(){

 let pass = document.getElementById('myPassword');

 if(isPassShown === false ) {

     pass.setAttribute("type","text");
     isPassShown = true;

 }
 else if(isPassShown === true) {

     pass.setAttribute("type","password");
     isPassShown = false;

     }
 }

 