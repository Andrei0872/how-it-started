<?php
session_start();
if($_SESSION['username']==''){
      header("location:login.php");
   }
include_once  'db/crud.php';
$conn = new Crud();


if($_SERVER['REQUEST_METHOD'] == "POST") { //daca metoda trimiterii catre aceasta pagina a fost  "post"
    
    $nume = ucfirst($conn->escape_string($_POST['nume'])); //nume prof
    $prenume = ucfirst($conn->escape_string($_POST['prenume'])); //prenume prof
    $email = $conn->escape_string($_POST['email']); //email prof
    $disciplina = $conn->escape_string($_POST['disciplina']); // disicplina prof 


    $sql = "INSERT INTO profesori (`prenume`,`nume`,`disciplina`,`email`) VALUES ('$prenume','$nume','$disciplina','$email');";
    
    // inseram in baza de date inforamtiile profesorului
    if($conn->execute($sql)) {
        $sql_feed = "INSERT INTO myNews (`informatie`) VALUES ('S-a adagat profesorul $nume $prenume, la disciplina $disciplina');";
        $conn->execute($sql_feed);
        //trimitem adminul la pagina cu profesorii
        header("location:profesori.php");
    }

    
}

?>
