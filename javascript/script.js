window.addEventListener("DOMContentLoaded", (event) => {
    let search = document.getElementById('search')
    let search_result = document.getElementById('search_result')
    search.addEventListener("keyup", (event) => {
        search_result.innerHTML = search.value
    })
})