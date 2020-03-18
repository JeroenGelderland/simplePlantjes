<?php
require_once('./classes/Perk.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $perk = new Perk();

    $perk->naam = $_POST['naam'];

    $perk->red = $_POST['red'];
    $perk->green = $_POST['green'];
    $perk->blue = $_POST['blue'];

    $perk->startX = $_POST['start-x'];
    $perk->startY = $_POST['start-y'];
    $perk->endX = $_POST['end-x'];
    $perk->endY = $_POST['end-y'];

    $perk->save();
    header("Location: tuin.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../javascript/PerkViewModel.js" defer></script>
    <script src="../javascript/drawPerk.js" defer></script>
    <script src="../javascript/tuinScript.js" defer></script>



    <title>Perk toevoegen</title>
</head>
<body>
<div class="jumbotron text-center flex-center">

    <button type="button" class="btn btn-info"><a href="./tuin.php">terug</a></button>
    <h1 style="flex: 1"> Tuin</h1>
</div>
<form method="post" action="createPerk.php" class="container">
    <section id="namePerk" class="container">
        <div class="form-group">
            <label>perk naam</label>
            <input class="form-control" type="text" name="naam" required>
        </div>
        <div class="form-group">
            <label>perk kleur</label>

            <div class="flex-center">
                <div class="color-display">

                </div>
            </div>

            <div class="flex-center">
                <label style="margin-right: 5px">R</label>
                <input type="range" class="form-control-range" name="red" id="red" value="0"
                       max="255">
            </div>
            <div class="flex-center">
                <label style="margin-right: 5px">G</label>
                <input type="range" class="form-control-range" name="green" id="green" value="0" max="255">
            </div>
            <div class="flex-center">
                <label style="margin-right: 5px">B</label>
                <input type="range" class="form-control-range" name="blue" id="blue" value="0" max="255">
            </div>
        </div>

    </section>

    <section id="drawPerk">

        <div class="flex-center">
            <input type="range" class="form-control-range horizontal" name="start-x" id="start-x" value="0" max="100">
        </div>

        <div class="flex-center">
            <input type="range" class="form-control-range vertical" name="start-y" id="start-y" value="100" max="100">

            <div class="tuin img-container">
                <img src="../scr/img/dirty.jpg">
                <div class="perk"></div>
            </div>

            <input type="range" class="form-control-range vertical" name="end-y" id="end-y" value="100" max="100">
        </div>

        <div class="flex-center">
            <input type="range" class="form-control-range horizontal" name="end-x" id="end-x" value="100" max="100">
        </div>

        </div>
        <div class="flex-center container" style="margin-bottom: 10px">
            <input class="btn btn-primary" type="submit" value="toevoegen">
        </div>
    </section>
</form>
</body>
</html>