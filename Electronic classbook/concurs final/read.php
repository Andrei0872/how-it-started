<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
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
        </style>
    </head>
    <body>
        <div class=" w3-container w3-margin-top">
            <h2 class="w3-center">Notele si absentele elevului:<br><?php echo $unu." "; echo $doi; ?> </h2>
            <div style="text-align:center; width:100%;"><img c;ass="w3-image" style="margin:0 auto" src="<?php echo $poza ?>" alt="Poza Elev"></div>
            
            <div class=" tabel w3-responsive w3-container">                
                
                    <?php
                        $cont = 0;
                        $suma = 0;
                        $medie = 0;
                        $nrnote = 0;
                        $totalabsente = 0;

                        $resultn = $crud -> getData("SELECT * FROM note WHERE elev =$id GROUP BY disciplina");
                        if($resultn==NULL) $resultn = $crud -> getData("SELECT * FROM absente WHERE elev =$id GROUP BY disciplina");
                        if($resultn != NULL){
                            foreach($resultn as $resn => $rown){
                                echo "<table class=\"w3-table-all w3-centered w3-border w3-hoverable\"><thead><td style=\"width:10%\">  </td><td>" . $rown['disciplina'] . "</td></thead>";
                                echo "<tbody>";
                                    echo "<tr>";
                                        echo "<td>Note</td>";
                                        echo "<td style=\"padding-left:69px;\" class=\"w3-container\">";
                                            $suma = 0;
                                            $medie = 0;
                                            $nrnote = 0;
                                            $teza = 0;
                                            $materie = $rown['disciplina'];
                                            $result1 = $crud ->getData("SELECT * FROM note WHERE `disciplina` LIKE '%$materie%' AND `elev`=$id");
                                            foreach($result1 as $res1 => $row1){
                                                echo "<span style=\"margin: 0 2.5%;\" class=\"hide-option\" title=\"".$row1['datant']."\">".$row1['nota']."</span>";
                                                $suma = $suma + $row1['nota'];
                                                $nrnote++;
                                            }
                                            if ($result1!=NULL)$medie = $suma/$nrnote;
                                            $result2 = $crud ->getData("SELECT * FROM note WHERE `disciplina` LIKE '%$materie%' AND `elev`=$id AND `teza`=1 LIMIT 1");
                                            foreach($result2 as $res2 => $row2){
                                                echo "<span style=\"margin: 0 2.5%; color:crimson;\" class=\"hide-option\" title=\"".$row2['datant']."\">".$row2['nota']."</span>";
                                                $teza = $row2['nota'];
                                            }
                                            if ($result1!=NULL){
                                            if($teza==0)
                                                echo "<div style=\"float:right\">Medie:".round($medie)."</div>";
                                            else {
                                                $medie = ($medie*3+$teza)/4;
                                                echo "<div style=\"float:right\">Medie:".round($medie)."</div>";
                                            }}
                                        echo "</td>";
                                        
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Absente</td>";
                                        echo "<td style=\"padding-left:69px;\">";
                                            $absente = 0;
                                            $materie = $rown['disciplina'];
                                            $result3 = $crud ->getData("SELECT * FROM absente WHERE `disciplina` LIKE '%$materie%' AND `elev`=$id");
                                            foreach($result3 as $res3 => $row3){
                                                $absente++;
                                                echo "<span style=\"margin: 0 2.5%;\" class=\"hide-option\" title=\"".$row3['dataab']."\">";
                                                if($row3['absenta']==1) echo "X";
                                                else echo "<span style=\"margin: 0 3%; border:1px solid red; border-radius:50%;\">&nbsp;X&nbsp;</span>\t";
                                                echo "</span>";
                                            }
                                            echo "<div style=\"float:right\">Nr. Absente:".$absente."</div>";
                                        echo "</td>";
                                    echo "</tr>";
                                echo "</tbody></table><br>";
                            }    
                        }
                        
                    ?>
                
            </div>
        </div> 
    </body>
</html>