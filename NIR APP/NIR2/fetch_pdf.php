<?php
// ini_set("display_errors",true);
// ini_set("display_startup_errors",true);
// error_reporting(E_ALL);

//obtinem datele din request body
$data = json_decode(file_get_contents('php://input'));

 //includem conexiunea la baza de date
include_once 'db/database.php';
$pdo = Database::connect();

//pentru erori
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//todo : iau valorile tva curente pt a afisa si asta in pdf 
$sql_taxe = 'SELECT * FROM taxeAnd ORDER BY id DESC LIMIT 1';
$stmt_taxe = $pdo->prepare($sql_taxe);
$stmt_taxe->execute();
//luam ultima linie din tabelul de taxe - caci aceea este cea valabila
$taxe = $stmt_taxe->fetchAll(PDO::FETCH_ASSOC);




//todo : selectam produsele din documentul curent si formam un pdf adecvat
$sql = "SELECT * FROM documenteAnd WHERE nrDocument = ? ORDER BY id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$data->nrDoc]);

//obtinem datale sub forma de assoc array
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//variabile in care tinem textul care se va afla in pdf
$output = '';


//* furnizorul este acelasi pt toate produsele din documentul curent.



//todo : va trebui sa calculam si preturile toatale fara tva, valoarea tva totala, pretul cu tva, si tot adaos si totalul CU TOATE
//preturi totale
$fara_tva =0;
$valoare_tva;
$cu_tva= 0;
$total_adaos = 0;
$total= 0;


//setam intai partea care NU este dinamica
$output .=
 '<div>
    <h3>Documentul Nr.'.$data->nrDoc.'</h3> <br>
        <div style=\'float:left;\'>
        <p><b>Nume Furnizor:</b>'.$results[0]['numeFurnizor'].'</p>
        <p><b>Adresa Furnizor:</b>'.$results[0]['adresaFurnizor'].'</p>
        <p><b>CUI Furnizor:</b>'.$results[0]['cuiFurnizor'].'</p>
        </div><div style=\'float:right;\'>
        <p><b>Valoare TVA pentru produse <span style=\'color:red;\'>alimentare</span>:<b>'.$taxe[0]['tva_alimentar'].'%</p>
        <p><b>Valoare TVA pentru produse <span style=\'color:red;\'>non-alimentare</span>:<b>'.$taxe[0]['tva_nonalimentar'].'%</p>
        <p><b>Data valabilitatii TVA-urilor :</b>'.$taxe[0]['dataInserare'].'</p>
        </div><div style=\'clear:both;\'></div>
        <div class=\'table-responsive\'>
        <table border=\'1\' cellpadding=\'5\'>
            <thead>
                <tr>
                    <th>Denumire Produs</th>
                    <th>Cantitate Produs</th>
                    <th>Pret Produs</th>
                    <th>Adaos Produs</th>
                    <th>Tip Produs</th>
                    <th>Data Inserare</th>
                    <th>Pret fara TVA</th>
                    <th>Valoare TVA</th>
                    <th>Pret cu TVA</th>
                </tr>
            </thead>
<tbody>';

//*partea dinamica
// parcurgem vectorul de linii si generam tabelul
foreach ($results as $row) {
    
    //total pentru preturile fara tvb
    $fara_tva += (floatval)($row['totalInainteTVA']);

    //totalul valorilor cu tva
    $valoare_tva += floatval($row['valoareTVA']);

    //totalul preturilor cu tva
    $cu_tva +=floatval($row['totalDupaTVA']);

    //totalul adaos urilor
    $total_adaos +=floatval($row['adaosProdus']);

    
    $output .=
    '<tr>
        <td>'.$row['denumireProdus'].'</td>
        <td>'.$row['cantitateProdus'].'</td>
        <td>'.$row['pretProdus'].' lei</td>
        <td>'.$row['adaosProdus'].' lei</td>
        <td>'.$row['tipProdus'].'</td>
        <td>'.$row['dataInserare'].'</td>
        <td>'.$row['totalInainteTVA'].' lei</td>
        <td>'.$row['valoareTVA'].' lei</td>
        <td>'.$row['totalDupaTVA'].' lei</td>
    </tr>';

}

//valoarea totala se poate calcula dupa ce s au calculat toate celelate
$total = $total_adaos + $cu_tva;

//inchidem ce a ramas
$output .='</tbody></table></div> <br><hr><br><div class=\'table-responsive\' style=\'margin-left:20%;\'>
    <table border=\'1\' cellpadding=\'4\'>
        <thead>
            <tr>
                <th>Pret Total <span style=\'color:red;\'>(fara TVA)</span></th>
                <th>Valoare Totala TVA</th>
                <th>Pret Total <span style=\'color:red;\'>(cu TVA)</span></th>
                <th>Adaos Total</th>
                <th><b>Total</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>'.$fara_tva.' lei</td>
                <td>'.$valoare_tva.' lei</td>
                <td>'.$cu_tva.' lei</td>
                <td>'.$total_adaos.' lei</td>
                <td>'.$total.' lei</td>
            </tr>
        </tbody>
    </table></div>
</div>';


//*CREAREA PDF
//includem autoloader ul din dompdf
require_once 'dompdf/autoload.inc.php';

//folosim namespace ul din DOMPDF (namespace = un set de clase si functii)
use Dompdf\Dompdf;

//creez o noua instanta
$dompdf = new Dompdf();

//incarcam html
$dompdf->loadHtml($output);

//setam dimensiunile paginii
$dompdf->setPaper('A4','landscape');

//render html ca pdf
$dompdf->render();

//afisam pdf ul generat
$dompdf->stream("andrei",array("Attachment"=>0));

?>