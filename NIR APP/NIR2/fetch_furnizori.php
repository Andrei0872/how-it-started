<?php
 //fetch_furnizori.php
// pt a descoperi erori
// ini_set("display_errors",true);
// ini_set("display_startup_errors",true);
// error_reporting(E_ALL);

//realizam conexiunea
include_once 'db/database.php';
$pdo = Database::connect();
//setam sa primim datele sub forma de associative arrays
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
//setam sa apara erori
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


//unde vom stoca datele extrase din tabel
//acest "$output" va fi afisat sub forma de JSON, pt a fi preluat cum se cuvine 
$output = array();

$sql = "SELECT * FROM furnizoriAnd ORDER BY id ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

//folosim fetchAll() pt a obtine toate liniile
$results = $stmt->fetchAll();

//parcurgem cu un foreach resultatele($results) si adaugam in $output
//inseram fiecare linie in $output
foreach($results as $row) {
    $output [] = $row;
}

//la final, afisam sub forma de json, vectorul ce contine liniile
echo json_encode($output);
?>