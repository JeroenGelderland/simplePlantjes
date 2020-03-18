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
            PlantViewModel.selected = this;
            pop.style.display = "block";
        })
    }
}