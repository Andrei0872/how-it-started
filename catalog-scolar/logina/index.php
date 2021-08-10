<?php
include_once 'db/crud.php';
session_start();
// ini_set('display_errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(E_ALL);
if($_SESSION['username']==''){
      header("location:login.php");
   }
$crud = new Crud();
    $nume = $crud -> escape_string($_SESSION['username']);
    $result = $crud -> getData("SELECT * FROM elevi WHERE userelev ='$nume'");
    foreach($result as $res => $row){
        $unu = $row['nume'];
        $doi = $row['prenume'];
        $id = $row['id'];
        
    }
$_SESSION['noua'] = '9';
$_SESSION['zece'] = '10';
$_SESSION['unspe'] = '11';
$_SESSION['doispe'] = '12';
$_SESSION['a'] = 'A';
$_SESSION['b'] = 'B';
$_SESSION['c'] = 'C';
$_SESSION['d'] = 'D';
$crud = new Crud();
$sql = "SELECT * FROM elevi";
$result = $crud->getData($sql);
$nr = 0;
//determin cati elevi sunt
foreach($result as  $key=>$value) {
  $nr++;
}
$sql_prof = "SELECT * FROM profesori";
$nrProf= 0;
$result1 = $crud->getData($sql_prof);
foreach($result1 as  $key=>$value) {
    $nrProf++;
  }

?>

<!DOCTYPE html>
<html>
    <title>Catalog Elev</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        
        html,body {
            height: 100%;
            width: 100%;
        }
        

        html,body,h1,h2,h3,h4,h5 {font-family: "Arvo", sans-serif}
        a {
            margin: 0 5px;
        }
        * {
            box-sizing: border-box;
        }
        body {
            position: relative;
            margin: 0;
            padding: 0;
            background: url('imgs/verde.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        
        
        tr > td:nth-child(1) {
            background-color:#0FD1B7 ;
        }

        @media only screen and (max-width: 600px) {
            #delogare,#delog {
                width: 100%;
            }
            #theModal > div{
                margin-top: 50%;
                font-size: 17px;
            }
        }

    </style>
    <body class="w3-light-grey" style="height:100%;">
        <!-- Top container -->
        <div class="w3-bar w3-top w3-black w3-large" style="z-index:4"> 
            <a style="float:right;" class="w3-center w3-right w3-button w3-green" style="margin-right:0;" id="delogare" href="logout.php">Delogare</a><span id="delog" class="w3-bar-item w3-right">Bine ati venit, <?php echo $unu." ".$doi ?></span>
        </div>
        <!-- !PAGE CONTENT! -->
        <div class="w3-container main" style="margin-left:3px;margin-top:43px;">
            <!-- Header -->
            <header class="w3-container" style="padding-top:22px;color:#4f4d51;">
                <h5><b><i style="font-family:'FontAwesome';margin-right:5px;"  class="fas fa-cog"></i>Panou de control</b></h5>
            </header>
            <div class="w3-row-padding w3-margin-bottom"> <!-- w3-row-padding pune un margin intre imagini --> 
                <div class="w3-third">
                    <div class="w3-container w3-round-xlarge w3-teal w3-padding-16"> <!-- primul -->
                        <div style="padding:10px 0 0 10px;" class="w3-left"><i class="fa fa-users w3-xxlarge"></i></div>
                        <div class="w3-right">
                            <h3><?php echo $nr; ?></h3> 
                        </div>
                        <div class="w3-clear"></div> <!-- w3-clear = clear floats -->        
                        <!-- div ul ce contine acordeonul  -->
                        <!-- style="border-radius:5px;border:2px solid #960a0a;" -->
                        <h5 onclick="myFunction('demoAll')" style="cursor:pointer;box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.5);" style="cursor:pointer;"  class="w3-teal w3-container w3-center w3-border w3-border-white" align="center">Elevi inregistrati</h5>
                        <div style="padding-bottom:5px;" id="demoAll" class="w3-card w3-teal w3-hide">
                            <!-- in pun intr un div  -->
