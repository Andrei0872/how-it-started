<?php
// error_reporting(E_PARSE); //doar parse errors vor fi afisate
session_start();

if($_SESSION['username']==''){
      header("location:login.php");
   }
$idElev = $_SESSION['idElev']; //luam id ul elevului

include_once 'db/crud.php';
$conn = new Crud();

$numeMaterie = $conn->escape_string($_POST['numeMaterie']); //luam numele materiei

//$materii = $_POST['materii']; //materia

$dati = $_POST['dati'];

$elev = $conn->getData("SELECT * FROM elevi WHERE id=$idElev");

$ok = 0;


$nume = ucfirst($elev[0]['nume']);
$prenume  = ucfirst($elev[0]['prenume']);


//echo $dati;

$clasaTemp = $elev[0]['clasa'];

    if($clasaTemp[2]) {
        $nrClasei = $clasaTemp[0].$clasaTemp[1];
        $literaClasei = $clasaTemp[2];
    }else {
        $nrClasei = $clasaTemp[0];
        $literaClasei = $clasaTemp[1];
    }

// echo $literaClasei;

$sql = "INSERT INTO absente(`disciplina`,`absenta`,`dataab`,`elev`) VALUES ('$numeMaterie','1','$dati','$idElev');";
// $sqle = "INSERT INTO note(`disciplina`,`nota`,`datant`,`elev`) VALUES ('$numeMaterie','','$dati','$idElev');";

$res = $conn->execute($sql);
// $res = $conn->execute($sqle);

//facem data sa aiba un format mai frumos
$dataHuman = date("F jS, Y",strtotime($dati));

$sql1 = "INSERT INTO myNews(`informatie`) VALUES('S-a inserat o absenta elevului $nume $prenume, clasa a $nrClasei-a $literaClasei,  la disciplina $numeMaterie , in data de $dataHuman.')";

$res1 = $conn->execute($sql1);

if($res1 && $res) {
    //trimitem email parintelui 

    //subiectul email ului
    $subiect = "O noua absenta pentru elevul ".$nume." ".$prenume."!";

    //mesajul email ului 
    $body ="<p>Elevul ".$nume." ".$prenume." <span style='color:red;'>nu a fost prezent</span> la ora de ".$numeMaterie. " in data de <b>".$dataHuman. "</b>.</p>";

    //includem clasa de email
    include('mail/phpmailer/mail.php'); //la randul lui, fisierul  mail.php va include fisierul "phpmailer.php" 

    //creeam o noua instanta pt a putea trimite email
    $mail = new Mail();

    //cui ii trimitem email (email ul parintelui elevului in discutie)
    $mail->addAddress('andreigtj01@gmail.com');

    //de la cine primeste email
    $mail->setFrom('learn1@linndows.com');

    //atasam subiectul
    $mail->subject($subiect);

    //atasam mesajul
    $mail->body($body);

    //folosim optiunea de a trimite mesaj sub forma de html
    $mail->isHTML(true);

    //trimitem email ul
    $mail->send();
}



?>
