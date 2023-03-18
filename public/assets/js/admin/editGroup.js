// Variables
const searchForm = document.getElementById('search-form')
const searchBar = document.getElementById('search-bar')
const searchBarButton = document.getElementById('search-bar-button')

const updateForm = document.getElementById('update-form')
const updateButton = document.getElementById('update-button')

const deleteForm = document.getElementById('delete-form')
const deleteButton = document.getElementById('delete-button')


// Listeners
searchBarButton.addEventListener('click', () => {
    if (searchBar.value !== '') searchForm.submit()
})

updateButton.addEventListener('click', () => {
    updateForm.submit()
})

deleteButton.addEventListener('click', () => {
    //deleteForm.submit()
})