<?php

//prevenim accesul unui user nelogat
session_start();
if($_SESSION['username']==''){
      header("location:login.php");
   }

include_once 'db/crud.php';
$conn= new Crud();

//luam clasa in discutie
$cls = $_SESSION['clsSiLitera'];


//obtin cati elevi sunt
$sql = "SELECT COUNT(*) FROM elevi WHERE clasa = $cls";
$result = $conn->getData($sql);
$nr_linii = $result[0]['COUNT(*)'];
// echo $nr_linii;



$elevi_pe_pagina = 5; // vrem sa fie 5 elevi dispusi pe pagina


//pagina curenta
$pagina ='';

if(isset($_POST['page'])) {
    // daca a fost setata, inseamna ca se cere o anumita pagina 
    $pagina = $_POST['page'];
}else {
    //cand nu se specifica nr paginii ca parametru (cand vrem sa incarce automat rezulatele pe pag), $pagina va avea val 1
    $pagina = 1; //$pagina ne trebuie pt a determina de la care index sa plece furnizarea informatiilor
}

//determinam care este pagina de inceput pt a seta limita pt SQL STATEMENT
$inceput_pag = ($pagina-1)*$elevi_pe_pagina;
//$inceput-pag -> de la care index incepe selectarea. este $inceput_pag+1
// echo $inceput_pag; 

//aici vom insera tabelul si tot ce se cere
$output ='';



//intai afisam tabelul normal, iar abia dupa paginatia
$sql_elevi = "SELECT * FROM elevi WHERE clasa =$cls ORDER BY id DESC LIMIT $inceput_pag, $elevi_pe_pagina";
$result_elevi = $conn->getData($sql_elevi);
// print_r($result_elevi);

//cream tabelul
$output .='<table class=\'w3-table-all\'>
    <thead>
        <tr>
            <td>Nume</td>
            <td>Prenume</td>
            <td>Email</td>
            <td>Clasa</td>
            <td>User</td>
            <td>Parole</td>
            <td style=\'width:30%;\'>Optiuni</td>
        </tr>
    </thead>
    <tbody>
    ';

//adaugam dinamic informatiile (liniile de tabel)
foreach ($result_elevi as $key=>$row) {
    $output .= '
        <tr>
            <td style=\'vertical-align:middle;\'>'.$row['nume'].'</td>
            <td style=\'vertical-align:middle;\'>'.$row['prenume'].'</td>
            <td style=\'vertical-align:middle;\'>'.$row['email'].'</td>
            <td style=\'vertical-align:middle;\'>'.$row['clasa'].'</td>
            <td style=\'vertical-align:middle;\'>'.$row['userelev'].'</td>
            <td style=\'vertical-align:middle;\'>'.$row['parolaelev'].'</td>
            <td>
                <a href=\'read.php?id='.$row['id'].'\' class=\'w3-button w3-large w3-blue w3-round-xlarge resp\'>
                    <span>Despre Elev </span>
                </a>&nbsp;&nbsp;
                <a href=\'update.php?id='.$row['id'].'\' class=\'w3-button w3-large w3-green w3-round-xlarge resp\'>
                    <span>Note</span>
                </a>&nbsp;&nbsp;
                <a href=\'updateAbs.php?id='.$row['id'].'\' class=\'w3-button w3-large w3-red w3-round-xlarge resp\'>
                    <span>Absente</span>
                </a>&nbsp;&nbsp;
             </td>
        </tr>
             ';
}

//inchidem celelalte tag uri
$output .= '</tbody></table><div class=\'w3-container w3-margin-top\'  align=\'center\'>';



//adaugam paginatia

//determinam cate pagini ne trebuie
$nr_total_pagini = ceil($nr_linii/$elevi_pe_pagina);
// echo $nr_total_pagini;

//afisam paginile

//fiecare span va contine un nr care va repr nr paginii. fiecare span va avea un id dinamic, asta pt a determina, atunci cand dam click, despre ce pagina este vorba
for($i=1;$i<=$nr_total_pagini;$i++) {
    
    //adaugam "butoanele" ce vor contine nr paginilor
    //id - id ul dinamic pt a reapela functia care genereaza informatiile in functie de pagina sugerata de ID
    //evidentiem care este pagina selectata
    if($i == $pagina)  $output .='<span style=\'padding:6px;cursor:pointer;\' class=\'w3-button w3-green\' id="'.$i.'">'.$i.'</span>';
    else
    $output .='<span style=\'padding:6px;cursor:pointer;\' class=\'w3-button button_pagina\' id="'.$i.'">'.$i.'</span>';
}

//inchidem div ul
$output .='</div>';

echo $output;

?>