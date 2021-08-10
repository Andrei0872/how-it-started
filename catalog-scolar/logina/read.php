<?php
// ini_set('display_errors',1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
if($_SESSION['username']==''){
      header("location:login.php");
   }
include_once("db/crud.php");
    $crud = new Crud();
    $nr = $crud -> escape_string($_GET['id']);
    $result = $crud -> getData("SELECT * FROM elevi WHERE id ='$nr'");
    foreach($result as $res => $row){
        $unu = $row['nume'];
        $doi = $row['prenume'];
        $id = $row['id'];
        $poza=$row['poza'];
    }    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
        <title>Elevi</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".hide-option" ).tooltip({
      hide: {
        effect: "explode",
        delay: 250
      }
    });
  } );
  </script>

        <script> 
$(document).ready(function(){
    $("#nrabsente").click(function(){
        $("#numar").slideToggle("slow");
    });
});
</script>
        <style>
            
           html{
        height: 100%;
        background: url("notev1.jpg");    
        margin: 0;
        padding: 0;
        
        }   
            .tabel{
                margin:150px auto;
                width:50%;
                padding-right: 0!important;
                padding-left: 0!important;
                font-size:20px;
                -webkit-box-shadow: 1px 6px 43px 11px rgba(0,0,0,0.42);
                -moz-box-shadow: 1px 6px 43px 11px rgba(0,0,0,0.42);
                box-shadow: 1px 6px 43px 11px rgba(0,0,0,0.42);
            }

            .materie{
                width:25%;
                background: #99d6ff;
            }
            .note{
                background: #66ff66;
            }
            .absente{
                width:30%;
                background: #ff8566;
            }
            .nemotivate{
                width:30%;
                background: #ff8566;
                margin: 0 auto;
            }
            .motivata{
                width:30%;
                background: #66ff66;
            }
            .data {
                background: #e6e6e6;
                width: 30%;
            }
            .w3-hoverable tbody tr:hover{
                background: white;
            }
            .danu{
                background: -moz-linear-gradient(0deg, rgba(255,51,0,1) 0%, rgba(255,51,0,1) 50%, rgba(0,230,0,1) 51%, rgba(0,230,0,1) 100%); /* ff3.6+ */
                background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255,51,0,1)), color-stop(50%, rgba(255,51,0,1)), color-stop(51%, rgba(0,230,0,1)), color-stop(100%, rgba(0,230,0,1))); /* safari4+,chrome */
                background: -webkit-linear-gradient(0deg, rgba(255,51,0,1) 0%, rgba(255,51,0,1) 50%, rgba(0,230,0,1) 51%, rgba(0,230,0,1) 100%); /* safari5.1+,chrome10+ */
                background: -o-linear-gradient(0deg, rgba(255,51,0,1) 0%, rgba(255,51,0,1) 50%, rgba(0,230,0,1) 51%, rgba(0,230,0,1) 100%); /* opera 11.10+ */
                background: -ms-linear-gradient(0deg, rgba(255,51,0,1) 0%, rgba(255,51,0,1) 50%, rgba(0,230,0,1) 51%, rgba(0,230,0,1) 100%); /* ie10+ */
                background: linear-gradient(90deg, rgba(255,51,0,1) 0%, rgba(255,51,0,1) 50%, rgba(0,230,0,1) 51%, rgba(0,230,0,1) 100%); /* w3c */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff3300', endColorstr='#00e600',GradientType=1 ); /* ie6-9 */
            }
            .tabel{
                margin:150px auto;
                width:50%;
            }
            @media only screen and (max-width: 826px) {
                .tabel{
                    width:70%;
                }
            }
            
            @media only screen and (max-width: 500px) {
                .ctn{
                    width:100%;
                }
                .tabel{
                    width: 95%;
                    padding:0;
                    margin-top: 150px;
                }
            }

                .afisat{
                    width:70%;
                }

            
            .cursor:hover{
                cursor: pointer;
            }
            .hide-option:hover{
                cursor: pointer;
                color:crimson;
                border-bottom: 1px solid crimson;
            }
            .w3-display-middle{
                top:25%!important;
                position: absolute!important;
            }

            .absentaMotivata {

                width: 20px;
                line-height:20px;
                border:1px solid red;
                text-align:center;
                border-radius : 50%;
                transition: all 0.5s;
            }
            @media only screen and (max-width: 953px) {
                .tabel{
                    width:70%;
                }
                
                .ctn{
                    width: 70%!important;
                }
            }
            
            @media only screen and (max-width: 500px) {
                .ctn{
                    width:100%;
                }
                .tabel{
                    width: 95%;
                    padding:0;
                    margin-top: 150px;
                }
                .continut{
                    margin-top:60px!important;
                }
                .lgt{
                    margin-right: 30%!important;
                }
            }
               
            

             span {
 
                -webkit-touch-callout: none; /* iOS Safari */
                -webkit-user-select: none; /* Safari */
                -khtml-user-select: none; /* Konqueror HTML */
                -moz-user-select: none; /* Firefox */
                -ms-user-select: none; /* Internet Explorer/Edge */
                user-select: none; /* Non-prefixed version, currently
                                                supported by Chrome and Opera */
 }

        </style>
    </head>
    <body>
    <div class="w3-container w3-margin-top continut">
            <div class="w3-display-topright lgt" style="margin:10px;text-align:right;"><a href="javascript:history.go(-1)" class="lgt w3-button w3-green">Pagina anterioara</a></div>
            
