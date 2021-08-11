<?php
include_once  'db/crud.php';
$conn = new Crud();


if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $nume = ucfirst($conn->escape_string($_POST['nume']));
    $prenume = ucfirst($conn->escape_string($_POST['prenume']));
    $email = $conn->escape_string($_POST['email']);
    $disciplina = $conn->escape_string($_POST['disciplina']);

    $sql = "INSERT INTO profesori (`prenume`,`nume`,`disciplina`,`email`) VALUES ('$prenume','$nume','$disciplina','$email');";
    
    if($conn->execute($sql)) {
        $sql_feed = "INSERT INTO myNews (`informatie`) VALUES ('S-a adagat profesorul $nume $prenume, la disciplina $disciplina');";
        $conn->execute($sql_feed);
    }
    else echo 'nu';
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adaugare Profesori</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
    
      
<div class="w3-container">
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
            
<!--            butonul de submit form -->
       <button type="submit" id="submitBtn" class="w3-btn w3-block w3-section w3-teal w3-ripple w3-padding" style="border-radius:10px;">Trimite</button>
        
        </form>
        <div class="w3-container w3-right w3-margin">
            <a href="profesori.php" class="w3-btn w3-round-xlarge w3-green w3-ripple">Inapoi</a>
        </div>
</div>
</body>
</html>