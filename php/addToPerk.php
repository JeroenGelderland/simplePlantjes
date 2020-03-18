<?php
include_once('classes/Database.php');

$str_json = file_get_contents("php://input");
$plantAction = json_decode($str_json);
echo $str_json;

if(isset($plantAction)){
    foreach ($plantAction->toPlant as $plant){
        $sql = sprintf("UPDATE `plant` SET `perk` = %u WHERE id=%u;", (int)$plantAction->perk, (int)$plant);
        echo $sql;
        Database::runInsert($sql);
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="../javascript/addToPerk.js" defer></script>
    <script src="../javascript/PerkViewModel.js" defer></script>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Plantjes</title>
</head>
<body>
<div class="jumbotron text-center flex-center" >

    <button type="button" class="btn btn-info"><a href="plantjesLijst.php">terug</a></button>
    <h1 style="flex: 1">plant in perk</h1>
</div>

<ul class="list-group container" id="plantjes">

</ul>

<div class="flex-center">
    <div class="tuin img-container">
        <img src="../scr/img/dirty.jpg">
    </div>
</div>

<br>

<div class="container">
        <button type="button" class="btn btn-success">Plantjes planten</button>
</div>
<br>

</body>
</html>