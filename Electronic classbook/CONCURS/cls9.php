 
<!-- niste mici incercari  -->
<!-- //  include_once 'db/Crud.php';

  //cream o noua instanta
//  $conn = new Crud();
 
//$tip = $conn->escape_string($_GET['tip']);
//  echo $tip. 'da'; -->
<?php
// CE MAI TREBUIE FACUT : aceasta pagina sa fie una singura, si in functie de clasa aleasa de administrator, sa generez tabel cu elevii din acea clasa (fara a afisa clasa)
include_once 'db/Crud.php';
session_start();
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Elevi</title>
</head>
<body>
    
  

    <div class="w3-container w3-margin-top">
    <h2 class="w3-center">Elevii disponibili pentru clasa a <?php echo $tip; ?>-a <?php echo $litera; ?></h2>
        
    <div class="w3-container w3-left w3-margin-top">
        <a href="create.php" class="w3-btn w3-green  w3-hover-ligth-green w3-round-xxlarge">Adauga Elevi</a>
    </div>
        <div class="w3-responsive w3-container" style="margin:150px auto;">
                
            <table class="w3-table-all w3-centered w3-striped w3-border w3-hoverable">
                <thead>
                    <tr>
                        <td>Nume</td>
                        <td>Prenume</td>
                        <td>Email</td>
                        <td>Clasa</td>
                        <td>User</td>
                        <td>Parole</td>  
                        <td style="width:30%;">Actiune</td>
                    </tr>
                 
                </thead>
                <tbody>
                    <?php

                    //includem baza de date etc
                    // include_once 'db/Crud.php';
                    //cream o noua instanta
                    // $conn = new Crud();
                    //ce vrem sa selectam
                    $query = "SELECT * FROM elevi WHERE clasa = $proba ORDER BY id DESC"; //WHERE clasa=...
                    $result = $conn->getData($query); //$result contine datele
                    // print_r($result);
                    foreach($result as $key=>$row) {
                        echo '<tr><td style="vertical-align:middle;">';
                        echo $row['nume'];
                        echo '</td><td style="vertical-align:middle;">';
                        echo $row['prenume'];
                        echo '</td><td style="vertical-align:middle;">';
                        echo $row['email'];
                        echo '</td><td style="vertical-align:middle;">';
                        echo $row['clasa'];
                        echo '</td><td style="vertical-align:middle;">';
                        echo $row['userelev'];
                        echo '</td><td style="vertical-align:middle;">';
                        echo $row['parolaelev'];
                        echo '</td><td>'; #acum urmeaza butoanele
                        //butonul de read
                        echo '<a href=\'read.php?id='.$row['id'].'\' class=\'w3-button w3-large w3-blue w3-round-xlarge\'>
                        <span>Despre Elev</span>        
                        </a>&nbsp;&nbsp';
                        //butonul de uptdate
                        echo '<a href=\'update.php?id='.$row['id'].'\' class=\'w3-button w3-large w3-green w3-round-xlarge\' >
                        <span>Note</span>
                        </a>&nbsp;&nbsp;';
                        echo '<a href=\'update.php?id='.$row['id'].'\' class=\'w3-button w3-large w3-hover-red w3-red w3-round-xlarge\' >
                        <span>Delete</span>
                        </a>&nbsp;&nbsp;';
                    }
                    ?>
                </tbody>
               
            </table>
            
        </div>

            <div class="w3-container">
    <a href="w3csadmin.php" class="w3-right w3-btn w3-round-large w3-green">Inapoi la pagina principala <i  class="fa fa-angle-double-left"></i></a>
    
</div>
    </div>

</body>
</html>
