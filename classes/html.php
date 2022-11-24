<?php

    $head = "<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel='stylesheet' href='css/style.css'>
    <script src='js/script.js' defer></script>
    <title>Agenda</title>
    </head>";

    $newItem = "
    <form action='insert.php' method='post' class='item newItem'>
        <div class='itemContainer'>
            <div class='dataContainer'>
                <input type='text' name='title' placeholder='titel'>
            </div>
            <div class='dataContainer'>
                <textarea name='description' placeholder='omschrijving'>
                </textarea>
            </div>
            <div class='dataContainer'>
                <label>startdatum</label><input type='date' name='startDatum' class='date'>
            </div>
            <div class='dataContainer'>
                <label>einddatum</label><input type='date' name='eindDatum' class='date'>
            </div>
            <div class='dataContainer'>
                <label>prioriteit</label><select name='prioriteit'>
                    <option value='1'>Laag</option>
                    <option value='2'>Gemiddeld</option>
                    <option value='3'>Hoog</option>
                </select>
            </div>
            <div class='dataContainer'>
                <label>status</label><select name='status'>
                    <option value='a'>Open</option>
                    <option value='b'>In behandeling</option>
                    <option value='n'>Afgerond</option>
                </select>
            </div>
            <input type='submit' value='submit'>
        </div>
    </form>
    ";

    $orderSelect = "
    <div class='orderSelect'>
        <label>Sorteer op:</label>
        <select name='order' id='order'>
            <option value='#'>Creatie</option>
            <option value='prioriteit'>Prioriteit</option>
            <option value='status'>Status</option>
            <option value='datum'>Einddatum</option>
        </select>
    </div>
    ";

    $oldItems = "
    <div class='oldItems container'>
    <h2>oude items</h2>
    ";
