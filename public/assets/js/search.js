// // Variables
// const searchForm = document.getElementById('search-form');
// const searchBar = document.getElementById('search');

// // Listeners
// document.addEventListener('keydown', (event) => {
//     if (searchBar.value !== '' && event.key === 'Enter') {
//         searchForm.submit();
//     }
// });

// // Functions
// function autoComplete(input, array) {
//     let currentFocus;

//     input.addEventListener("input", function () {
//         let list, item, val = this.value.trim();
//         closeAllLists();
//         if (!val) return false;

//         currentFocus = -1;

//         list = document.createElement("div");
//         list.setAttribute("id", this.id + "autocomplete-list");
//         list.setAttribute("class", "autocomplete-items");
//         this.parentNode.appendChild(list);

//         for (let i = 0; i < array.length; i++) {
//             // Match in array using partial letters
//             if (array[i].toUpperCase().includes(val.toUpperCase())) {
//                 // Create a div element for each matching element
//                 item = document.createElement("div");
//                 item.innerHTML = highlightMatchedText(array[i], val); // Highlight matched text
//                 item.innerHTML += "<input type='hidden' value='" + array[i] + "'>"; // Input holding value

//                 // When user clicks an autofill option
//                 item.addEventListener("click", function (event) {
//                     event.preventDefault();
//                     input.value = this.getElementsByTagName("input")[0].value; // Insert array value into search bar
//                     closeAllLists();
//                     searchForm.submit();
//                 });
//                 list.appendChild(item);
//             }
//         }

//         if (list.childNodes.length === 0) {
//             // No results found
//             item = document.createElement("div");
//             item.innerText = "No results found";
//             list.appendChild(item);
//         }
//     });

//     input.addEventListener("keydown", function (event) {
//         // Traversing the autocomplete list
//         let selectedItem = document.getElementById(this.id + "autocomplete-list");
//         if (selectedItem) selectedItem = selectedItem.getElementsByTagName("div");
//         if (event.keyCode === 40) {
//             // Presses 'Down' arrow key
//             currentFocus++;
//             addActive(selectedItem);
//         } else if (event.keyCode === 38) {
//             // Presses 'Up' arrow key
//             currentFocus--;
//             addActive(selectedItem);
//         } else if (event.keyCode === 13) {
//             // Presses 'Enter' key
//             event.preventDefault();
//             if (currentFocus > -1) {
//                 /*and simulate a click on the "active" item:*/
//                 if (selectedItem) selectedItem[currentFocus].click();
//             }
//         }
//     });

//     function addActive(items) {
//         // Adds 'active' class to autocomplete item
//         if (!items) return false;
//         removeActive(items);
//         if (currentFocus >= items.length) currentFocus = 0;
//         if (currentFocus < 0) currentFocus = items.length - 1;
//         items[currentFocus].classList.add("autocomplete-active");
//     }

//     function removeActive(items) {
//         // Removes 'active' class from autocomplete items
//         for (let i = 0; i < items.length; i++) items[i].classList.remove("autocomplete-active");
//     }

//     function closeAllLists() {
//         // Close all autocomplete items
//         let items = document.getElementsByClassName("autocomplete-items");
//         for (let i = 0; i < items.length; i++) {
//             items[i].parentNode.removeChild(items[i]);
//         }
//     }

//     document.addEventListener("click", (event) => {
//         // Closes autocomplete list when clicking off search bar
//         closeAllLists(event.target);
//     });
// }

// function highlightMatchedText(text, search) {
//     // Highlight the matched text in the given string
//     const regex = new RegExp(search, "gi");
//     return text.replace(regex, "<strong>$&</strong>");
// }

// // Execution
// autoComplete(searchBar, array);

const config = {
    placeHolder: "Search for Food...",
    data: {
        src: ["Sauce - Thousand Island", "Wild Boar - Tenderloin", "Goat - Whole Cut"]
    },
    resultItem: {
        highlight: true,
    }
}

const autoCompleteJS = new autoComplete({ config });
