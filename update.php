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

// Get the JSON contents
$json = file_get_contents('php://input');
$json = json_decode($json, true);

$mysqli = mysqli_connect($keys->host, $keys->user, $keys->pass);

$titel = htmlspecialchars(htmlspecialchars_decode($json['titel']));
$omschrijving = htmlspecialchars(htmlspecialchars_decode($json['inhoud']));
$prioriteit = htmlspecialchars(htmlspecialchars_decode($json['prio']));
$status = htmlspecialchars(htmlspecialchars_decode($json['status']));
$ID = htmlspecialchars(htmlspecialchars_decode($json['ID']));
$beginDatum = htmlspecialchars(htmlspecialchars_decode($json['itemBD']));
$eindDatum = htmlspecialchars(htmlspecialchars_decode($json['itemED']));

$titel = $DB->lineBreak($titel);
$omschrijving = $DB->lineBreak($omschrijving);

$query = "UPDATE crud_agenda.agenda SET 
onderwerp = '$titel', 
inhoud = '$omschrijving',
beginDatum = '$beginDatum', 
eindDatum = '$eindDatum',
prioriteit = '$prioriteit', 
status = '$status' 
WHERE ID = '$ID'";

$query = "UPDATE crud_agenda.agenda SET onderwerp = ?, inhoud = ?, beginDatum = ?, eindDatum = ?, prioriteit = ?, status = ? WHERE ID = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ssssssi", $titel, $omschrijving, $beginDatum, $eindDatum, $prioriteit, $status, $ID);

$stmt->execute();

if (!$mysqli) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        exit;
}
else{
        $result = $stmt->execute();
        if (!$result) {
                echo "geen result" . PHP_EOL;

                echo mysqli_error($mysqli) . PHP_EOL;
                exit;
        }
        else{
                echo htmlspecialchars($titel);
        }
}

