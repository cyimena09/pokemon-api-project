
<?php
include("../templates/header.php");
include("../templates/nav_bar.php");
?>

<div class="page">
    <div class="content-page">
        <form class="search input-btn-container">
            <input id="search" type="text" placeholder="Nom du pokémon">
            <button class="btn-container" type="submit"><i id="search-icon" class="fas fa-search"></i></button>
        </form>

        <h1>Résultat de la recherche</h1>

        <div id="result" class="wrapper">
            <div class="image-infos">
                <div class="wrapper-image">
                    <img id="sprite" src="" alt="sprite du pokémon">
                </div>
                <div class="pokemon-info">
                    <h3 id="name"></h3>
                    <div class="infos">
                        <div class="info">
                            <p class="search label">Type</p>
                            <ul id="types">
                            </ul>
                        </div>
                        <div class="info">
                            <p class="label">Capacité</p>
                            <ul id="abilities">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-container">
                <p id="add-fav">Ajouter aux favoris</p>
            </div>

        </div>

        <p id="error-message"></p>
        <p id="success-message"></p>
    </div>
</div>


</body>
</html>