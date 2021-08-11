<?php

//includem conexiunea la baza de date
include_once './db/database.php';

//*despre 'php://input' : http://php.net/manual/ro/wrappers.php.php
//practic, 'php://input' ne permite sa citim ce am TRIMIS DIN REQUEST BODY
//$data va contine perechile key:value transmise
// $data este un obiect
$data = json_decode(file_get_contents('php://input'));

//ne conectam la basa de date
$pdo = Database::connect();

$sql = 'INSERT INTO furnizoriAnd(denumireFurn,adresaFurn,cuiFurn) VALUES(:denumire,:adresa,:cui) ';

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'denumire' => $data->denumire,
    'adresa' => $data->adresa,
    'cui' => $data->cui
]);

?>