<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'classes/geheim.php';
require 'classes/db.php';

$keys = new keys();
$DB = new DB();

require_once('classes/auth.php');
$auth = new auth();
if(!$auth->isAuth()){
        http_response_code(401);
        header('Location: index.php');  
        die();
}

$mysqli = mysqli_connect($keys->host, $keys->user, $keys->pass);

$onderwerp = htmlspecialchars($_POST['title']);
$inhoud= htmlspecialchars($_POST['description']);
$startDatum = htmlspecialchars($_POST['startDatum']);
$eindDatum = htmlspecialchars($_POST['eindDatum']);
$prioriteit = htmlspecialchars($_POST['prioriteit']);
$status = htmlspecialchars($_POST['status']);

$titel = $DB->lineBreak($titel);
$omschrijving = $DB->lineBreak($omschrijving);

session_start();
$gebruiker = $_SESSION['ID'];

$query = "INSERT INTO crud_agenda.agenda (onderwerp, inhoud, beginDatum, eindDatum, prioriteit, status, gebruiker) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
if ($stmt === false) {
    trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
} else{
        $stmt->bind_param("ssssssi", $onderwerp, $inhoud, $startDatum, $eindDatum, $prioriteit, $status, $gebruiker);
}


if (!$mysqli) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        exit;
}
else{
        $result = $stmt->execute();
        if (!$result) {
                echo "Error: Unable to connect to insert." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                exit;
        }
        else{
                header("Location: agenda.php");
        }
}

