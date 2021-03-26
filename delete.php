<?php
include('models/dao/PokemonDAO.php');
include('controllers/PokemonController.php');
$id = $_POST['id'];
$pokemonController = new PokemonController();
$pokemonController->delete($id);