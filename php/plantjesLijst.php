<?php
include_once('./classes/Database.php');
include_once('./classes/Plant.php');
$plantjes = Database::loadPlantjes();
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
    <script src="../javascript/PlantViewModel.js" defer></script>
    <script src="../javascript/plantjesLijst.js" defer></script>

    <title>Plantjes</title>
</head>
<body>
<div class="jumbotron text-center flex-center" >

    <button type="button" class="btn btn-info"><a href="../dashboard.html">terug</a></button>
    <h1 style="flex: 1"> plantjes</h1>

</div>


<ul class="list-group container" id="plantjes">

</ul>

<ul class="list-group container" id="zaadjes">

</ul>

<div class="jumbotron text-center pop" style="display: none">
    <div></div>
    <div>
        <form method="POST">
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