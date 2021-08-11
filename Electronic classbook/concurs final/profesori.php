<?php

include_once 'db/crud.php';

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
    
    
    <div class="w3-container w3-margin w3-padding">
        
        <div class="w3-container w3-left w3-margin">
            <a href="createProf.php" class="w3-right w3-padding w3-btn w3-round-large w3-green">Adauga Profesori</a>
        </div>
        <div class="w3-clear"></div>
        <div class="w3-container">
            <div class="w3-responsive">
                <table class="w3-table-all">
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
                            echo '<td class="w3-center">';
                            echo $row['nume'];
                            echo '</td><td class="w3-center">';
                            echo $row['prenume'];
                            echo '</td><td class="w3-center">';
                            echo $row['email'];
                            echo '</td><td class="w3-center">';
                            echo $row['disciplina'];
                            echo '</td><td class="w3-center">';
                            echo '<a  href="deleteProf.php?id='.$row['idp'].'" class="w3-btn w3-red w3-round-xlarge">&times</a>';
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
    
    
</body>
</html>