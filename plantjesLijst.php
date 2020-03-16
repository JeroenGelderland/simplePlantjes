<?php
include_once('Database.php');
include_once('Plant.php');
$plantjes = Database::loadPlantjes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="plantjesLijst.js" defer></script>

    <title>Plantjes</title>
    <style>
        .pop {
            position: fixed;
            top: 40%;
            left: 0;
            right: 0;
        }
    </style>

</head>
<body>
<div class="jumbotron text-center " style="display: flex">

    <button type="button" class="btn btn-info"><a href="dashboard.html">terug</a></button>
    <h1 style="flex: 1"> plantjes</h1>

</div>


<ul class="list-group container" id="plantjes">

</ul>

<ul class="list-group container" id="zaadjes">

</ul>

<div class="jumbotron text-center pop" style="display: none">
    <div></div>
    <div>
        <form action="plantPlantje.php" method="POST">
        </form>
        <button type="button" class="btn btn-danger" id="annuleren" style="flex: 1">annuleren</button>
        <button type="button" class="btn btn-success" id="zaaien" style="flex: 1">zaaien</button>
        <button type="button" class="btn btn-warning" id="planten" style="flex: 1">planten</button>
    </div>
</div>


<div class="container">
    <a href="plantToevoegen.php">
        <button type="button" class="btn btn-primary">Plantje toevoegen</button>
    </a>
</div>
</body>
</html>