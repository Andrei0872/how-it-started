<?php
//fetch_taxe.php

include_once 'db/database.php';
$pdo = Database::connect();

//vectorul in care vom memora liniile
$output = array();

$sql = "SELECT * FROM taxeAnd ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//adaugam in vector liniile
foreach($results  as $row) {
    //inseram in vector
    $output [] = $row;
}

//la final, afisam vectorul sub format JSON, pt a putea fi primit de catre angular 

echo json_encode($output);


?>