<?php
session_start();
include_once 'db/crud.php';
$conn = new Crud();
$idElev = $_SESSION['idElev'];
$numeMaterie = $conn->escape_string($_POST['numeMaterie']);
$materii = $_POST['materii'];
$dati = $_POST['dati'];
$informatiiTeza = $_POST['informatiiTeza'];
$ok =0;
$exista_teza = 0;

print_r($dati);

for($i = 0 ; $i < count($materii); $i++) {
    $tempMaterii = $conn->escape_string($materii[$i]);
//    echo $tempMaterii;
    $tempDati = $conn->escape_string($dati[$i]);
//    echo $tempDati;
    $tempTeza = $conn->escape_string($informatiiTeza[$i]);
//    echo $tempTeza;
    if($tempTeza == "nu") { 
    $sql  ="INSERT INTO `note`(`disciplina`,`nota`,`datant`,`elev`) VALUES('$numeMaterie','$tempMaterii','$tempDati','$idElev')";
    }
    else {
        $exista_teza = 1;
        $nota_teza = $tempMaterii;
//        echo $nota_teza;
        $sql ="INSERT INTO `note`(`disciplina`,`nota`,`datant`,`elev`,`teza`) VALUES('$numeMaterie','$tempMaterii','$tempDati','$idElev',$exista_teza);";
    }
    if($conn->execute($sql)) {
        $ok=1;
    } else {
        $ok=0;
        break;
    }
}
echo $ok;

if($ok==1) {
    $sqlElev = "SELECT nume,prenume,clasa FROM elevi WHERE id=$idElev";
    $result1 = $conn->getData($sqlElev);
    $nume = $result1[0]['nume']; 
    $prenume = $result1[0]['prenume'];
    $clasaTemp = $result1[0]['clasa'];
    if($clasaTemp[2]) { 
         $nrClasei = $clasaTemp[0].$clasaTemp[1];
         $literaClasei = $clasaTemp[2];
    }else {
        $nrClasei = $clasaTemp[0];
        $literaClasei = $clasaTemp[1];    
    }
    if(count($materii)>1) {
        $doi =''; for($j=0;$j<count($materii); $j++) {
            if($informatiiTeza[$j] == "da") continue;
            else if($j==count($materii)-1) $doi .= $materii[$j]. " "; 
          else  $doi .= $materii[$j]. ', ';
        }
        if($exista_teza == 1)
        $sql1 = "INSERT INTO myNews (`informatie`) VALUES ('S-au inserat notele $doi si teza $nota_teza elevului  $nume $prenume, clasa a $nrClasei-a $literaClasei, la disciplina $numeMaterie');";
    
    else $sql1 = "INSERT INTO myNews (`informatie`) VALUES ('S-au inserat notele $doi elevului  $nume $prenume, clasa a $nrClasei-a $literaClasei, la disciplina $numeMaterie');";
    
    }
    else {
        if($exista_teza == 1)
        $sql1 = "INSERT INTO myNews (`informatie`) VALUES ('S-a inserat nota din teza , $nota_teza , elevului $nume $prenume, clasa a $nrClasei-a $literaClasei, la disciplina $numeMaterie');";
        else  $sql1 = "INSERT INTO myNews (`informatie`) VALUES ('S-a inserat nota $materii[0] elevului $nume $prenume, clasa a $nrClasei-a $literaClasei, la disciplina $numeMaterie');";
        }
    if($conn->execute($sql1)) {
//        echo "S a adaugat in newsFeed";

    }else {
//        echo "Nu s a adaugat in newsFeed";
    }
}else {
//    echo "Ceva nu a mers bine!";
}

?>