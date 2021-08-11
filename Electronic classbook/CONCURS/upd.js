$(document).ready(function(){
    // $("ul").on('mouseleave',function(e){
    //     alert(1);
    //     $(this).toggle("ng-hide");
    // });
        $("#materie").on('keyup',function(){
            console.log($("#materie").val());
            if($("#materie").val() == '') { //daca e gol input ul
                $("ul").fadeOut('fast');
            }else{
                $("ul").fadeIn();
            }
        });
        var i=1;  
$('#add').click(function(){  
     i++;  
     //luam id ul liniei caci va trebui sa stergem linia.
     var markup = ' <tr id="row'+i+'">  <td><input type="text" style="width:100px;height:40px;"   placeholder="Nota..." class="w3-input materii" /></td><td><input style="border:none;width:110px;height:40px;border-radius:20px;" class="dati" type="date"  placeholder="Date"></td><td><button type="button" name="remove" id="'+i+'" class="w3-btn w3-round-xlarge w3-red btn_remove">Anuleaza Nota</button></td></tr>  ' ;
    //  var markup2 = '<tr><td style="width:25%;"><input style="width:100px;height:40px;" type="text" name="note[]" class="w3-input" placeholder="Nota.."></td><td><input style="border:none;width:110px;height:40px;border-radius:20px;" name="date[]" type="text" class="datepicker" placeholder="Date"></td><td style="width:25%;"><button type="button" id="add" class="w3-btn w3-round-xlarge w3-green">Adauga Nota</button></td></tr>';
     $('#tabel').append(markup); 
    //  console.log($("#add_name").serialize()); 
});  
$(document).on('click', '.btn_remove', function(){  
        // $(".btn_remove").on('click',function() {
     var button_id = $(this).attr("id"); //obtinem id ul de la acel buton   
     $('#row'+button_id+'').remove();  //stergem linia
});  

// $("input[name^='dat']").datepicker({
//     showAnim:"slideDown",
//     dateFormat:"yy-mm-dd"
// });

// $( 'input[type=date]' ).each( function() {
//     $( this ).clone().attr( 'type', 'text' ).insertAfter( this ).datepicker().prev().remove();
//   } );

//pt submit

// $("#submit").on('click',function(e){
//     // e.preventDefault();
//     // alert(1);
// alert(1);
//     //trimitem informatia folosind ajax 
//     $.ajax({
//         url:"note.php", //catre cine trimitem inf
//         method:"POST", //metoda folosita
//         data:$("#add_form").serialize(), //ce trimitem
//         succes: function(data) {
//             alert(data);
//             $("#add_form")[0].reset();
//         },
//         error: function(XMLHttpRequest, textStatus, errorThrown) { 
//             alert("Status: " + textStatus); alert("Error: " + errorThrown); 
//         }     
//     });
// });

    $("#submit").click(function(e){
        e.preventDefault();
        var materii = []; //unde vom tine materiile
        var dati = [];//unde tinem datile
        var name = $("#materie").val();
        
        //punem toate datile in vector
        $(".dati").each(function(){
            dati.push($(this).val());
        });
        console.log(dati);

        //punem toate notele in vector"

        $(".materii").each(function(){
            materii.push($(this).val());
        });
        console.log(materii);

        //validam putin datele din form
        var lung = $("table tr").length;
        if(name == '' || materii.length != lung || dati.length != lung ) {
            $("#error_message").fadeIn().html("All fields are required");
        }
        else {
            //daca totul e ok
            //folosim ajax
            $("#error_message").html('');
            $.ajax({
                url:"note.php",
                method:"POST",
                data:{numeMaterie:name, materii:materii, dati:dati},
                success:function(data){
                    alert(data);
                    $("#add_form")[0].reset(); //resetam campurile din form    
                }
            });
        }
    });
   

});