
let plantjes = [];

fetch("../api/plantjesJson.php")
    .then((response) => {
        return response.json()
    })
    .then((data) => {
        data.forEach(plant => {
            plantjes.push(new PlantViewModel(plant))
        })
    })


function showAllSeeds() {
    //     document.querySelector("#plantjes").style.display = "none"
//         document.querySelector("#zaadjes").style.display = "block"
}

document.querySelector('#zaaien').addEventListener('click', () => {
    let input = document.createElement("input")
    input.type = "number"
    input.value = PlantViewModel.selected.json.id;
    input.name = "id";
    let form = document.querySelector('form')
    console.log("test")
    form.appendChild(input)
    form.action = '../php/plantPlantje.php'
    form.submit()
})

document.querySelector('#planten').addEventListener('click', () => {
    let json = {"plantjes" : []}
    plantjes.forEach(p => {
        json.plantjes.push(p.json)
    })

    localStorage.setItem("omTePlanten", JSON.stringify(json))
    window.location = "../php/addToPerk.php"

})

document.querySelector('#annuleren').addEventListener('click', () => {
    PlantViewModel.selected = null;
    let pop = document.querySelector(".pop")
    pop.style.display = "none";

})

