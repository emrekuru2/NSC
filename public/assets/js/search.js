const searchForm = document.getElementById('search-form')
const searchBarButton = document.getElementById('search-bar-button')

searchBarButton.addEventListener('click', () => {
    let searchBar = document.getElementById('search-bar')
    if (searchBar.value !== '') searchForm.submit()
})