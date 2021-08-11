$(document).ready(function(){

    setInterval(function(){
        var src = $('script[src="scripturi/checkbox.js"]').attr("src");
        $('script[src="scripturi/checkbox.js"]').remove();
    },1000);


    setInterval(function(){
        var script = document.createElement('script');
        script.src = "scripturi/checkbox.js";
        document.getElementsByTagName('head')[0].appendChild(script);
    }, 1500);


    $("#materie").on('keyup',function(){
        console.log($("#materie").val());
        if($("#materie").val() == '') {
            $("ul").fadeOut('fast');
        }else{
            $("ul").fadeIn();
        }
    });
    var i=1;  
    $('#add').click(function(){  
        i++;  
        var markup = ' <tr id="row'+i+'">  <td><input type="number" min="1" max="10" style="width:100px;height:40px;"   placeholder="Nota..." class="w3-input materii" /></td><td><input style="border:none;width:135px;height:40px;border-radius:20px;" class="dati" type="text"  placeholder="Date"></td>    <td style="width:25%"><label class="check"><input type="checkbox" class="checkInput"  > <span class="label-text">Teza</span></label></td><td><button type="button" name="remove" id="'+i+'" class="w3-btn w3-round-xlarge w3-red btn_remove">Anuleaza Nota</button></td></tr>  ' ;
        $('#tabel').append(markup); 
        $( ".dati" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
    });  
    $(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id")
        $('#row'+button_id+'').remove();
    });  
        $("#submit").click(function(e){
        e.preventDefault();
        var materii = [];
        var dati = [];
        var name = $("#materie").val();  
        $(".dati").each(function(){
            if($(this).val() != '')
            dati.push($(this).val());
        });
        console.log(dati);
        $(".materii").each(function(){
            if($(this).val() != '')
            materii.push($(this).val());
        });
        console.log(materii);
         var informatiiTeza = [];

        $(".checkInput").each(function(){
            if($(this).is(":checked")) {
                informatiiTeza.push("da");
            } else {
                informatiiTeza.push("nu");
            }
        });
        console.log(informatiiTeza);
        var lung = $("table tr").length;
        if(name == '') {
            $("#error_message").fadeIn().html("Toate campurile sunt necesare!");
        }
        else {
            $("#error_message").html('');
            $.ajax({
                url:"note.php",
                method:"POST",
                data:{numeMaterie:name, materii:materii, dati:dati, informatiiTeza:informatiiTeza},
                success:function(data){
                    $("#add_form")[0].reset();
                    $("#teza").addClass("w3-hide");    
                }
            });
        }
    }); 
});