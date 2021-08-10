$(document).ready(function(){


    
        $("#materie").on('keyup',function(){
            console.log($("#materie").val());
            if($("#materie").val() == '') { //daca e gol input ul
                $("ul").fadeOut('fast');
            }else{
                $("ul").fadeIn();
            }
        });


    
    
$("#submit").click(function(e){
    
//    alert( $("#materie").val());
  

    
    if($(".dati").val() == '' || $("#materie").val() == '') {
        $("#error_message").html('toate campurile obligatorii');
    }
    else {
    
        $.ajax({
            url:"absente.php",
            method:"POST",
            data: {numeMaterie:$("#materie").val(), dati:$(".dati").val() },
            success:function(data){ 
                //resetam form ul
                $("#add_form")[0].reset();
                
                //daca au fost afisate inainte mesaje de eroare, acum vor disparea, odata ce aceasta cerere a avut succes
                $("#error_message").empty();
            },
             error:function(){
                 alert("nu!");
             }
        });
   }
});

});