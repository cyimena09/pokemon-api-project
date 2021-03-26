<?php
include('models/dao/PokemonDAO.php');
include('controllers/PokemonController.php');
$pokemonController = new PokemonController();
$pokemonController->save($_POST);