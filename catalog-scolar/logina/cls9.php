
<?php
include_once 'db/crud.php';
session_start();
if($_SESSION['username']==''){
      header("location:login.php");
   }
// $_SESSION['noua'] = 9;
$cls = $_GET['tip'];
// echo $cls; afiseaza bn
 

$_SESSION['classa'] = $cls;
// echo $_SESSION['classa']; si asta afiseaza bn



$conn = new Crud();
$tip = $conn->escape_string($_GET['tip']);
// echo $tip. 'da';

// echo $tip;

$litera = $conn->escape_string($_GET['lit']);
// str_replace("'", "", $litera);



$_SESSION['clsLitera'] = $litera;
// echo $_SESSION['clsLitera'];



$proba = $tip;
$proba .= $litera;
$proba2 = $tip;
$proba2 .=$litera;
$_SESSION['add'] = $proba2;
// echo $_SESSION['add'];
// echo $proba2;
// str_replace("'", "", $proba);
// trim($proba,"'");
$proba = "'".$proba."'"; #pt a fi gasit in baza de date(in baza de date apare de tip varchar)
//  echo $proba; --aparent, merge proba!
$_SESSION['clsSiLitera'] = $proba;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <title>Elevi</title>
    <style>
    html{
        height: 949px;
                background: -moz-linear-gradient(90deg, rgba(222,222,222,1) 0%, rgba(128,128,128,1) 50%, rgba(222,222,222,1) 100%); /* ff3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(222,222,222,1)), color-stop(50%, rgba(128,128,128,1)), color-stop(100%, rgba(222,222,222,1))); /* safari4+,chrome */
background: -webkit-linear-gradient(90deg, rgba(222,222,222,1) 0%, rgba(128,128,128,1) 50%, rgba(222,222,222,1) 100%); /* safari5.1+,chrome10+ */
background: -o-linear-gradient(90deg, rgba(222,222,222,1) 0%, rgba(128,128,128,1) 50%, rgba(222,222,222,1) 100%); /* opera 11.10+ */
background: -ms-linear-gradient(90deg, rgba(222,222,222,1) 0%, rgba(128,128,128,1) 50%, rgba(222,222,222,1) 100%); /* ie10+ */
background: linear-gradient(0deg, rgba(222,222,222,1) 0%, rgba(128,128,128,1) 50%, rgba(222,222,222,1) 100%); /* w3c */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dedede', endColorstr='#DEDEDE',GradientType=0 ); /* ie6-9 */
            
        margin: 0;
        padding: 0;
        

        
        }
        .files {
            position: relative;
            border-radius: 10px;
            padding: 5px;
        }

    .files label {
        border-radius: 10px;
        background: green;
        padding: 5px 20px;
        color: #fff;
        font-weight: bold;
        font-size: .9em; /* 0.9 * current font */
        transition: all .4s;
    }
    /* selectam input file  */
    .files input {
        position: absolute; /*absolut la PARINTELE div cu clasa .file*/
        display: inline-block; /*ca sa fie pe aceeasi linie cu textul*/
        left: 0;
        top: 0;
        opacity: 0.01;
        cursor: pointer;
    }
    /* cand dam hover sau cand butonul este selectat */
    .files input:hover + label,
.files input:focus + label {
  background: whitesmoke;
  color: green;
}

 

 /* pt cand ecranul este mic  */
@media only screen and (max-width: 896px) {
    .resp {
        width: 100%;
        margin-bottom: -10px;
        text-align: center;
    }
}

/* intre mic si normal (un fel de mediu) 
@media only screen and (max-width:1244px) {
    .resp:nth-child(3) {
        margin-left: auto;
        margin-right:auto;
        width: 50%;
        display: block;
        margin-top: 7px;
        margin-bottom: -5px;
    }
}​ */

    </style>
</head>
<body>

<!-- modalul  -->
<div id="modalul" class="w3-modal w3-animate-opacity">

<div class="w3-modal-content w3-animate-top w3-round-large w3-padding-16 w3-card-4">
        <head class="w3-container">
            <!-- butonul "X" care va inchide modalul daca se apasa pe el  -->
          <span class="w3-button w3-small w3-display-topright w3-round-xlarge" style="background:transparent;" onclick="document.getElementById('modalul').style.display='none';">
              &times;
          </span>
      </head>
      <div class="w3-container">

 <form  enctype="multipart/form-data" action="create.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-green w3-margin">
 <h2 class="w3-center w3-margin-top"> Adaugati elevi pentru clasa a <?php echo $_SESSION['classa']; ?> -a <?php echo $_SESSION['clsLitera']; ?></h2>

 <!-- Prenumele -->
