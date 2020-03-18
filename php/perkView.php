<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <script src="../javascript/PlantViewModel.js" defer></script>-->
<!--    <script src="../javascript/PerkViewModel.js" defer></script>-->
<!--    <script src="../javascript/tuinScript.js" defer></script>-->
    <title>Perk</title>
</head>
<body>
    <div class="jumbotron text-center flex-center">

    <button type="button" class="btn btn-info"><a href="./tuin.php">terug</a></button>
    <h1 style="flex: 1"></h1>
    </div>
    <script>let plantjes = JSON.parse(localStorage.getItem('selected'))
            document.querySelector("h1").innerText= "perk \""+plantjes.naam+"\""
        console.log(plantjes)
        document.querySelector('.jumbotron').style.backgroundColor = "rgba("+plantjes.red+","+plantjes.green+","+plantjes.blue+",.5)"
    </script>

    <ul class="list-group container" id="plantjes">

    </ul>

    <script>
        let plantjesLijst = document.querySelector('#plantjes')

        if(plantjes.plantjes != null){
            plantjes.plantjes.forEach(plant => {
                let plantItem = document.createElement('li');
                plantItem.className = "list-group-item";
                plantItem.style.display = "flex"

                plantItem.innerHTML = "<p style='flex: 1'>"+plant.naam+"</p><button id='plant-"+plant.id+"' class='btn btn-success'>planten</button>"
                document.querySelector("#plantjes").appendChild(plantItem)
            })
        }



    </script>

</body>
</html>
