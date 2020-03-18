class PerkViewModel {

    constructor(perk) {
        this.id = perk.id;
        this.naam = perk.naam;
        this.color = "rgba(" + perk.red + "," + perk.green + "," + perk.blue + ",0.5)";
        this.start_X = perk.startX;
        this.start_Y = perk.startY;
        this.end_X = perk.endX;
        this.end_Y = perk.endY;
        this.json = perk;
    }

    show(){
        let node = document.createElement("div");
        node.className = "perk";
        node.style.left  = this.start_X + "%"
        node.style.top = 100 - this.start_Y + "%"
        node.style.right = 100 - this.end_X + "%"
        node.style.bottom = this.end_Y + "%"
        node.style.background = this.color;
        node.id = this.id;

        node.addEventListener('click', () => {
            if(window.location.toString().includes("tuin.php")){
                localStorage.setItem('selected', JSON.stringify(this.json))
                window.location = "../php/perkView.php"
            }
        })
        document.querySelector('.tuin').appendChild(node);

    }
}