<!--                            <div   class="w3-hide">-->
                            <div class="w3-container">
                                <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-teal">
                                    Clasa a IX-a</button>
                                <div id="Demo2" style="margin-bottom:8px;" class="w3-hide w3-container w3-center">
                                    <div class="w3-row" >
                                        <div  class="w3-col s3"><a href="cls9.php?tip=<?php echo $_SESSION['noua'];?>&lit=<?php echo $_SESSION['a']; ?>" class="w3-button w3-padding-small">A</a></div>
                                        <div  class="w3-col s3"><a href="cls9.php?tip=<?php echo $_SESSION['noua'];?>&lit=<?php echo $_SESSION['b']; ?>" class="w3-button w3-padding-small">B</a></div>
                                        <div  class="w3-col s3  "><a href="cls9.php?tip=<?php echo $_SESSION['noua'];?>&lit=<?php echo $_SESSION['c']; ?>" class="w3-button w3-padding-small">C</a></div>
                                        <div  class="w3-col s3 "><a href="cls9.php?tip=<?php echo $_SESSION['noua'];?>&lit=<?php echo $_SESSION['d']; ?>" class="w3-button w3-padding-small">D</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="w3-container">
                                <button onclick="myFunction('Demo3')" class="w3-btn w3-block w3-teal">
                                    Clasa a X-a</button>                                
                                <div id="Demo3" class="w3-hide w3-container w3-center w3-teal" style="margin-bottom:8px;">
                                    <div class="w3-row" >
                                        <div  class="w3-col s3"><a href="cls9.php?tip=<?php echo $_SESSION['zece'];?>&lit=<?php echo $_SESSION['a']; ?>" class="w3-button w3-padding-small">A</a></div>
                                        <div  class="w3-col s3"><a href="cls9.php?tip=<?php echo $_SESSION['zece'];?>&lit=<?php echo $_SESSION['b']; ?>" class="w3-button w3-padding-small">B</a></div>
                                        <div  class="w3-col s3  "><a href="cls9.php?tip=<?php echo $_SESSION['zece'];?>&lit=<?php echo $_SESSION['c']; ?>" class="w3-button w3-padding-small">C</a></div>
                                        <div  class="w3-col s3 "><a href="cls9.php?tip=<?php echo $_SESSION['zece'];?>&lit=<?php echo $_SESSION['d']; ?>" class="w3-button w3-padding-small">D</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="w3-container">
                                <button onclick="myFunction('Demo4')" class="w3-btn w3-block w3-center w3-teal">
                                    Clasa a XI-a</button>
                                <div id="Demo4" class="w3-hide w3-container w3-center" style="margin-bottom:8px;">
                                    <div class="w3-row" >
                                        <div  class="w3-col s3"><a href="cls9.php?tip=<?php echo $_SESSION['unspe'];?>&lit=<?php echo $_SESSION['a']; ?>" class="w3-button w3-padding-small">A</a></div>
                                        <div  class="w3-col s3"><a href="cls9.php?tip=<?php echo $_SESSION['unspe'];?>&lit=<?php echo $_SESSION['b']; ?>" class="w3-button w3-padding-small">B</a></div>
                                        <div  class="w3-col s3  "><a href="cls9.php?tip=<?php echo $_SESSION['unspe'];?>&lit=<?php echo $_SESSION['c']; ?>" class="w3-button w3-padding-small">C</a></div>
                                        <div  class="w3-col s3 "><a href="cls9.php?tip=<?php echo $_SESSION['unspe'];?>&lit=<?php echo $_SESSION['d']; ?>" class="w3-button w3-padding-small">D</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="w3-container">
                                <button onclick="myFunction('Demo5')" class="w3-btn w3-block w3-teal">
                                    Clasa a XII-a</button>
                                <div id="Demo5" class="w3-hide w3-container w3-center w3-teal" style="margin-bottom:8px;">
                                    <div class="w3-row" >
                                        <div  class="w3-col s3"><a href="cls9.php?tip=<?php echo $_SESSION['doispe'];?>&lit=<?php echo $_SESSION['a']; ?>" class="w3-button w3-padding-small">A</a></div>
                                        <div  class="w3-col s3"><a href="cls9.php?tip=<?php echo $_SESSION['doispe'];?>&lit=<?php echo $_SESSION['b']; ?>" class="w3-button w3-padding-small">B</a></div>
                                        <div  class="w3-col s3  "><a href="cls9.php?tip=<?php echo $_SESSION['doispe'];?>&lit=<?php echo $_SESSION['c']; ?>" class="w3-button w3-padding-small">C</a></div>
                                        <div  class="w3-col s3 "><a href="cls9.php?tip=<?php echo $_SESSION['doispe'];?>&lit=<?php echo $_SESSION['d']; ?>" class="w3-button w3-padding-small">D</a></div>
                                    </div>
                                </div>
                            </div>
