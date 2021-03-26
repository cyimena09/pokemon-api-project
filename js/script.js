$(document).ready(function () {
    let apiUrl = "https://pokeapi.co/api/v2/pokemon/";
    let pokemonId; // id du pokémon
    let pokemon; // nom du pokémon
    let spriteURL; // image du pokémon
    let successMessage = document.getElementById('success-message');
    let errorMessage = document.getElementById('error-message');

    // Chercher un pokémon

    $('form').on('submit', function (e) {
        e.preventDefault();
        console.log("Recherche d'un pokémon");
        let resultElement = document.getElementById('result');
        let $search = $(this).find('input#search').val();

        if ($search === '') {
            resultElement.style.display = 'none';
            errorMessage.innerText = "Veuillez entrer un pokémon.";
        } else {
            $.get(apiUrl + $search, function () {
                // ce bloc de code ne fonctionne qu'en cas de succès
            })
                .done(function (result) {
                    // on vide le contenu du précédent résultat s'il existe
                    errorMessage.innerText = '';
                    $('#types').empty();
                    $('#abilities').empty();

                    // recupération du resultat
                    pokemonId = result.id;
                    pokemon = result.name;
                    spriteURL = result.sprites.front_default;
                    // affichage du nom du pokémon et de son image
                    $('h3#name').text(result.name);
                    $('img#sprite').attr('src', result.sprites.front_default);

                    // recupération des compétences et création d'une balise li
                    result.types.forEach(element => {
                        let ul = document.getElementById('types');
                        let li = document.createElement("li");
                        li.innerText = element.type.name;
                        ul.append(li);
                    })

                    // recupération des compétences et création d'une balise li
                    result.abilities.forEach(element => {
                        let ul = document.getElementById('abilities');
                        let li = document.createElement("li");
                        li.innerText = element.ability.name;
                        ul.append(li);
                    })
                    // une fois le contenu chargé on l'affiche
                    resultElement.style.display = 'flex';
                })
                .fail(function (error) {
                    console.log('error', error);
                    resultElement.style.display = 'none';
                    errorMessage.innerText = "Désolé ce pokémon est introuvable.";
                });
        }
    });

    // Enregistrer dans les favoris

    $('p#add-fav').on('click', function (e) {
        e.preventDefault();
        console.log("Enregistrement du pokémon.");
        let data = {};
        data.id = pokemonId;
        data.name = pokemon;
        data.spriteURL = spriteURL;
        $.post('../save.php', data, function () {

        })
            .done(function (result) {
                $('#response').html(result);
                // transformation de la première lettre du pokémon en majuscule
                pokemon = pokemon.charAt(0).toUpperCase() + pokemon.substring(1).toLowerCase();
                successMessage.style.opacity = '1';
                successMessage.innerText = pokemon + ' a été ajouté dans les favoris !';

                setTimeout(
                    () => {
                        successMessage.style.opacity = '0';
                    }, 700
                );
            })
            .fail(function (error) {
                console.log('error', error);
                errorMessage.innerText = "Impossible d'ajouter le pokémon.";
            });
    });

    // Supprimer un pokémon

    $('.delete p').on('click', function (e) {
        e.preventDefault();
        console.log("Suppression d'un pokémon");
        let pokemonId = $(this).attr('id')
        let data = {}
        data.id = pokemonId;

        $.post('../delete.php', data, function () {
            //ceci se déclenche quand ma requete part
        })
            .done(function () {
                // si la requete est un success on supprime le pokémon dans le html
                let favorite = document.getElementById('favorite_' + pokemonId);
                favorite.remove();
            })
            .fail(function (error) {
                console.log('error', error);
                //ceci se déclenche quand ma requete est répondue avec une erreur
            });
    });

});