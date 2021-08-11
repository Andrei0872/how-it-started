<?php
include_once 'db/database.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

ini_set("display_errors",true);
ini_set("display_startup_errors",true);
error_reporting(E_ALL);

//obtinem inf din input
$data = json_decode(file_get_contents('php://input'));

$sql = 'INSERT INTO taxeAnd(tva_alimentar,tva_nonalimentar,dataInserare)
    VALUES(:alimentar,:nonAlimentar,:dataCurenta);
';

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'alimentar' => $data->tva_alimentar,
    'nonAlimentar' => $data->tva_nonAlimentar,
    'dataCurenta' => date('Y-m-d H:i:s')
]);

echo 'inserare reusita';


?>