<!--                            </div>-->
                        </div> <!-- end of acordeon -->
                    </div> <!-- end of primul -->
                </div> <!-- end of first DIV -->
                <div class="w3-third">
                    <div class="w3-container w3-round-xlarge w3-blue" style="padding:20px;">
                        <div class="w3-left"><i class="fa fa-id-badge w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3><?php echo $nrProf; ?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <div class="w3-center w3-padding-bottom"> 
                        <a href="profesori.php" class="w3-btn  w3-padding-bottom w3-border w3-border-white" style="cursor:pointer; box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.5);text-align:center;width:80%;" >Profesori</a>
                        </div>
                    </div>
                </div>
                <div class="w3-third">
                    <div style="padding:44px;" class="w3-container w3-orange w3-text-white w3-round-xlarge">
                        <div class="w3-clear"></div>
                        <h4 class="w3-center" onclick="document.getElementById('theModal').style.display='block';" style="cursor:pointer;">Manual de instructiuni</h4>
                    </div>
                </div>
            </div> <!-- end of div ce contine cele 3 -->            
            <!-- end of main part !!  -->
            <!-- Operatiunile anterioare -->

            <!-- modal pt manualul de instructiuni  -->
            <div class="w3-modal w3-animate-opacity" id="theModal">
                <div class="w3-modal-content  w3-animate-top w3-card-4 w3-padding w3-round-xlarge">
                    
                    <!-- header ul  -->
                    <header style="position:relative;" class="w3-container w3-green">
                        <span style="position:absolute;right:0;" class="w3-btn w3-display-right" onclick="document.getElementById('theModal').style.display='none';">&times;</span>
                        <p  style="line-height:15px;">Manual de instruciuni pentru administrator</p>
                    </header>
                    
                    <div class="w3-container">
                        <p>Pe aceasta pagina se poate observa prezenta unui tabel ce permite afisarea evenimentelor recente efectuate de catre <i>administrator</i>.</p>
                        <p>In <b>Panoul de control</b>, adminul are diferite optiuni:poate adauga profesori, elevi, poate adauga note sau absente, poate motiva absente si, de asemnea, este capabil sa vada si informatii referioare la un anumit elev. </p>
                        <hr>
                        <div>
                            Sectiunea <b>Elevi:</b>
                            <p>
                                Dupa cum s-a precizat anterior, adminul adauga noi elevi, elevi care urmeaza sa fie afisati cate 5 pe pagina, adminul avand, de asemnea, posibilitatea de a naviga printre pagini.
                            </p>
                            <p>
                                Pentru fiecare elev exista posibilitatea de a insera/motiva absente, de a insera note la o anumita materie (pentru ambele din urma fiind asigurata optiunea de a atasa si data in care s-a efectuat actiunea) si de a vedea informatiile despre un elev anume, adunate intr-o singura pagina.
                            </p>
                            <p>
                                Pentru <b>a motiva o absenta</b>, tot ce trebuie sa faca administratorul este sa dea dublu click pe absenta pe care doreste s-o motiveze.
                            </p>
                        </div>
                        <hr>
                        <div>
                            Sectiunea <b>Profesori:</b>
                            <p>
                                Aici, administratorul poate fie adauga, fie sterge profesori. 
                            </p>
                            <p>
                                Pentru fiecare profesor, pe langa alte informatii, se cunoaste si materia pe care o preda.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <?php            
            $sql2 = "SELECT * FROM `myNews` ORDER BY id DESC LIMIT 4";    
            $resultt = $crud->getData($sql2);            
            //    if($resultt == false) {
            //        echo "nu";
            //    } else {
            //        echo 'daa';
            //    }    
            ?>    
            <div class="w3-panel">
                <div class="w3-row-padding" style="margin:0 -16px">
                        <h5 style="margin:3px 0 0 5px;color:#4f4d51;">Evenimente recente</h5>
                        <div class="w3-card">
                        <table class="w3-table w3-striped w3-white">
                            <?php                            
                            foreach($resultt as $key=>$row) {
                                echo '<tr>';
                                echo '<td>';
                                echo $row['id'];
                                echo '</td>';
                                echo '<td>';
                                echo $row['informatie'];
                                echo '</td>';
                                echo '</tr>';
                            }            
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            
             
        </div>
        <div class="w3-container w3-center footer">
                <p><i>Conceput de</i><a href="#" target="_blank"> <i>We Build, We fight!</i></a></p>
            </div>
        <script>
          
            //toggle class
            function myFunction(id) {
                var x = document.getElementById(id);
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else { 
                    x.className = x.className.replace(" w3-show", "");
                }
            }

        </script>
    </body>
</html>

