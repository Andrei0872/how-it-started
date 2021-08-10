<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'db/Crud.php';
$conn = new Crud();
    if($_SERVER['REQUEST_METHOD'] == "POST") {
                            if(isset($_POST['submit'])) {
                                $nume =$conn->escape_string($_POST['nume']);
                            }       
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
    </head>
    <body>
        <div class="w3-container w3-margin-top">
            <h2 class="w3-center">Elevii disponibili pentru datele introduse:</h2>        
            <div class="w3-responsive w3-container" style="margin:150px auto;">                
                <table class="w3-table-all w3-centered w3-striped w3-border w3-hoverable">
                    <thead>
                        <tr>
                            <td>Nume</td>
                            <td>Prenume</td>
                            <td class="w3-hide-small">Email</td>
                            <td>Clasa</td> 
                        </tr>                 
                    </thead>
                    <tbody>
                        <?php
                        //includem baza de date etc
                        // include_once 'db/Crud.php';
                        //cream o noua instanta
                        // $conn = new Crud();
                        //ce vrem sa selecta
                        
                        $query = "SELECT * FROM `elevi` where `nume` LIKE '%$nume%' OR `prenume` LIKE '%$nume%' ORDER BY `id` DESC"; //WHERE  clasa=...
                        $result = $conn->getData($query); //$result contine datele
                        // print_r($result);
                        foreach($result as $key=>$row) {
                            echo '<tr><td>';
                            echo $row['nume'];
                            echo '</td><td>';
                            echo $row['prenume'];
                            echo '</td><td class="w3-hide-small">';
                            echo $row['email'];
                            echo '</td><td>';
                            echo $row['clasa'];
                            echo '</td></tr>';
                        }
                        ?>
                    </tbody>                    
                </table>                
            </div>
        </div>
    </body>
</html>
