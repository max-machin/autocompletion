window.addEventListener("DOMContentLoaded", (event) => {

    let search = document.getElementById('search')
    let search_result = document.getElementById('search_result')
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
                    search_result.innerHTML = '<p>Aucun résultat</p>'
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
            search_result.innerHTML = "<p>Veuillez saisir un jeux.</p>"
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