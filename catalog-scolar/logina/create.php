<?php
// ini_set('display_errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(E_ALL);

include_once 'db/crud.php';
session_start(); //incepem o noua sesiune
if($_SESSION['username']==''){
      header("location:login.php");
   }
//echo $_SESSION['noua'];

// $_SESSION['message'] = ''; //mesajul pt erori

// echo $_SESSION['classa'];

//validarea

// creez o noua instanta 

// echo $_SESSION['add'];

$conn = new Crud();
// // print_r($_FILES);
// //daca a fost trimis form ul

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
        //salvam imaginiline in folderul 'img"
        $avatar_path = $conn->escape_string('img/'.$_FILES['avatar']['name']);
        // print_r($avatar_path);
        $username = $conn->escape_string($_POST['userElev']);
        // echo $username;
        $password = $conn->escape_string($_POST['passElev']);
        $clasaActuala = $clasa;
        //  echo $clasaActuala;


        #verific daca s a inserat o imagine
        if(preg_match('!image!',$_FILES['avatar']['type'])) {
               
                //copiem imaginea in folderul cu imagini
                if(copy($_FILES['avatar']['tmp_name'],$avatar_path)) {
                
                //inseram in baza de date;
                $sql = "INSERT INTO elevi (`prenume`,`nume`,`clasa`,`email`,`poza`,`userelev`,`parolaelev`) VALUES ('$prenume','$nume','$clasaActuala','$email','$avatar_path','$username','$password');";
                $sql1 = "INSERT INTO myNews (`informatie`) VALUES ('S-a adaugat in clasa a $clss - $literaa elevul $nume $prenume');";
                $result1 = $conn->execute($sql1);
                $result = $conn->execute($sql);
                if($result) {
                    header("location:cls9.php?tip=".$clss."&lit=".$literaa."");
                }
                else {
                    echo "incorect";
                }
            }
        }

 }




?>
