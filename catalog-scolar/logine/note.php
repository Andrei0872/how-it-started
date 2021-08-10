<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'db/crud.php';
session_start();
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
        $poza = $row['poza'];
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
                padding-right: 0!important;
                padding-left: 0!important;
                font-size:20px;
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
                    margin-right: 40%!important;
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
            tr{
                text-align:center;
            }
        </style>
    </head>
    <body>
        <div class="w3-container w3-margin-top continut">
            <div class="w3-display-topright lgt " style="margin:10px;text-align:right;"><a href="logout.php" class="w3-button w3-green">Logout</a></div>
            
<!--                <img class="w3-image w3-circle" style="margin:0 auto; border:2px solid white;" src="" alt="Poza Elev">-->
            <div style="text-align:center; width:100%;">
                <div class="w3-card ctn" style=" margin:0 auto;width:50%">
                    <img class="w3-circle" src="<?php echo $poza ?>" alt="Person" style="width:30%%">
                    <div class="w3-container w3-light-grey">
                        <h4><b><?php echo $unu." "; echo $doi; ?></b></h4>
                        <div class="w3-center" style="font-size:18px"><p id="vali"></p></div>
                    </div>
                </div>
                <br>
            </div>
            
            </div>
             <div class="w3-container w3-margin-top">
            <div style="opacity:0.8; margin-top:10px; box-shadow:2px 2px aqua; padding-tight:0;  border-left:2px solid aqua;  border-top:2px solid aqua;  border-ight:1px solid aqua;  border-bottom:1px solid aqua;" class="tabel w3-responsive w3-container">                
                
                    <?php
                        $cont = 0;
                        $suma = 0;
                        $medie = 0;
                        $nrmedii=0;
                        $mediegen = 0;
                        $totalabsente = 0;
                        $materii = 0;
                        $resultn = $crud -> getData("SELECT * FROM note WHERE elev =$id GROUP BY disciplina");
//                        $resultn = $crud -> getData("SELECT * FROM absente WHERE elev =$id GROUP BY disciplina");
                        foreach($resultn as $resn => $rown){
                            /*
                            <button onclick="myFunction('Demo3')" class="w3-btn w3-block w3-black w3-left-align">Open Section 1</button>
                            <div id="Demo3" class="w3-container w3-hide">
                                <h4>Section 1</h4>
                                <p>Some text..</p>
                                </div>
                                </div>
                                <script>
                                function myFunction(id) {
                                var x = document.getElementById(id);
                                if (x.className.indexOf("w3-show") == -1) {
                                x.className += " w3-show";
                                } else { 
                                x.className = x.className.replace(" w3-show", "");
                                }
                                }
                                </script>
                            */
                                $materii++; 
                                echo "<button style=\"background:#3ea5e8; color:white; border-bottom:1px solid lightgrey\" onclick=\"myFunction('Demo".$materii."')\" class=\"w3-btn w3-block w3-left-align\">" . $rown['disciplina'] . "</button>";
                                echo "<div id=\"Demo".$materii."\" class=\" w3-hide\" style=\"background:white;\"><table style=\"width:100%; color:black\">";
                                    echo "<tr>";
                                        echo "<td>Note</td>";
                                        echo "<td class=\"afisat w3-container\">";
                                            $suma = 0;
                                            $medie = 0;
                                            $nrnote = 0;
                                            $teza = 0;
                                            $materie = $rown['disciplina'];
                                            $result1 = $crud ->getData("SELECT * FROM note WHERE disciplina='$materie' AND `elev`=$id");
                                            foreach($result1 as $res1 => $row1){
                                                if($row1['teza']==0 && $row1['nota']!=""){
                                                    $newdate=date("d-m-Y", strtotime($row1['datant']));
                                                    echo "<span style=\"margin: 0 2.5%;\" class=\"hide-option\" title=\"".$newdate."\">".$row1['nota']."</span>";
                                                    $suma = $suma + $row1['nota'];
                                                    $nrnote++;
                                                }
                                            }
                                            if ($result1!=NULL && $nrnote!=0)$medie = $suma/$nrnote;
                                            $result2 = $crud ->getData("SELECT * FROM note WHERE disciplina='$materie' AND `elev`=$id AND `teza`=1 LIMIT 1");
                                            foreach($result2 as $res2 => $row2){
                                                $newdate=date("d-m-Y", strtotime($row2['datant']));
                                                echo "<span style=\"margin: 0 2.5%; color:crimson;\" class=\"hide-option\" title=\"".$newdate."\">".$row2['nota']."</span>";
                                                $teza = $row2['nota'];
                                            }
                                            echo "</td><td>";
                                            if ($result1!=NULL && $nrnote!=0){
                                            if($teza==0)
                                                echo "<div style=\"float:right\">Medie:".round($medie)."</div>";
                                            else {
                                                $medie = ($medie*3+$teza)/4;
                                                echo "<div style=\"float:right\">Medie:".round($medie)."</div>";
                                            }
                                            $nrmedii++;
                                            }
                                            else{
                                                echo "<div style=\"float:right\">Medie: -</div>";
                                            }
                                            $mediegen = $mediegen + $medie;
                                            
                                        echo "</td>";
                                        
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Absente</td>";
                                        echo "<td class=\"afisat\">";
                                            $absente = 0;
                                            $materie = $rown['disciplina'];
                                            $result3 = $crud ->getData("SELECT * FROM absente WHERE disciplina='$materie' AND `elev`=$id");
                                            foreach($result3 as $res3 => $row3){
                                                $absente++;
                                                $newdate=date("d-m-Y", strtotime($row3['dataab']));
                                                echo "<span style=\"margin: 0 2.5%;\" class=\"hide-option\" title=\"".$newdate."\">";
                                                if($row3['absenta']==1){ echo "X"; $totalabsente++;}
                                                else echo "<span style=\"margin: 0 2.5%; border:1px solid red; border-radius:50%;\">&nbsp;X&nbsp;</span>\t";
                                                echo "</span>";
                                            }
                                            echo "</td><td><div style=\"float:right\">Nr. Absente:".$absente."</div>";
                                            
                                        echo "</td>";
                                    echo "</tr>";
                                echo "</table></div>";
                            }                            
                    ?>
            
            </div>
        </div> 
        <script>
            function myFunction(id) {
                var x = document.getElementById(id);
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } 
                else { 
                    x.className = x.className.replace(" w3-show", "");
                }
            }
        </script>
        <?php echo'<script>document.getElementById("vali").innerHTML = " Numarul de absente: '.$totalabsente.'&nbsp;&nbsp;&nbsp; Media generala: '.number_format($mediegen/$nrmedii,2,'.', ' ').'"; </script>'?>
    </body>
</html>
