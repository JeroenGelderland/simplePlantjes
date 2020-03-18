<?php
require_once('plantToevoegen.php');
require_once('./classes/Plant.php');


const SEED_AGE = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $plant = new Plant();

    if(isset($_POST["zaad"])){
        $plant->zaad = "true";
        $plant->kiemDatum = 0;
    }
    else{
        $plant->zaad = "false";
        $plant->kiemDatum = strtotime((string)($_POST["leeftijd"]*-1). " week");
    }
    $plant->naam = $_POST["naam"];
    $plant->groeitijd = $_POST["groeitijd"];
    $plant->waterFreq = $_POST["waterFreq"];
    $plant->waterBehoefte = $_POST["waterbehoefte"];
    $plant->voedingsFreq = $_POST["voedingsFreq"];

    $plant->save();
    header("Location: plantjesLijst.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plant toevoegen</title>
</head>
<body>
<div class="jumbotron text-center" style="display: flex">
   <button type="button" class="btn btn-info margin"> <a href="plantjesLijst.php">terug</a></button>
    <h1 style="flex: 1"> plantje toevoegen</h1>
</div>
<form method="POST" action="plantToevoegen.php" class="container">

    <div class="form-group">
        <input type="checkbox" name="zaad" id="zaad">
        <label for="zaad">Dit is zaad</label>

    </div>

    <div class="form-group">
        <label>naam</label>
        <input class="form-control" type="text" name="naam" required>
    </div>

    <div class="form-group" id="leeftijd">
        <label>leeftijd in weken</label>
        <input class="form-control" type="number" name="leeftijd">
    </div>

    <script>
        document.querySelector("#zaad").addEventListener('click', e => {

            if (document.querySelector("#zaad").checked){
                document.querySelector("#leeftijd").style.display = "none"
            }
            else{
                document.querySelector("#leeftijd").style.display = "block"
            }
        })
    </script>

    <div class="form-group">
        <label>groeitijd in dagen</label>
        <input class="form-control" type="number" name="groeitijd" required>
    </div>

    <div class="form-group">
        <label>water frequentie om de x dagen</label>
        <input class="form-control" type="number" name="waterFreq" required>
    </div>

    <div class="form-group">
        <label>waterbehoefte</label>
        <input type="radio" id="veel" name="waterbehoefte" value="veel" required>
        <label for="veel">veel</label>
        <input type="radio" id="weinig" name="waterbehoefte" value="weinig" required>
        <label for="weinig">weinig</label>
    </div>

    <div class="form-group">
        <label>voedings frequentie om de x dagen</label>
        <input class="form-control" type="number" name="voedingsFreq" required>
    </div>

    <div>
        <input class="btn btn-primary" type="submit" value="toevoegen">
    </div>
</form>
</body>
</html>