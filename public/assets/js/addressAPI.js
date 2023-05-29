const MIN_ADDRESS_LENGTH = 3;
const DEBOUNCE_DELAY = 300;

const input = document.getElementById("inputStreet");
let dataset = [];
let currentTimeout, currentPromiseReject, currentItems;

function createList(data) {
    const autocompleteItemsElement = document.createElement("div");
    autocompleteItemsElement.setAttribute("id", "addressList");
    autocompleteItemsElement.setAttribute(
        "class",
        "list-group position-absolute"
    );
    document.getElementById("addressDiv").appendChild(autocompleteItemsElement);

    data.results.forEach((result, index) => {
        const itemElement = document.createElement("button");
        itemElement.setAttribute("id", "address-" + index);
        itemElement.setAttribute(
            "class",
            "list-group-item list-group-item-action"
        );
        itemElement.setAttribute("onclick", `appendInformation(${index})`);
        itemElement.innerHTML = result.formatted;
        autocompleteItemsElement.appendChild(itemElement);
    });
}

function clearList() {
    const list = document.getElementById("addressList");

    if (list) {
        list.remove();
    }
}

function listVisibility(state) {
    const listClass = document.getElementById("addressList").classList;

    if (state) {
        listClass.remove("invisible");
    } else {
        listClass.add("invisible");
    }
}

function appendInformation(dataIndex) {
    const selectedData = dataset[dataIndex];
    console.log(dataset);
    document.getElementById("inputStreet").value =
        selectedData["address_line1"];
    document.getElementById("inputCity").value = selectedData["county"];
    document.getElementById("inputRegion").value = selectedData["state_code"];
    document.getElementById("inputPostal").value = selectedData["postcode"];
}

document.addEventListener("click", function (e) {
    if (e.target !== document.getElementById("addressList")) {
        listVisibility(false);
    } else if (e.target === document.getElementById("inputStreet")) {
        listVisibility(true);
    }
});

input.addEventListener("input", function (e) {
    const currentValue = this.value;

    if (currentTimeout) {
        clearTimeout(currentTimeout);
    }

    if (currentPromiseReject) {
        currentPromiseReject({
            canceled: true,
        });
    }

    if (!currentValue || currentValue.length < MIN_ADDRESS_LENGTH) {
        return false;
    }

    currentTimeout = setTimeout(() => {
        currentTimeout = null;

        const promise = new Promise((resolve, reject) => {
            currentPromiseReject = reject;

            const apiKey = "b9a09e3a322c40658f871bb5393d0bfe";

            var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&filter=countrycode:ca&format=json&limit=5&apiKey=${apiKey}`;

            fetch(url).then((response) => {
                currentPromiseReject = null;

                // check if the call was successful
                if (response.ok) {
                    response.json().then((data) => resolve(data));
                } else {
                    response.json().then((data) => reject(data));
                }
            });
        });

        promise.then(
            (data) => {
                dataset = data.results;
                clearList();
                createList(data);
            },
            (err) => {
                if (!err.canceled) {
                    console.log(err);
                }
            }
        );
    }, DEBOUNCE_DELAY);
});
