<?php
//insDoc.php

ini_set("display_errors",true);
ini_set("display_startup_errors",true);
error_reporting(E_ALL);

//includem conexiunea 
include_once 'db/database.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


//todo : obtinem datele din form(request body)
$data = json_decode(file_get_contents('php://input'));



//todo : obtinem informatiile de la furnizorul cu id ul selectat
$sql_furnizor = 'SELECT * FROM furnizoriAnd WHERE id = ?';
$stmt_furnizor =  $pdo->prepare($sql_furnizor);
$stmt_furnizor->execute([$data->idFurn]); //idFurn - il avem din requrest body

//retinem rezultatele intr o variabila
$results = $stmt_furnizor->fetchAll(PDO::FETCH_ASSOC);

//setam datele in functie de ceea ce am primit
$nume_furnizor = $results[0]['denumireFurn'];
$adresa_furnizor = $results[0]['adresaFurn'];
$cui_furnizor = $results[0]['cuiFurn'];
// echo $nume_furnizor;



//todo : extrag tipurile produselor din tabel - ne va trebuie la calcularea valorii tva
//selectam intai ultima linie, caci aceea conteaza mereu
$sql_taxe = "SELECT * FROM taxeAnd ORDER BY id DESC LIMIT 1";
$stmt_tva = $pdo->prepare($sql_taxe);
$stmt_tva->execute();

//retinem informatiile intr o variabila
$res = $stmt_tva->fetchAll(PDO::FETCH_ASSOC);

//setam datele
$tva_alimentar = $res[0]['tva_alimentar'];
$tva_nonalimentar = $res[0]['tva_nonalimentar'];
//selectam si data inserarii tva urilor
$data_inserare_tva = $res[0]['dataInserare'];



//todo : calculez valoarea tva  pentru fiecare produs.
$tva = array ();

//luam vectorul de obiecte pt fiecare produs; fiecare obj contine numele, tip ul, si adaosul
//fiecare index va avea un obiect; fiecare obiect va avea 3 proprietati
$produseArr = $data->denumiri;

//in functie de nr produselor inserate, $index poate fi : 0,1,2,3... n produse]
foreach($produseArr as $index=>$value) {
    
    //*vedem intai ce tip are 
    if($value->tip == "alimentar") {
        //daca este alimentar
        $theTva = $data->preturiTotale[$index] * $tva_alimentar/100;

    }else if($value->tip == "nonalimentar"){
        //daca NU este aliementar
        $theTva = $data->preturiTotale[$index] * $tva_nonalimentar/100;
    }

    //*adaugam in vector
    $tva [] = $theTva;

}
// echo json_encode($tva);
//! PRETURILE INAINTE DE ADAUGAREA TVA SUNT DE FAPT  "preturiTotale"



//todo : determin numarul documentului
//pentru asta, selectez din tabel "nrDocument" de la ultima linie inserata
$sst = $pdo->prepare("SELECT nrDocument FROM documenteAnd ORDER BY id DESC LIMIT 1");
$sst->execute();
$rezultate = $sst->fetchAll(PDO::FETCH_ASSOC);
// print_r($rezultate);

//*daca nu fost inserate pana acum linii, nr documentului va fi 1.
if(!@$rezultate[0]['nrDocument']) {
    $nr_doc = 1;
}else {
    //*daca deja exista documente, atunci nr documentului actual va fi egal cu cel al liniei extrase +1
    $nr_doc = $rezultate[0]['nrDocument']+1;
}
// echo $nr_doc;



/**
 * todo : inseram in tabel
 * * rationament : pentru fiecare vom insera nume,cantitate,pret, pretul inainte de tva(preturiTotale), tva ul pt acel produs, pretul dupa tva, data
 * * rationament :  atunci cand se va face pdf ul vom avea un total de preturi inainte de tva, total tva , si total preturi dupa tva
 * ? avem deja : informatiile despre furnizor, valorea tva si nr documentului
 */
//setez deja cate "procedural params " vom avea
$args = array_fill(0,13,'?');

//$sql - pt inserare
$sql = "INSERT INTO documenteAnd(
    denumireProdus,
    cantitateProdus,
    pretProdus,
    adaosProdus,
    nrDocument,
    tipProdus,
    numeFurnizor,
    adresaFurnizor,
    cuiFurnizor,
    dataInserare,
    totalInainteTVA,
    totalDupaTVA,
    valoareTVA
) VALUES (".implode(",",$args).")";

//*intai preparam intructiunea pt executie
$stmt_final = $pdo->prepare($sql);

//! NU UITA DE ADAOS

//parcugem datale pe care le am primit din request body
//am ales limita sa fie count($data->cantitati); dar putea sa fie  si count($data->denumiri) sau count($data->pret).. 
for($i = 0; $i < count($data->cantitati); $i++) {
    $data_ins = date("Y-m-d H:i:s");
    $stmt_final->execute([
        $data->denumiri[$i]->nume,
        $data->cantitati[$i],
        $data->pret[$i],
        $data->denumiri[$i]->adaos,
        $nr_doc,
        $data->denumiri[$i]->tip,
        $nume_furnizor,
        $adresa_furnizor,
        $cui_furnizor,
        $data_ins,
        $data->preturiTotale[$i],
        $data->preturiTotale[$i] + $tva[$i],
        $tva[$i] 
    ]);           
}

// echo $data->denumiri[0]->nume;
// echo json_encode($data);
echo 'inserare efectuata';

?>