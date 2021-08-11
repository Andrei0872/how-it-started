<?php
// ini_set('display_errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(E_ALL);

include_once 'db/crud.php';
session_start(); //incepem o noua sesiune

//echo $_SESSION['noua'];

// $_SESSION['message'] = ''; //mesajul pt erori

// echo $_SESSION['classa'];

//validarea

// creez o noua instanta 

// echo $_SESSION['add'];

$conn = new Crud();
// print_r($_FILES);
//daca a fost trimis form ul

$clss = $_SESSION['classa'];
$literaa = $_SESSION['clsLitera'];

//echo $clss;
//echo $literaa;

 if($_SERVER['REQUEST_METHOD'] == "POST") {
     //luam datele pe care le vom insera in baza de date
        // print_r($_FILES);
        $nume = $conn->escape_string($_POST['nume']);
        $prenume = $conn->escape_string($_POST['prenume']);
        $email = $conn->escape_string($_POST['email']);
        // echo $email;
        $clasa = $conn->escape_string($_POST['clasa']);
        // echo $clasa;
        //$_FILES este superglobala care se ocupa cu stocarea fisierelor;
        //salvam imaginiline in folderul 'images"
        $avatar_path = $conn->escape_string('images/'.$_FILES['avatar']['name']);
        // print_r($avatar_path);
        $username = $conn->escape_string($_POST['userElev']);
        // echo $username;
        $password = $conn->escape_string($_POST['passElev']);
        $clasaActuala = $clasa;
        //  echo $clasaActuala;

        #verific daca s a inserat o imagine

        if(preg_match('!image!',$_FILES['avatar']['type'])) {
                //copiem imaginea in folder
            // if(copy($_FILES['avatar']['tmp_name'],$avatar_path)) {
                //inseram in baza de date;
                $sql = "INSERT INTO elevi (`prenume`,`nume`,`clasa`,`email`,`poza`,`userelev`,`parolaelev`) VALUES ('$prenume','$nume','$clasaActuala','$email','$avatar_path','$username','$password');";
                $sql1 = "INSERT INTO myNews (`informatie`) VALUES ('S-a adagat in clasa a $clss - $literaa elevul $nume $prenume');";
                $result1 = $conn->execute($sql1);
                $result = $conn->execute($sql);
                if($result) {
                    echo "correct";
                }
                else {
                    echo "incorrect";
                }
            // }
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
    <title>Adaugare Elevi</title>
    <style>
    
        .files {
            position: relative;
            border-radius: 10px;
            padding: 5px;
        }

    .files label {
        border-radius: 10px;
        background: green;
        padding: 5px 20px;
        color: #fff;
        font-weight: bold;
        font-size: .9em; /* 0.9 * current font */
        transition: all .4s;
    }
    /* selectam input file  */
    .files input {
        position: absolute; /*absolut la PARINTELE div cu clasa .file*/
        display: inline-block; /*ca sa fie pe aceeasi linie cu textul*/
        left: 0;
        top: 0;
        opacity: 0.01;
        cursor: pointer;
    }
    /* cand dam hover sau cand butonul este selectat */
    .files input:hover + label,
.files input:focus + label {
  background: whitesmoke;
  color: green;
}

    </style>
</head>
<body>
     
    <div class="w3-container">

   <form  enctype="multipart/form-data" action="create.php?clasa='9'" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-green w3-margin">
   <h2 class="w3-center w3-margin-top"> Adaugati elevi pentru clasa a <?php echo $_SESSION['classa']; ?> -a <?php echo $_SESSION['clsLitera']; ?></h2>
 
   <!-- Prenumele -->
<div class="w3-row w3-section">
  <!-- <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div> -->
    <div class="w3-rest">
      <input class="w3-input w3-border" name="prenume" type="text" placeholder="Prenume" required>
    </div>
</div>

<!-- numele -->
<div class="w3-row w3-section">
  <!-- <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div> -->
    <div class="w3-rest">
      <input class="w3-input w3-border" name="nume" type="text" placeholder="Nume" required>
    </div>
</div>

<!-- email -->
 <!-- w3-section - centered content and fixed size -->
<div class="w3-row w3-section">
  <!-- <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div> -->
    <div class="w3-rest">
      <input class="w3-input w3-border" name="email" type="text" placeholder="Email" required>
    </div>
</div>


<!-- clasa -->
<div class="w3-row w3-section">
  <!-- <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div> -->
    <div class="w3-rest">
      <input class="w3-input w3-border" name="clasa" type="hidden" value="<?php echo $_SESSION['add']; ?>">
    </div>
</div>


<!-- imaginea elevului  -->
<div class="w3-row w3-section">
  <!-- <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div> -->
    <div class="w3-rest files">
        <input type="file" id="thefile" name="avatar" >
        <label for="thefile">Poza elevului</label>
    </div>
</div>

<!-- user name ul elevului  -->
<div class="w3-row w3-section">
    <div class="w3-rest">
        <input type="text" class="w3-input w3-border" name="userElev" placeholder="User Name" required>
    </div>
</div>

<!-- parola elevului  -->
<div class="w3-row w3-section">
    <div class="w3-rest">
        <input type="text" class="w3-input w3-border" name="passElev" placeholder="Parola Elevului" required>
    </div>
</div>


<!-- butonul de submit -->
<button type="submit" class="w3-button w3-block w3-section w3-green w3-ripple w3-padding" style="border-radius:10px;">Trimite</button>

</form>


    </div>

 
    <div class="w3-container w3-right">
        
            <a href="cls9.php?tip=<?php echo $_SESSION['classa']; ?>&lit=<?php echo $_SESSION['clsLitera']; ?>" class="w3-btn w3-right w3-green w3-round-xxlarge"> Pagina Precedenta </a>
       
        <div class="w3-rest w3-margin"></div>   
        <br>
       
        
            <a href="index.php" class="w3-btn w3-right w3-blue w3-round-xxlarge"> Pagina Principala </a>
        
    </div>
    
</body>
</html>
