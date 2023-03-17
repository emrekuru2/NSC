// Variables
const searchForm = document.getElementById('search-form')
const searchBar = document.getElementById('search-bar')
const searchBarButton = document.getElementById('search-bar-button')

const updateForm = document.getElementById('update-form')
const updateTeamButton = document.getElementById('update-button')

const deleteForm = document.getElementById('delete-form')
const deleteTeamButton = document.getElementById('delete-button')


// Listeners
searchBarButton.addEventListener('click', () => {
    if (searchBar.value !== '') searchForm.submit()
})

updateTeamButton.addEventListener('click', () => {
    updateForm.submit()
})

deleteTeamButton.addEventListener('click', () => {
    //deleteForm.submit()
})


if (searchBar.value === '') searchBarButton.disabled = true
