<?php
include_once('./classes/Database.php')
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
    <script src="../javascript/tuinScript.js" defer></script>
    <title>Tuin</title>
</head>
<body>
<div class="jumbotron text-center flex-center" >

<button type="button" class="btn btn-info"><a href="../dashboard.html">terug</a></button>
<h1 style="flex: 1"> Tuin</h1>
</div>
<div>
    <div class="flex-center">
        <div class="tuin img-container">
            <img src="../scr/img/dirty.jpg">
        </div>
    </div>
<br>
    <div class="container">
        <a href="createPerk.php">
            <button type="button" class="btn btn-primary">Perk toevoegen</button>
        </a>
    </div>
</div>
</body>
</html>