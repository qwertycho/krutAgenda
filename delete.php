<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'classes/geheim.php';

$keys = new keys();

require_once('classes/auth.php');
$auth = new auth();
if(!$auth->isAuth()){
        http_response_code(401);
        header('Location: index.php');  
        die();
}

$ID = $_GET['ID'];

$query = "DELETE FROM crud_agenda.agenda WHERE ID = $ID";

$mysqli = mysqli_connect($keys->host, $keys->user, $keys->pass);

if (!$mysqli) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        exit;
}
else{
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
                echo "Error: Unable to connect to insert." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                exit;
        }
        else{
                echo "success";
        }
}

