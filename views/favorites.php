<?php
include('../models/dao/PokemonDAO.php');
include('../controllers/PokemonController.php');
include("../templates/header.php");
include("../templates/nav_bar.php");
$pokemonController = new PokemonController();
$pokemons = $pokemonController->getFavorites();
?>

<div class="page">
    <div class="content-page">

        <h1>Vos pokémons favoris</h1>

        <?php foreach ($pokemons as $pokemon) { ?>
        <div id="favorite_<?php echo $pokemon['id']; ?>" class="wrapper">
            <div class="image-infos">
                <div class="wrapper-image">
                    <img id="sprite" src="<?php echo $pokemon['spriteURL']; ?>" alt="">
                </div>
                <div class="pokemon-info">
                    <h3 id="name"><?php echo $pokemon['name'];?></h3>
                </div>
            </div>
            <div class="btn-container delete">
                <p id="<?php echo $pokemon['id']; ?>"><i class="fas fa-trash-alt" style="margin-right: 10px"></i>Supprimer</p>
            </div>

        </div>

        <?php } ?>

        <p id="error-message"></p>
        <p id="success-message"></p>
    </div>
</div>

</body>
</html>
