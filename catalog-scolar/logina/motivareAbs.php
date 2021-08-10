<?php

// ini_set("display_errors",1);
// ini_set("display_startup_errors",1);
// error_reporting(E_ALL);



//includem conexinuea la baza de date
include_once 'db/crud.php';

//cream o noua instanta
$conn = new Crud();

//luam id ul elevului
$id = $_GET['id'];
// echo $id;



//daca sunt setate toate, inseamna ca s a intentionat motivarea absentei, adica dblclick pe "X"
//prin urmare, se va urma procedeul de motivare,trimitere email, inserare in news feed
//daca functia "fetch_data()" este apelata fara parametri, inseamna ca se intentioneaza afisarea tabel. cand se incarca pagina
if(isset($_POST['numeMaterie']) && isset($_POST['este_motivata']) && isset($_POST['nrData'])) {



//disciplina
$disc = $_POST['numeMaterie'];
// echo $disc;

//daca este motivata sau nu
$este_motivata = $_POST['este_motivata'];
// echo $este_motivata;



$indexAbs = $_POST['nrData'];
// echo $indexAbs;


//luam informatiile elevului pt news feed si email
$sqlElev = "SELECT nume,prenume,clasa,email FROM elevi WHERE id=$id";
$result1 = $conn->getData($sqlElev);
$nume = $result1[0]['nume']; 
$prenume = $result1[0]['prenume'];
$clasaTemp = $result1[0]['clasa'];
if(@$clasaTemp[2]) { 
     $nrClasei = $clasaTemp[0].$clasaTemp[1];
     $literaClasei = $clasaTemp[2];
}else {
    $nrClasei = $clasaTemp[0];
    $literaClasei = $clasaTemp[1];    
}

//obtinem data din care se va motiva sau nu absenta
$sql_data = "SELECT * FROM absente WHERE elev=$id AND disciplina='$disc'";
$rez = $conn->getData($sql_data);
// print_r($rez);
$dataAbs = $rez[$indexAbs]['dataab'];
$dataUpd = $dataAbs;
// echo $dataUpd . "\n";
$dataAbs = date("F jS, Y",strtotime($dataAbs));
// echo ($dataAbs);


//email ul parintelui elevui
$email = $result1[0]['email'];
// echo $email;
// echo $email;

//vedem daca este motivata sau nu
if($este_motivata == 1) { //daca este motivata
    //pt email pt anuntarea fatpului ca s a motivat absenta
    $body = "<p>Elevului <b>$nume $prenume</b> i  s-a motivat absenta la disciplina $disc, din data de $dataAbs.<p>";
    //sql pt news feed
    $sql_feed = "INSERT INTO myNews (`informatie`) VALUES ('S-a motivat absenta din data de $dataAbs elevului $nume $prenume, clasa a $nrClasei-a $literaClasei, la disciplina $disc.');";
    $sql = "UPDATE absente SET absenta=2 WHERE elev=$id AND disciplina = '$disc' AND dataab='$dataUpd'";
} else if($este_motivata== 0) { //daca nu este motivata, inseamna ca a absenta in tabel este motivata si trebuie s o facem nemotivata
    $sql = "UPDATE absente SET absenta=1 WHERE elev=$id AND disciplina = '$disc'  AND dataab='$dataUpd'";
}
$conn->execute($sql); //se motiveaza sau nu absenta..
// echo $sql;
 



if($este_motivata == 1) { //daca absenta s -a motivat

$conn->execute($sql_feed); //se adauga in news feed
//tritem email

//subiectul email ului
$subiect = "Absenta Motivata!";

//includem clasa cu mail ul
include('mail/phpmailer/mail.php');

//cream o noua instanta
@$mail = new Mail();

//catre cine trimitem email
$mail->addAddress($email); //$email ul parintelui

//de la cine trimitem email
$mail->setFrom('learn1@linndows.com');

//subiectul email ului
$mail->subject($subiect);

//mesajul subiectului
$mail->body($body);

//facem formatul mesajului sa fie HTML
$mail->isHTML(true);

//trimitem email ul
$mail->send();
}
}



//chiar daca are parametri sau nu, rezultatul acestei functii  va fi sa afisez tabelele

//variabila in care se vor tine tabelele generate
$output = '';

$cont = 0;
$suma = 0;
$medie = 0;
$nrmedii=0;
$mediegen = 0;
$totalabsente = 0;
$materii = 0;

