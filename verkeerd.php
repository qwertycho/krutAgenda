<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verkeerde login</title>
    <link rel='stylesheet' href='css/style.css'>
    <style>
        a{
            width: 100%;
            text-align: center;
            display: block;
            color: white;
            font-weight: bolder;
        }
        h1{
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>
        <?php
            if(isset($_GET['error'])){
                    echo $_GET['error'];
            } else {
                    echo "Er is iets fout gegaan";
            }
        ?>
    </h1>
    <a href="index.php">Home</a>
</body>
</html>