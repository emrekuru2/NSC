// Variables
const searchForm = document.getElementById('search-form')
const searchBarButton = document.getElementById('search-bar-button')
const updateForm = document.getElementById('update-form')
const updateButton = document.getElementById('update-button')

// Listeners
searchBarButton.addEventListener('click', () => {
    let searchBar = document.getElementById('search-bar')
    if (searchBar.value !== '') searchForm.submit()
})

updateButton.addEventListener('click', () => {
    document.getElementById('update-members-JSON').value = getMemberRolesJSON();
    //updateForm.submit()
})