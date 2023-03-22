let checkbox = document.getElementById('flexCheckDefault')
let endyear = document.getElementById('endyear')

checkbox.addEventListener('click', (event) => {
    let button = event.target
    if (button.checked) {
        endyear.disabled = true;
    } else {
        endyear.disabled = false;
    }
});