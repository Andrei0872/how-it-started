<?php

//includem conexiunea la baza de date
include_once 'db/database.php';
$pdo = Database::connect();


// todo : obtinem liniile din tabel
//selectam  nr de documente, cate produse are un document,data si numele furnizorului
$sql = 'SELECT COUNT(id) AS nrProduse, nrDocument, dataInserare, numeFurnizor FROM documenteAnd GROUP BY nrDocument ORDER BY nrDocument ASC';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//vectorul in care vom retine liniile din tabel
$output = array ();

foreach ($results as $row) {
    //adaugam in vector
    $output [] = $row;
}

//afisam vectorul sub forma de JSON pt a putea fi preluat de $http
echo json_encode($output);
?>