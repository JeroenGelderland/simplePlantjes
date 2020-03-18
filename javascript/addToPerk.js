plantjes = JSON.parse(localStorage.getItem("omTePlanten"))
console.log(plantjes)

let plantjesLijst = document.querySelector('#plantjes')
let plantAction = {
    toPlant : [],
    perk : null}

if (plantjes.plantjes != null) {
    plantjes.plantjes.forEach(plant => {
        let plantItem = document.createElement('li');
        plantItem.className = "list-group-item";
        plantItem.style.display = "flex"

        plantItem.innerHTML = "<p style='flex: 1'>" + plant.naam + "</p><input id='p" + plant.id + "' type='checkbox'></input>"
        document.querySelector("#plantjes").appendChild(plantItem)
        document.querySelector("#p" + plant.id).addEventListener('change', () => {
            if (document.querySelector("#p" + plant.id).checked) {
                plantAction.toPlant.push(plant.id)
            } else {
                plantAction.toPlant.splice(plantAction.toPlant.indexOf(plant.id), 1)
            }
        })
    })
}

fetch("../api/perkJson.php")
    .then((response) => {
        console.log(response)
        return response.json()
    })
    .then((data) => {
        let perks = [];
        data.forEach(perk => {
            perks.push(new PerkViewModel(perk))
        })

        perks.forEach(perk => perk.show())

        document.querySelectorAll('.perk').forEach(perk => {
            perk.addEventListener('click', () => {
                plantAction.perk = perk.id;
                document.querySelectorAll('.perk').forEach(p => {
                    p.style.borderWidth = "1px"
                    p.style.borderStyle = "dotted"
                })
                perk.style.borderStyle = "solid"
                perk.style.borderWidth = "3px";

            })
        })
    })


document.querySelector('.btn-success').addEventListener('click', () => {

    if(plantAction.perk != null){
        const json_string = JSON.stringify(plantAction);
        const request = new XMLHttpRequest();
        request.open("POST", "receive.php");
        request.setRequestHeader("Content-Type", "application/json");
        request.send(json_string)

    }

})


