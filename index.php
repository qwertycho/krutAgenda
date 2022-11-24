<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// eigen troep
require_once('classes/geheim.php');
require 'classes/items.php';
require 'classes/html.php';
require 'classes/db.php';
require_once('classes/auth.php');

// eigen troep iniatialiseren
$keys = new keys();
$DB = new DB();

$mysqli = mysqli_connect($keys->host, $keys->user, $keys->pass);

$query = "SELECT * FROM crud_agenda.gebruikers";
$result = mysqli_query($mysqli, $query);
    // head
    echo "
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <link rel='stylesheet' href='css/style.css'>
        <link rel='stylesheet' href='css/index.css'>
        <title>Welkom bij krut agenda</title>
    </head>
    ";

    echo "
        <h1 class='mainTitel'>Welkom bij krut agenda!</h1>
    ";

    echo "<div class='loginContainer item'>";
        echo "
        <form class='login' action='login.php' method='post'>
            <label class='titel'>Inloggen</label>
            <input type='text' name='username' placeholder='Username'>
            <input type='password' name='password' placeholder='Password'>
            <input type='submit' name='submit' value='Login'>
        </form>
        ";

        echo "
        <form class='login' action='signup.php' method='post'>
        <label class='titel'>Nieuwe gebruiker</label>
            <input type='text' name='username' placeholder='Username'>
            <input type='password' name='password' placeholder='Password'>
            <input type='submit' name='submit' value='Aanmelden'>
        </form>
        ";
    echo "</div>";


