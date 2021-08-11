<?php

session_start();

$idElev = $_SESSION['idElev']; //luam id ul elevului

include_once 'db/crud.php';
$conn = new Crud();

$numeMaterie = $conn->escape_string($_POST['numeMaterie']); //luam numele materiei

//$materii = $_POST['materii']; //materia

$dati = $_POST['dati'];

$elev = $conn->getData("SELECT * FROM elevi WHERE id=$idElev");

$ok = 0;


$nume = $elev[0]['nume'];
$prenume  = $elev[0]['prenume'];


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

$res = $conn->execute($sql);

 $sql1 = "INSERT INTO myNews(`informatie`) VALUES('S-a inserat o absenta elevului $nume $prenume, clasa a $nrClasei-a $literaClasei,  la disciplina $numeMaterie ')";

$res1 = $conn->execute($sql1);

if($res1 && $res) echo 'ok';
else echo 'nu';

//if($ok == 1 ) {
//
//    $sqlElev = "SELECT nume,prenume,clasa FROM elevi WHERE id=$idElev";
//    
//    $result1 = $conn->getData($sqlElev);
//
//    $nume = $result1[0]['nume'];
//    $prenume = $result1[0]['prenume'];
//    $clasaTemp = $result1[0]['clasa'];
//
//    if($clasaTemp[2]) {
//        $nrClasei = $clasaTemp[0].$clasaTemp[1];
//        $literaClasei = $clasaTemp[2];
//    }else {
//        $nrClasei = $clasaTemp[0];
//        $literaClasei = $clasTemp[1];
//    }
//
//
//    if(count($materii)>1) {
//        $nrAbs = count($materii);
//        $sql1 = "INSERT INTO myNews(`informatie`) VALUES('S-au inserat $nrAbs absente elevului $nume $prenume, clasa a $nrClasei-a $literaClasei, la disciplina $numeMaterie ')";
//    }
//    else {
//        $sql1 = "INSERT INTO myNews(`informatie`) VALUES('S-a inserat o absenta elevului $nume $prenume, clasa a $nrClasei-a $literaClasei, la disciplina $numeMaterie ')";
//    }
//
//    if($conn->execute($sql1)) {
//        echo "Inserare efectuata cu succes";
//    }
//
//} else {
//    echo "Ceva nu a mers bine!";
//}

?>