<div class="w3-row w3-section">
<!-- <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div> -->
  <div class="w3-rest">
    <input class="w3-input w3-border" name="prenume" type="text" placeholder="Prenume" required>
  </div>
</div>

<!-- numele -->
<div class="w3-row w3-section">
<!-- <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div> -->
  <div class="w3-rest">
    <input class="w3-input w3-border" name="nume" type="text" placeholder="Nume" required>
  </div>
</div>

<!-- email -->
<!-- w3-section - centered content and fixed size -->
<div class="w3-row w3-section">
<!-- <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div> -->
  <div class="w3-rest">
    <input class="w3-input w3-border" name="email" type="text" placeholder="Email Parinte" required>
  </div>
</div>


<!-- clasa -->
<div class="w3-row w3-section">
<!-- <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div> -->
  <div class="w3-rest">
    <input class="w3-input w3-border" name="clasa" type="hidden" value="<?php echo $_SESSION['add']; ?>">
  </div>
</div>


<!-- imaginea elevului  -->
<div class="w3-row w3-section">
<!-- <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div> -->
  <div class="w3-rest files">
      <input type="file" id="thefile" name="avatar" >
      <label for="thefile">Poza elevului</label>
  </div>
</div>

<!-- user name ul elevului  -->
<div class="w3-row w3-section">
  <div class="w3-rest">
      <input type="text" class="w3-input w3-border" name="userElev" placeholder="User Name" required>
  </div>
</div>

<!-- parola elevului  -->
<div class="w3-row w3-section">
  <div class="w3-rest">
      <input type="text" class="w3-input w3-border" name="passElev" placeholder="Parola Elevului" required>
  </div>
</div>


<!-- butonul de submit -->
<button type="submit" id="createElev" class="w3-button w3-block w3-section w3-green w3-ripple w3-padding" style="border-radius:10px;">Trimite</button>

</form>
  </div>
</div>
</div>
<!-- finalul modalului -->

    <div class="w3-container w3-margin-top">
    <h2 class="w3-center">Elevii disponibili pentru clasa a <?php echo $tip; ?>-a <?php echo $litera; ?></h2>
        
    <div class="w3-container w3-left w3-margin-top">
        <a href="javascript:void(0)" class="w3-btn w3-green  w3-hover-ligth-green w3-round-xxlarge" onclick="document.getElementById('modalul').style.display='block'";>Adauga Elevi</a>
    </div>
        <div class="w3-responsive w3-container" id="tabel" style="margin:150px auto;">
            
        </div>


            <!-- buton pt pagina principala  -->
            <div class="w3-container">
                <a href="index.php" class="w3-right w3-btn w3-round-large w3-green">Inapoi la pagina principala <i  class="fa fa-angle-double-left"></i></a>
            </div>
    </div>

  <script>
  
      $(document).ready(function() {
          var modal = $("#modalul")[0];
        //   $("#modalul")[0] - DOM element in jquery object
        // $("#modalul") - jquery object 
       
    //de fiecare data cand pagina se incarca, vom aduce datele
    fetch_data(); 



        //cand se apasa in afara modalului, dorim inchiderea acestuia
        $(window).click(function(event) {
            // console.log(event.target.outerHTML);
            if(event.target == modal ) {
                $("#modalul").css("display","none");
            }
        });

        //pt proba
        // setTimeout(() => {
        //     fetch_data();
        // }, 2000);
        
        
        //cand schimbam paginiline
        $(document).on('click','.button_pagina',function() {
            
            //luam id ul care este de fapt pagina pe care vrem s o accesam
            var page = $(this).attr("id");
            console.log(page);
            
           //incarcam rezultatele de pe pagina dorita
           fetch_data(page); 

        });




        //functie prin care folosim ajax pt a afisa elevii clasei respective
        function fetch_data(page) {
            $.ajax({
                url:"fetchElevi.php",
                method:"POST",
                data: {page:page}, //trimitem pagina
                success:function(data) {
                    // alert(data);
                    $("#tabel").html(data);
                }
            });
        }
        // $("#createElev").on('click',function() {
        //     alert(1);
        // });

      });
  </script>
</body>
</html>
