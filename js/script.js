window.addEventListener("DOMContentLoaded", (event) => {

    //Récupération de l'input de recherche 
    let search = document.getElementById('search')

    //Récupération de la div qui contiendra les résultats précis de recherche
    let search_result = document.getElementById('search_result')
    //Récupération de la div qui contiendra les résultats en rapport avec la recherche
    let related_search = document.getElementById('related-search')

    search_result.style.display = "none"
    related_search.style.display = "none"

    // Variable servant à la création d'un séparateur : pour séparer les deux types de résultats
    let separator = document.getElementById('separator')
    
    // Récupération du formulaire de saisie de recherche
    let form = document.querySelector('form')
    
    // Ajout d'un événement sur l'input de recherche : aprés pression sur une touche du clavier
    search.addEventListener("keyup", function() {
        
        // Récuperation de la valeur de l'input contenant la recherche 
        var term = search.value

        // Si au moins 1 caractères est saisit
        if (term.length > 0)
        {
            // Création d'un objet FormData
            var data = new FormData(form)
            // Fetch des data concerné sur la page JSON/searchJSON.php
            fetch('JSON/searchJSON.php', {
                method: 'POST',
                body: data
            })
            // Récupération de la réponse en JSON
            .then(response => response.json())
            .then(result => {
                // Si il y a un résultat alors on insére les jeux trouvé dans la div d'affiche des résultats
                if(Boolean(result[0]))
                {   
                    search_result.style.display = "block"
                    let str = "";
                    for (let i = 0; i < result.length; i++)
                    {

                        str = str + '<div><a href="element.php?id=' + result[i].id + '" class="list_jeux">' + result[i].nom + '</a></div>';
                        search_result.innerHTML = str;
                    }
                } else {
                    search_result.innerHTML = "<p class='falseSearch'>Aucun résultat .</p>"
                }
            })
        } else {
            search_result.innerHTML = "";
            search_result.style.borderBottom = "none"
            related_search.innerHTML = "";
        }
       
    })

    // Ajout d'un événement sur l'input de recherche : aprés pression sur une touche du clavier
    search.addEventListener("keyup", function(){
        // Récupération de la valeur de l'input de recherche
        var term = search.value

        // Si au moins 2 caractères sont saisit
        if(term.length >= 2){

            // Création d'un objet FormData
            var relatedData = new FormData(form)
            fetch('JSON/relatedJSON.php', {
                method: 'POST',
                body: relatedData
            })
            // Récupération de la réponse en JSON
            .then(response => response.json())
            .then(resultat => {
                console.log(resultat)
                // Si il y a un résultat alors on insére les jeux trouvé dans la div de résultat
                if(Boolean(resultat[0]))
                { 
                    related_search.style.display = 'block'
                    let str = ""
                    for (let i = 0; i < resultat.length; i++) 
                    {
                        str = str + '<div><a href="element.php?id=' + resultat[i].id + '" class="list_jeux">' + resultat[i].nom + '</a></div>';
                        related_search.innerHTML = str;
                        separator.style.display = 'block'
                    }
                   
                } else {
                    separator.style.display = 'none';
                    related_search.innerHTML = "";
                }
            })
        } else {
            related_search.style.display = 'none'
            related_search.innerHTML = '';
            separator.style.display = 'none'
        }
    })
})