//luam materiile
$resultn = $conn -> getData("SELECT * FROM note WHERE elev =$id GROUP BY disciplina");
$j = 0; //nr materii
foreach($resultn as $resn=>$rown) {
    
    //crestem nr de materii
    $materii++;

    //incepem sa afisam butoanele care vor forma un acordeon
    //butonul ce contine id ul dinamic pt fiecare materie
    $output .= '<button style=\'background:#3ea5e8; color:white; border-bottom:1px solid lightgrey\' data-acc=\'Demo'.$materii.'\' class=\'disc w3-btn w3-block w3-left-align\'>' . $rown['disciplina'] . '</button>';
    //container ul ce va contine inf despre materia curenta
    //notele
    $output .='<div id=\'Demo'.$materii.'\' class=\' w3-hide\' style=\'background:white;\'><table class=\'w3-card-4\' style=\'width:100%;color:black;font-size:20px;\' >
        <tr>
            <td>Note</td>
            <td  class=\'afisat w3-container\'>';
    $suma = 0;
    $medie = 0;
    $nrnote = 0;
    $teza = 0;
    $materie = $rown['disciplina'];   

    //luam notele de la materia despectiva
    $result1 = $conn ->getData("SELECT * FROM note WHERE disciplina='$materie' AND `elev`=$id");
    foreach($result1 as $res1 => $row1){
        if($row1['teza']==0 && $row1['nota']!=""){
        $output .= '<span style=\'margin: 0 2.5%;\' class=\'hide-option\' title=\''.$row1['datant'].'\'>'.$row1['nota'].'</span>';
        $suma = $suma + $row1['nota'];
        $nrnote++;
        }
    }
    if ($result1!=NULL && $nrnote!=0)$medie = $suma/$nrnote;
    $result2 = $conn ->getData("SELECT * FROM note WHERE disciplina='$materie' AND `elev`=$id AND `teza`=1 LIMIT 1");
    foreach($result2 as $res2 => $row2){
        $output .= '<span style=\'margin: 0 2.5%; color:crimson;\' class=\'hide-option\' title=\''.$row2['datant'].'\'>'.$row2['nota'].'</span>';
        $teza = $row2['nota'];
    }
    $output .='</td><td>';
    if ($result1!=NULL && $nrnote!=0){
    if($teza==0)
        $output .= '<div style=\'float:right\'>Medie:'.round($medie).'</div>';
    else {
        $medie = ($medie*3+$teza)/4;
        $output .= '<div style=\'float:right\'>Medie:'.round($medie).'</div>';
    }
    $nrmedii++;
    }
    else{
        $output .= '<div style=\'float:right\'>Medie: -</div>';
    }
    $mediegen = $mediegen + $medie;

    $output .= '</td>';
    $output .= '</tr>';


    //absentele
    $output .= '<tr>';
    $output .= '<td>Absente</td>';
    $output .= '<td class=\'afisat\' style=\'padding-left:75px;\'>';
    $absente = 0;
    $materie = $rown['disciplina'];
    $result3 = $conn ->getData("SELECT * FROM absente WHERE disciplina='$materie' AND `elev`=$id");
    $abs =0; //a cata absenta va fi
    foreach($result3 as $res3 => $row3){
        $absente++;
        $output .= '<span style=\'margin: 0 2.5%;\' class=\'hide-option\' title=\''.$row3['dataab'].'\'>';
        if($row3['absenta']==1) $output .= '<span class=\'absenta\' data-inff=\''.$j.'\' data-abs=\''.$abs.'\'>&nbsp;X&nbsp;</span>';
        else {$output .= '<span class=\'absentaMotivata absenta\' data-inff=\''.$j.'\' data-abs=\''.$abs.'\' style=\'margin: 0 2.5%; border:1px solid red; border-radius:50%;\'>&nbsp;X&nbsp;</span>'; /*$output .= "\t"*/;$absente--;}
        $output .= '</span>';
        $abs++; //determinam "index ul" pt notele ce vor urma
    }
    $output .= '</td><td><div style=\'float:right\'>Nr. Absente:'.$absente.'</div>';
    $totalabsente = $totalabsente +$absente;

    $output .= '</td>';
    $output .= '</tr>';
    $output .= '</table></div>';
    $j++;
}
if($nrmedii == 0) $output = '<p style=\'font-size:20px;color:white;text-align:center;\'>Momentan,acest elev nu are nicio nota.</p>';
echo $output;
if($nrmedii != 0)
echo'<script>document.getElementById("vali").innerHTML = " Numarul de absente: '.$totalabsente.'&nbsp;&nbsp;&nbsp; Media generala: '.number_format($mediegen/$nrmedii,2,'.', ' ').'"; </script>'
?>