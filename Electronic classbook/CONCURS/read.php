<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once("db/Crud.php");
    $crud = new Crud();
    $nr = $crud -> escape_string($_GET['id']);
    $result = $crud -> getData("SELECT * FROM elevi WHERE id ='$nr'");
    foreach($result as $res => $row){
        $unu = $row['nume'];
        $doi = $row['prenume'];
        $id = $row['id'];
        
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
        <style>
            .materie{
                width:30%;
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
        </style>
    </head>
    <body>
        <div class="w3-container w3-margin-top">
            <h2 class="w3-center">Notele si absentele elevului:<br><?php echo $unu." "; echo $doi; ?> </h2>
            <div class="w3-responsive w3-container" style="width:50%; margin:150px auto">                
                <table class="w3-table-all w3-centered w3-border w3-hoverable">
                    <thead>
                        <tr>
                            <td style="background: #008ae6; width:40%">Disciplina</td>
                            <td style="background: #00e600">Note</td>
                            <td style="background: #ff3300">Numarul de absente</td>
                        </tr>                        
                    </thead>
                    <tbody>
                        <?php
                        $cont = 0;
                        

                        $resultn = $crud -> getData("SELECT * FROM note WHERE elev =$id GROUP BY disciplina");
                        foreach($resultn as $resn => $rown){
                            $cont++;
                            echo "<tr>";
                            echo "<td class=\"materie\">".$rown['disciplina']."</td>";
                            $materie = $rown['disciplina'];
                            $result1 = $crud ->getData("SELECT * FROM note WHERE `disciplina` LIKE '%$materie%' ");
                            $result2 = $crud ->getData("SELECT * FROM note WHERE `disciplina` LIKE '%$materie%' ");
                            echo "<td class=\"note\" onclick=\"document.getElementById('id".$cont."1').style.display='block'\">";
                            foreach($result1 as $res1 => $row1){
                                echo $row1['nota']." ";
                            }
                            echo "&nbsp;</td>";
                            $absente=0;
                            $resulta = $crud -> getData("SELECT * FROM absente WHERE elev =$id AND disciplina LIKE '%$materie%'");
                            foreach($resulta as $resa => $rowa){
                                $absente++;
                            }
                            echo "<td class=\"absente\" onclick=\"document.getElementById('id".$cont."2').style.display='block'\">".$absente."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div> 
        
        <?php
            $cont = 0;
            foreach($resultn as $resn => $rown){
                $cont++;
                $materie = $rown['disciplina'];
                echo "<div id=\"id".$cont."1\" class=\"w3-modal\"><div class=\"w3-modal-content w3-animate-zoom w3-card-4\" style=\"width:40%; margin:0 auto;\"><header><span onclick=\"document.getElementById('id".$cont."1').style.display='none'\" class=\"w3-button w3-display-topright\">&times;</span><br><br></header><table class=\"w3-table-all w3-centered w3-striped w3-border w3-hoverable\" style=\"width:100%; margin:0 auto;\"><thead><td style=\"background: #00e600\">Nota</td><td style=\"background: #bfbfbf\">Data</td></thead>";  
                $result1 = $crud ->getData("SELECT * FROM note WHERE `disciplina` LIKE '%$materie%' ");
                $result2 = $crud ->getData("SELECT * FROM absente WHERE `disciplina` LIKE '%$materie%' ");
                foreach($result1 as $res1 => $row1){
                    echo "<tr>";
                    echo "<td class=\"note\">".$row1['nota']."</td>";
                    echo "<td class=\"data\">".$row1['datant']."</td>";
                    echo "</tr>";
                }
                echo "</table></div></div>";
                echo "<div id=\"id".$cont."2\" class=\"w3-modal\">";
                echo "<div class=\"w3-modal-content w3-animate-zoom w3-card-4\" style=\"width:40%; margin:0 auto;\">";
                echo "<header><span onclick=\"document.getElementById('id".$cont."2').style.display='none'\" class=\"w3-button w3-display-topright\">&times;</span><br><br></header>";
                echo "<table class=\"w3-table-all w3-centered w3-striped w3-border w3-hoverable\" style=\"width:100%; margin:0 auto;\">";
                echo "<thead><td style=\"background: #bfbfbf\">Data</td><td class=\"danu\"><div style=\"float:left; width:50%;\"><span style=\"text-align:center\">Nemotivat</span></div><div style=\"float:right; width:50%;\"><span style=\"text-align:center\">Motivat</span></div></td></thead>";          
                
                foreach($result2 as $res2 => $row2){
                    echo "<tr>";
                    echo "<td class=\"data\">".$row2['dataab']."</td>";
                    if($row2['absenta']==1){
                        echo "<td class=\"nemotivate\">Nemotivata</td>";
                    }
                    else{
                        echo "<td class=\"motivata\">Motivata</td>";
                    }
                    echo "</tr>";
                }
//                echo "</div></div>"
//                echo "<tr><td>10000</td><td>10000</td></tr></table></div></div>";
                echo "</table></div></div>";
            }
        ?>
        
        
    </body>
</html>