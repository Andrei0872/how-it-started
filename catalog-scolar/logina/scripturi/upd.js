$(document).ready(function(){
    // setInterval(function(){
    //     var src = $('script[src="scripturi/checkbox.js"]').attr("src");
    //     $('script[src="scripturi/checkbox.js"]').remove();
    // },1000);


    // setInterval(function(){
    //     var script = document.createElement('script');
    //     script.src = "scripturi/checkbox.js";
    //     document.getElementsByTagName('head')[0].appendChild(script);
    // }, 1500);


    $("#materie").on('keyup',function(){
        console.log($("#materie").val());
        if($("#materie").val() == '') {
            $("ul").fadeOut('fast');
        }else{
            $("ul").fadeIn();
        }
    });
    // var i=1;  
    // $('#add').click(function(){  
    //     i++;  
    //     var markup = ' <tr id="row'+i+'">  <td><input type="number" min="1" max="10" style="width:100px;height:40px;"   placeholder="Nota..." class="w3-input materii" /></td><td><input style="border:none;width:135px;height:40px;border-radius:20px;" class="dati" type="text"  placeholder="Date"></td>    <td style="width:25%"><label class="check"><input type="checkbox" class="checkInput"  > <span class="label-text">Teza</span></label></td><td><button type="button" name="remove" id="'+i+'" class="w3-btn w3-round-xlarge w3-red btn_remove">Anuleaza Nota</button></td></tr>  ' ;
    //     $('#tabel').append(markup); 
    // //     $( ".dati" ).datepicker({
    // //   showOtherMonths: true,
    // //   selectOtherMonths: true
    // // });
    // });  
    // $(document).on('click', '.btn_remove', function(){  
    //     var button_id = $(this).attr("id")
    //     $('#row'+button_id+'').remove();
    // });  

        $("#submit").click(function(e){

        //numele materiei
        var name = $("#materie").val();  
        console.log(name);
        
        //nota materiei
        var nota = $(".materii").val();
        console.log(nota);

        //data in care s a pus abs
        var data = $(".datepicker").val();
        console.log(data);

        var este_teza;
        if($(".checkInput").is(":checked"))
            este_teza = "da";
        else este_teza ="nu";
        console.log(este_teza);

       //verificam daca toate campurile sunt completate
        if(name == '' || data == '' || nota == '') {
            $("#error_message").fadeIn().html("Toate campurile sunt necesare!");
        }
        else {
            $("#error_message").html('');
            $.ajax({
                url:"note.php",
                method:"POST",
                data:{numeMaterie:name, nota:nota, data:data, este_teza:este_teza},
                success:function(data){
                    // alert(data);
                    $("#add_form")[0].reset();
                    // $("#teza").addClass("w3-hide");    
                }
            });
        }
    }); 
});