<!--                <img class="w3-image w3-circle" style="margin:0 auto; border:2px solid white;" src="" alt="Poza Elev">-->
            <div  style="margin-top:30px;text-align:center; width:100%;">
                <div class="w3-card ctn" style=" margin:0 auto;width:30%">
                    <img class="w3-circle" src="<?php echo $poza ?>" alt="Person" style="width:30%%">
                    <div class="w3-container w3-light-grey">
                        <h4><b><?php echo $unu." "; echo $doi; ?></b></h4>
                        <div class="w3-center" style="font-size:18px"><p id="vali"></p></div>
                    </div>
                </div>
                <br>
            </div>
            
            </div>
        <div class=" w3-container w3-margin-top">
            <div class=" tabel w3-responsive w3-container" id="tabell" style=" opacity:0.8;"></div>
        </div>
        
        <script>
        
        $(document).ready(function(){

            //cand se incarca pagina, dorim afisarea materiilor
            fetch_data();


            //cand dam click pe absenta
            $(document).on('dblclick','.absenta',function() {

            //obtin nr care repr al catelea tabel este
            var nr = $(this).data("inff");
            console.log(nr);
            //o incercuiesc ca sa arat ca este motivata
            $(this).toggleClass("absentaMotivata");
            
            var este_motivata = $(this).hasClass("absentaMotivata") ? 1:0;
            console.log(este_motivata);
          //  alert(este_motivata);
            //alert(nr);
               //var val =   $(this).parents("tr").parents().find(".disc").eq(nr).text();
            //preiau materia pt a o trimite la server
            var val =   $(this).parents().find(".disc").eq(nr).text();
               //alert(val);
               console.log(val);

                //in caz ca sunt mai multe note, e nev sa determin a cata nota este
                var indexData  = $(this).data("abs");

            //  facem cerere ajax
            //apelez functia fetch_data(val,este_motivata,indexData)
               fetch_data(val,este_motivata,indexData);
            });

            //val - numeMaterie
            //este_motivata - daca trebuie sa fie motivata sau nu
            //indexData -  a cata nota este
            function fetch_data(val,este_motivata,indexData) {
                $.ajax({
                   //$nr - id ul elevului 
                   url:"motivareAbs.php?id=<?php echo $nr; ?>",
                   method:"POST",
                   data:{numeMaterie:val, este_motivata:este_motivata, nrData:indexData},
                   success:function(data) {
                    //    alert(data);
                    // location.reload(); //refresh
                    $("#tabell").html(data);
                }
               }); 
            }


            function showAcc(id) {
                var elem = $("#"+id); //luam elementul
                
                //daca e deja afisat, cand se apasa, il facem sa dispara
                if(elem.hasClass("w3-show")) {
                    //ii scoatem clasa ca sa dispara
                    elem.removeClass("w3-show");
                } else {
                    //daca nu este deja afisat
                
                    //il facem sa apara, adaugandu i clasa w3-show
                    elem.addClass("w3-show");
                }
            }

            //partea cu acordeonul
            $(document).on('click','button[data-acc*=Demo]',function(){
                var idDiv = $(this).data("acc");
                showAcc(idDiv);
            });
            
        });       
        </script> 
    </body>
</html>