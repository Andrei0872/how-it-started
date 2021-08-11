<?php
//*fetchForUpdate.php
// todo : obtinem pentru partea de update, scopul fiind de a furniza user ului datele deja existente, el/ea urmand sa modifice sau nu 
//todo : obtinem si ultimele valori ale tva ului

//includem conexiunea la baza de date
include_once 'db/database.php';
$pdo = Database::connect();

//todo : obtinem datele deja existente
//luam data transmisa din request body
$data = json_decode(file_get_contents('php://input'));
// echo $data->nrDoc;
//liniile (impreuna cu toate coloanele) 
$sql = "SELECT * FROM documenteAnd WHERE nrDocument=:nr_doc ORDER BY id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'nr_doc' => $data->nrDoc
]);
//obtinem liniile
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//*punem liniile intr un vector, pt a putea folosi ulterior informatiile in update.php
//luam un vector ce va tine aceste linii
$output = array();

//parcurgem liniile primite si le adaugam in vector
foreach($results as $row) {
    $output [] = $row;
}



//todo : obtin ultimele valori ale tva ului
$sql_tva = "SELECT * FROM taxeAnd ORDER BY id DESC LIMIT 1";
$stmt_tva = $pdo->prepare($sql_tva);
$stmt_tva->execute();
$taxe = $stmt_tva->fetchAll(PDO::FETCH_ASSOC);
//obtinem valorile
$tva_alimentar = $taxe[0]['tva_alimentar'];
$tva_nonalimentar = $taxe[0]['tva_nonalimentar'];

//vom adauga in $ouput si aceste informatii despre tva
// $output [] = array("alimentar" => $tva_alimentar, "nonalimentar" => $tva_nonalimentar);

//* o sa avem un vector in care vom tine totul.
$final = array();

//adaugam intai informatiile despre tva
$final [] = array("alimentar" => $tva_alimentar, "nonalimentar" => $tva_nonalimentar);

//apoi vectorul ce contine informatiile despre documentul curent
$final [] = array( "doc" => $output);

//*afisam vectorul sub  forma de JSON pt a putea fi prelua de $http
echo json_encode($final);



?>