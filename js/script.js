window.addEventListener("DOMContentLoaded", (event) => {

    let search = document.getElementById('search')

    let search_result = document.getElementById('search_result')
    let related_search = document.getElementById('related-search')

    let form = document.querySelector('form')
    
    search.addEventListener("keyup", function() {
        
        var term = search.value
        if (term.length > 0)
        {
            var data = new FormData(form)
            //data.append('term', term)
            fetch('searchJSON.php', {
                method: 'POST',
                body: data
            })
            // .then(response => response.json())
            // .then(data => {
            .then(response => response.json())
            .then(result => {
                if(Boolean(result[0]))
                {
                    let str = "";
                    for (let i = 0; i < result.length; i++)
                    {
                        str = str + '<div><a href="element.php?id=' + result[i].id + '" class="list_jeux">' + result[i].nom + '</a></div>';
                        search_result.innerHTML = str;
                    }
                } else {
                    search_result.innerHTML = "<p class='falseSearch'>Aucun résultat</p>"
                }
                // document.getElementById(search_result).innerHTML = str;
            })
            // .then(function data(response){
            //     console.log(data);
            //     let str = "";
            //     for (let i = 0; i < data.length; i++)
            //     {
            //         str = str + '<a href="element.php?cars=' + data[i][0]['id'] + '" class="carsList">' + data[i][0]['titre'] + '</a><br />';
            //     }
            //     document.getElementById('search_result').innerHTML = str;
            // })
        } else {
            search_result.innerHTML = "<p class='falseSearch'>Veuillez saisir un jeux.</p>"
        }
       
    })

    search.addEventListener("keyup", function(){
        var term = search.value

        if(term.length >= 3){

            var relatedData = new FormData(form)
            fetch('relatedJSON.php', {
                method: 'POST',
                body: relatedData
            })
            .then(response => response.json())
            .then(resultat => {
                if(Boolean(resultat))
                {
                    let str = ""
                    for (let i = 0; i < resultat.length; i++) 
                    {
                        str = str + '<div><a href="element.php?id=' + resultat[i].id + '" class="list_jeux">' + resultat[i].nom + '</a></div>';
                        related_search.innerHTML = str;
                    }
                }
            })
        } else {
            related_search.innerHTML = "";
        }
    })
})

// $('#search').keyup(function()
// {
//     if ($('#search').val() !== "")
//     {
//     console.log('coucou')
//         $.ajax({
//             url: 'test.php',
//             type: 'GET',
//             dataType: 'JSON',
//             data: 'search=' + $(this).val()
//         }).done(function (data)
//         {
//             console.log(data)
//             let str = "";
//             for (let i = 0; i < data.length; i++)
//             {
//                 str = str + "<a href='element.php?id=" + data[i][0]['id'] + "'>" + data[i][0]['nom'] + "</a><br />";
//             }
//             document.getElementById('search_result').innerHTML = str;
//         })
//     }
// })