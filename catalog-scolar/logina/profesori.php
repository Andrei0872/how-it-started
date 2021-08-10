<?php

include_once 'db/crud.php';
session_start();
if($_SESSION['username']==''){
      header("location:login.php");
   }
//creez o noua instanta

$conn = new Crud();

$sql = "SELECT * FROM profesori ORDER BY idp DESC";

$result = $conn->getData($sql);



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profesori</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html{
            height:100%;
            background: -moz-linear-gradient(90deg, rgba(222,222,222,1) 0%, rgba(128,128,128,1) 50%, rgba(222,222,222,1) 100%); /* ff3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(222,222,222,1)), color-stop(50%, rgba(128,128,128,1)), color-stop(100%, rgba(222,222,222,1))); /* safari4+,chrome */
background: -webkit-linear-gradient(90deg, rgba(222,222,222,1) 0%, rgba(128,128,128,1) 50%, rgba(222,222,222,1) 100%); /* safari5.1+,chrome10+ */
background: -o-linear-gradient(90deg, rgba(222,222,222,1) 0%, rgba(128,128,128,1) 50%, rgba(222,222,222,1) 100%); /* opera 11.10+ */
background: -ms-linear-gradient(90deg, rgba(222,222,222,1) 0%, rgba(128,128,128,1) 50%, rgba(222,222,222,1) 100%); /* ie10+ */
background: linear-gradient(0deg, rgba(222,222,222,1) 0%, rgba(128,128,128,1) 50%, rgba(222,222,222,1) 100%); /* w3c */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dedede', endColorstr='#DEDEDE',GradientType=0 ); /* ie6-9 */
        }
    </style>
</head>
<body>
        <!-- inceputul modalului  -->
        <div id="modalul" class="w3-modal w3-animate-opacity">
            <!-- continutul modalului  -->
            <div class="w3-modal-content w3-animate-right w3-round-large w3-padding-16 w3-card-4">
                <head>
                    <!-- aici punem butonul de inchidere -->
                    <span style="background-color:transparent;" class="w3-btn w3-round-xlarge w3-display-topright" onclick="document.getElementById('modalul').style.display='none';">
                        &times;
                    </span>
                </head>
                <!-- div ul care va contine form ul  -->
                <div class="w3-container" style="margin-top:6px;">
                    <form   action="createProf.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-green w3-margin">
                        <h2 class="w3-center w3-margin-top"> Adaugati Profesori</h2>

                        <!-- Prenumele -->
                        <div class="w3-row w3-section">

                            <div class="w3-rest">
                            <input class="w3-input w3-border" name="prenume" type="text" placeholder="Prenume" required>
                            </div>
                        </div>

                        <!-- numele -->
                        <div class="w3-row w3-section">

                            <div class="w3-rest">
                            <input class="w3-input w3-border" name="nume" type="text" placeholder="Nume" required>
                            </div>
                        </div>

                        <!-- email -->
                        <!-- w3-section - centered content and fixed size -->
                        <div class="w3-row w3-section">

                            <div class="w3-rest">
                            <input class="w3-input w3-border" name="email" type="text" placeholder="Email" required>
                            </div>
                        </div>


                        <!-- disciplina -->
                        <div class="w3-row w3-section">

                            <div class="w3-rest">
                            <input class="w3-input w3-border" name="disciplina" type="text" placeholder="Disciplina" required>
                            </div>
                        </div>
                    
                        <!--butonul de submit form -->
                        <button type="submit" id="submitBtn" class="w3-btn w3-block w3-section w3-teal w3-ripple w3-padding" style="border-radius:10px;">Trimite</button>
                
                </form>
            </div>
        </div>
    </div>
        <!-- finalul modalului -->


    <div class="w3-container w3-margin w3-padding">
        
        <div class="w3-container w3-left w3-margin">
            <!-- cand acest buton va fi apasat, va aparea modalul  -->
            <a href="javascript:void(0);" onclick="document.getElementById('modalul').style.display='block';" class="w3-right w3-padding w3-btn w3-round-large w3-green">Adauga Profesori</a>
        </div>
        <div class="w3-clear"></div>
        <div class="w3-container">
            <div class="w3-responsive">
                <table class="w3-table-all" >
                    <thead>    
                        <tr>
                            <th class="w3-center" style="width:20%;">Nume</th>
                            <th class="w3-center" style="width:20%;">Prenume</th>
                            <th class="w3-center" style="width:20%;">Email</th>
                            <th class="w3-center" style="width:20%;">Disciplina</th>
                             <th class="w3-center" style="width:20%;">Stergere Profesor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        foreach($result as $key=>$row) {
                            echo '<tr>';
                            echo '<td class="w3-center" style="vertical-align:middle;">';
                            echo $row['nume'];
                            echo '</td><td class="w3-center" style="vertical-align:middle;">';
                            echo $row['prenume'];
                            echo '</td><td class="w3-center" style="vertical-align:middle;">';
                            echo $row['email'];
                            echo '</td><td class="w3-center" style="vertical-align:middle;">';
                            echo $row['disciplina'];
                            echo '</td><td class="w3-center">';
                            echo  '<button onclick=\'document.getElementById("modal'.$row['idp'].'").style.display="block"\' class=\'w3-btn w3-red w3-round-xlarge\'><i class=\'fa fa-remove\' style=\'font-size:13px\'></i></button>
                            <div id=\'modal'.$row['idp'].'\' class=\'w3-modal w3-animate-opacity\'>
                                <div class=\'w3-modal-content w3-card-4 w3-round-xlarge w3-animate-bottom\'>
                                   <header  class=\'w3-block w3-red w3-round-xlarge\' style=\'text-align:right;\'>
                                        <span class=\'w3-btn  w3-round-xlarge\' onclick=\'document.getElementById("modal'.$row['idp'].'").style.display="none"\'>&times;</span>
                                   </header>
                                   <div class=\'w3-container\'>
                                        <p><b> Sunteti sigur ca vreti sa stergeti acest profesor? </b></p>
                                        <a class=\'w3-btn w3-round-xlarge w3-green\' href=\'deleteProf.php?id='.$row['idp'].'\' style=\'margin:5px;\'>Da</a>
                                        <a href=\'javascript:void(0)\' class=\'w3-btn w3-red w3-round-xlarge\' style=\'margin:5px;\' onclick=\'document.getElementById("modal'.$row['idp'].'").style.display="none"\'>Nu</a>
                                   </div>
                                </div>
                            </div>
                            ';
                            echo '</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w3-container w3-right w3-margin">
            <a href="index.php" class="w3-btn w3-round-xlarge w3-green w3-ripple">Pagina Principala</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script>
    
    $(document).ready(function() {

            $(window).click(function(e){ //e.target == elementul care a declansat event ul
                //cautam in toate Jquery objs care au id ul modal
                $("div[id*='modal']").each(function(){ //[att*='name'] - toate elementele care in "attr" lor au grupul de cuvinte "name"
                    if($(this)[0] == e.target)  //cand gasim DOM elementul din JS obj care este egal cu e.target
                    //$(this)[0] DOM ELEMENTUL DINTR UN JQUERY OBJECT
                        $(this).css("display","none"); //atunci dispare
                    });
                });
            });
    
    </script>
</body>
</html>