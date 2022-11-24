<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// eigen troep
require 'classes/geheim.php';
require 'classes/items.php';
require 'classes/html.php';
require 'classes/db.php';

// eigen troep iniatialiseren
$keys = new keys();
$DB = new DB();

$mysqli = mysqli_connect($keys->host, $keys->user, $keys->pass);

$gebruikersnaam = $_POST['username'];
$wachtwoordUnsafe = $_POST['password'];
$wachtwoord = hash('sha1', $wachtwoordUnsafe);

$query = "SELECT * FROM crud_agenda.gebruikers WHERE gebruikersNaam = '$gebruikersnaam' AND `wachtwoord` = '$wachtwoord'";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION['username'] = $gebruikersnaam;
    $_SESSION['password'] = $wachtwoord;
    $row = mysqli_fetch_assoc($result);
    $_SESSION['ID'] = $row['ID'];
    header('Location: agenda.php');
} else {
    header('Location: verkeerd.php?error=verkeerde login');
}