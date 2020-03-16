let selected = null;

class PlantViewModel {

    constructor(json) {
        this.json = json;
        this.seed = json.zaad == 1;
        if(this.seed){
            this.naam = json.naam + " zaad"
        }
        else{
            this.naam = json.naam;
        }
        this.checked;
        this.show()
    }

    show() {

        let plantItem = document.createElement('li');
        plantItem.className = "list-group-item";
        plantItem.style.display = "flex"

        if(this.seed){
            plantItem.innerHTML = "<p style='flex: 1'>"+this.naam+"</p><button id='plant-"+this.json.id+"' class='btn btn-success'>zaaien</button>"
            document.querySelector("#zaadjes").appendChild(plantItem)
        }
        else{
            plantItem.innerHTML = "<p style='flex: 1'>"+this.naam+"</p><button id='plant-"+this.json.id+"' class='btn btn-success'>planten</button>"
            document.querySelector("#plantjes").appendChild(plantItem)
        }

        document.querySelector('#plant-'+this.json.id).addEventListener('click', () => {
            if(!this.seed){
                document.querySelector('#zaaien').style.display = "none"
            }
            else{
                document.querySelector('#zaaien').style.display = "inline"
            }
            let pop = document.querySelector(".pop")
            selected = this;
            pop.style.display = "block";
        })
    }
}

fetch("./plantjesJson.php")
    .then((response) => {
        return response.json()
    })
    .then((data) => {
        let plantjes = [];
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
    input.value = selected.json.id;
    input.name = "id";
    let form = document.querySelector('form')
    console.log("test")
    form.appendChild(input)
    form.submit()
})

document.querySelector('#planten').addEventListener('click', () => {
    selected.place();
})

document.querySelector('#annuleren').addEventListener('click', () => {
    selected = null;
    let pop = document.querySelector(".pop")
    pop.style.display = "none";

})

// let plantjes;
// fetch('./plantjesJson.php')
//     .then((response) => {
//         return response.json()
//     })
//     .then((data) => {plantjes = data
//
//         let zaadjesLijst = document.querySelector("#zaadjes")
//
//         zaadjesLijst.style.display = "none";
//
//         let duplicates = []
//         plantjes.forEach(plant => {
//             let zaad = '';
//             let button = '';
//

//
//             if(plant.zaad == 1){
//                 zaad = "zaad"
//                 button = "<button id='plant-nr-"+plant.id+"' type='button' class='btn btn-success btn-plant'>planten</button>"
//                 plantItem.innerHTML = "<p style='flex: 1'>"+plant.naam+" "+zaad+"</p>"+button
//
//                 zaadjesLijst.appendChild(plantItem)
//
//                 document.querySelector('#plant-nr-'+plant.id).addEventListener('click', () => {
//
//                 })
//             }
//             else{
//                 button = "<button id='plant-nr-"+plant.id+"' type='button' class='btn btn-success btn-plant'>plaatsen</button>"
//                 plantItem.innerHTML = "<p style='flex: 1'>"+plant.naam+" "+zaad+"</p>"+button
//
//                 plantjesLijst.appendChild(plantItem)
//             }
//         })
//
//     })
//
// document.querySelector("#switch").addEventListener('click', () => {
//     if(    document.querySelector("#switch").innerHTML == "zaadjes"){
//         document.querySelector("#switch").innerHTML = "plantjes"
//         document.querySelector("h1").innerText = "plantjes"
//         document.querySelector("#plantjes").style.display = "block"
//         document.querySelector("#zaadjes").style.display = "none"
//
//     }
//     else {
//         document.querySelector("#switch").innerHTML = "zaadjes"
//         document.querySelector("h1").innerText = "zaadjes"
//         document.querySelector("#plantjes").style.display = "none"
//         document.querySelector("#zaadjes").style.display = "block"
//     }
// })
//
// function  contains(list, item) {
//     let result = false;
//     list.forEach(i => {
//         if(i.naam == item.naam){
//             result = true;
//         }
//     })
//     return result;
//
// }