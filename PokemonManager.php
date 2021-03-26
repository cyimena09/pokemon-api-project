<?php
include('controllers/PokemonController.php');
include('models/dao/PokemonDAO.php');
$pokemonController = new PokemonController();
$pokemonController->index();