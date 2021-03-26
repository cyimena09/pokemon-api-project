$(document).ready(function () {
    let apiUrl = "https://pokeapi.co/api/v2/pokemon/";

    // Récupérer tous les pokémons de l'api

    $.get(apiUrl, function () {
        //ceci se déclenche quand ma requete part
    })
        .done(function (result) {
            let ul = document.getElementById('ul');
            result.results.forEach(element => {
                let li = document.createElement("li");
                li.innerText = element.name;
                ul.append(li);
            })
        })
        .fail(function (error) {
            console.log('error', error);
        });
});