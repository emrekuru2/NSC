// Variables
const searchForm = document.getElementById('search-form')
const searchBar = document.getElementById('search')
const searchBarButton = document.getElementById('search-bar-button')


// Listeners
searchBarButton.addEventListener('click', () => {
    if (searchBar.value !== '') searchForm.submit()
})


// Functions
function autoComplete(input, array) {
    let currentFocus;

    input.addEventListener("input", function() {
        let list, item, val = this.value
        closeAllLists()
        if (!val) return false

        currentFocus = -1

        list = document.createElement("div")
        list.setAttribute("id", this.id + "autocomplete-list")
        list.setAttribute("class", "autocomplete-items")
        this.parentNode.appendChild(list)

        for (let i = 0; i < array.length; i++) {
            // Checking if input matches values in array
            if (array[i].substring(0, val.length).toUpperCase() === val.toUpperCase()) {
                // Create a div element for each matching element
                item = document.createElement("div")
                item.innerHTML = "<strong>" + array[i].substring(0, val.length) + "</strong>" // Bold matching letters
                item.innerHTML += array[i].substring(val.length)
                item.innerHTML += "<input type='hidden' value='" + array[i] + "'>" // Input field to hold array value

                // When user clicks on autofill option
                item.addEventListener("click", function() {
                    if (item.innerText !== "No results found") {
                        input.value = this.getElementsByTagName("input")[0].value; // Inserting array value into search bar
                        closeAllLists()
                        //searchForm.submit()
                    }
                })
                list.appendChild(item)
            }

            if (i === array.length - 1 && list.childNodes.length === 0) {
                // Create a div element for each matching element
                item = document.createElement("div")
                item.innerText = "No results found" // Input field to hold array value
                list.appendChild(item)
            }
        }
    });

    input.addEventListener("keydown", function(event) {
        // Traversing the autocomplete list
        let selectedItem = document.getElementById(this.id + "autocomplete-list")
        if (selectedItem) selectedItem = selectedItem.getElementsByTagName("div")
        if (event.keyCode === 40) {
            // Presses 'Down' arrow key
            currentFocus++
            addActive(selectedItem)
        } else if (event.keyCode === 38) {
            // Presses 'Up' arrow key
            currentFocus--
            addActive(selectedItem)
        } else if (event.keyCode === 13) {
            // Presses 'Enter' key
            event.preventDefault()
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (selectedItem) selectedItem[currentFocus].click()
            }
        }
    })

    function addActive(items) {
        // Adds 'active' class to autocomplete item
        if (!items) return false;
        removeActive(items);
        if (currentFocus >= items.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (items.length - 1);
        items[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(items) {
        // Removes 'active' class from autocomplete items
        for (let i = 0; i < items.length; i++) items[i].classList.remove("autocomplete-active")
    }

    function closeAllLists(element) {
        // Close all autocomplete items, except the one passed as an argument
        let items = document.getElementsByClassName("autocomplete-items");
        for (let i = 0; i < items.length; i++) {
            if (element !== items[i] && element !== input) {
                items[i].parentNode.removeChild(items[i]);
            }
        }
    }

    document.addEventListener("click", (event) => {
        // Closes autocomplete list when clicking off search bar
        closeAllLists(event.target);
    });
}


// Executions
autoComplete(searchBar, array);