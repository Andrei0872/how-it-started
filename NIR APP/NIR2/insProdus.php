<?php
//insProdus.php

//includem conexiunea si realizam conexiunea
include_once 'db/database.php';
$pdo = Database::connect();

//obtinem informatiile din input
$data = json_decode(file_get_contents("php://input"));

//*modificarea  pt decimal la valoareaAdaos
// $pdo->prepare("ALTER TABLE produsUnitar MODIFY COLUMN valoareAdaos DECIMAL(10,2)")->execute();

$sql = "INSERT INTO produsUnitar(nume,tip,valoareAdaos) VALUES(:nume,:tip,:valoare)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'nume' => $data->nume,
    'tip' => $data->tip,
    'valoare' => $data->adaos
]);

echo 'inserare efectuata cu succes';

?>