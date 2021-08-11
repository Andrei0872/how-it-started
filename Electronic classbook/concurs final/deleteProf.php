<?php
include_once("db/crud.php");
     ini_set('display_errors',1);
 ini_set('display_startup_errors',1);
 error_reporting(E_ALL);
    $crud = new Crud();
    $nr = $crud -> escape_string($_GET['id']);
    
    echo $nr;

   $dateProf =$crud->getData("SELECT * FROM profesori where idp = $nr");
//print_r($dateProf);
    $numeProf = $dateProf[0]['nume'];
    $prenumeProf = $dateProf[0]['prenume'];
    $disciplinaProf = $dateProf[0]['disciplina'];
    
//  echo $numeProf;
//echo $disciplinaProf;
//echo $prenumeProf;

   $sql_feed = "INSERT INTO myNews (`informatie`) VALUES ('S-a sters profesorul $numeProf $prenumeProf, la disciplina $disciplinaProf');";
    
    $crud->execute($sql_feed);
    $crud -> execute("DELETE FROM `profesori` WHERE `idp` =$nr");
    

?>

<html>
    <script>
        var newUrl = "profesori.php";
        window.location.replace(newUrl);
    </script>
</html>
