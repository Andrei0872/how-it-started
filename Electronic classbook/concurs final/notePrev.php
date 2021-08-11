<?php
session_start();
include_once 'db/crud.php';
$conn = new Crud();
$idElev = $_SESSION['idElev'];
$numeMaterie = $conn->escape_string($_POST['numeMaterie']);
$materii = $_POST['materii'];
$dati = $_POST['dati'];
$informatiiTeza = $_POST['informatiiTeza'];
$ok =0;
$exista_teza = 0;

print_r($dati);

?>