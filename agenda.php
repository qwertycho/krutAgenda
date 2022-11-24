<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// eigen troep
require 'classes/geheim.php';
require 'classes/items.php';
require 'classes/html.php';
require 'classes/db.php';
require_once('classes/auth.php');

// eigen troep iniatialiseren
$keys = new keys();
$item = new Item();
$DB = new DB();
$auth = new auth();

if(!$auth->isAuth()){
        http_response_code(401);
        header('Location: index.php');  
        die();
}


try {
        if (isset($_GET['order'])) {
                $selectie = $_GET['order'];
                $query = $DB->checkOrder($selectie, $_SESSION['ID']);
        } else {
                $query = $DB->checkOrder('#', $_SESSION['ID']);
        }
}
catch(Exception $e){

}



$mysqli = mysqli_connect($keys->host, $keys->user, $keys->pass);

if (!$mysqli) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        exit;
}
else{
        $result = mysqli_query($mysqli, $query[0]);
        if (!$result) {
                echo "Error: Unable to connect to insert." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                exit;
        }
}

                // head
                echo $head;
                echo $orderSelect;

                // body
                echo "<div class='container'>";

                echo $newItem;

                $item->showPosts($result, $_SESSION['ID']);    

                echo "</div>";

                echo $oldItems;

                $result = mysqli_query($mysqli, $query[1]);
                $item->showPosts($result, $_SESSION['ID']);   

                echo "</div>";