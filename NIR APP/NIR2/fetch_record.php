<?php
//fetch_record.php
//todo : aici luam cati furnizori sunt, cate documente si produse sunt, si care factura cu plata cea mai mare

//includem conexiunea
include_once 'db/database.php';
$pdo = Database::connect();

//* tinem intr un vector toate informatiile pentru fetch
$final = array();

// todo : caut factura cu suma cea mai mare
$sql = 'SELECT SUM(pretProdus) AS SumaProduse, SUM(adaosProdus) AS SumaAdaos, SUM(totalInainteTVA) AS totalInainteTva, SUM(valoareTVA) AS valoareTVA, SUM(totalDupaTVA) AS totalDupaTVA ,nrDocument FROM documenteAnd GROUP BY nrDocument';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = array ();

foreach ($res as $row) {
    $output [] = $row;
} 

//* determin documentul a carui factura este cea mai "scumpa"
//iau un maxim pentru inceput
$max = -32000; 

$max = -32000;
foreach($output as $index=>$row) {
    $total = $row['totalDupaTVA'] + @$row['SumaAdaos'];
    if($total >= $max) {
        $doc = $row['nrDocument'];
        $max = $total;
    }
}

//adaugam in vectorul principal
$final [] = array("valoareFactura" =>$max,  "nrDoc" => $doc );




// todo : iau nr produsele
$sql_produse = "SELECT COUNT(id) AS NR FROM produsUnitar";
$stmt_produse = $pdo->prepare($sql_produse);
$stmt_produse->execute();

$produse = $stmt_produse->fetchAll(PDO::FETCH_ASSOC);
$nrProduse = $produse[0]['NR'];
// echo $nrProduse;
//*adaug in vectorul final nr de produse
$final [] = array("nrProduse" => $nrProduse);



//todo : iau nr de furnizori
$sql_furnizori = "SELECT COUNT(id) AS NR FROM furnizoriAnd";
$stmt_furnizori = $pdo->prepare($sql_furnizori);
$stmt_furnizori->execute();

$furnizori = $stmt_furnizori->fetchAll(PDO::FETCH_ASSOC);
$nrfurnizori = $furnizori[0]['NR'];

//*adaug in vectorul final nr de furnizori
$final [] = array("nrFurnizori" => $nrfurnizori);



//todo : iau nr de documente
$sql_documente = "SELECT COUNT(*) FROM documenteAnd GROUP BY nrDocument";
$stmt_documente = $pdo->prepare($sql_documente);
$stmt_documente->execute();

$documente = $stmt_documente->fetchAll(PDO::FETCH_ASSOC);


//*adaug in vectorul final nr de documente
$final [] = array("nrDocumente" => count($documente));


echo json_encode($final);

?>