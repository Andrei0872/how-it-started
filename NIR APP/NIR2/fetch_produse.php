<?php
//fetch_produse.php

include_once 'db/database.php';
$pdo = Database::connect();

//vectorul in care vom retine liniile dorite
$output = array();

$sql = "SELECT * FROM produsUnitar ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//inseram in vector liniile dorite
foreach($results as $row) {
    $output [] = $row;
}

//afisam sub forma de JSON pt a fi "inteles" de angular
echo json_encode($output);



?>