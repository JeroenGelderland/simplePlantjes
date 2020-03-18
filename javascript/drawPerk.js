const colDisplay = document.querySelector('.color-display')
const red = document.querySelector("#red")
const green = document.querySelector("#green")
const blue = document.querySelector("#blue")
const node = document.querySelector('.perk')


const OPACITY = .7;

updateDisplay()

red.addEventListener('input', () => {
    updateDisplay()
})

green.addEventListener('input', () => {
    updateDisplay()
})

blue.addEventListener('input', () => {
    updateDisplay()
})

function updateDisplay(){
    let color = "rgba("+red.value+","+green.value+","+blue.value+","+OPACITY+")"
    node.style.background = color
    colDisplay.style.background = color
}

const START_X = document.querySelector('#start-x')
const START_Y = document.querySelector('#start-y')
const END_X = document.querySelector('#end-x')
const END_Y = document.querySelector('#end-y')

node.style.left  = START_X.value + "%"
node.style.top = 100 - START_Y.value + "%"
node.style.right = 100 - END_X.value + "%"
node.style.bottom = END_Y.value + "%"


START_X.addEventListener('input', () => {
    node.style.left  = START_X.value + "%"
})

START_Y.addEventListener('input', () => {
    node.style.top = 100 - START_Y.value + "%"
})

END_X.addEventListener('input', () => {
    node.style.right = 100 - END_X.value + "%"
})

END_Y.addEventListener('input', () => {
    node.style.bottom = END_Y.value + "%"
})