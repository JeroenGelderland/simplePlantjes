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
    })

