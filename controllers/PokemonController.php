<?php

class PokemonController {
    public function __construct () {
        $this->dao = new PokemonDAO();
    }

    public function index() {
        include("index.php");
    }

    public function getFavorites() {
        return $this->dao->fetchAll();
    }

    public function save($pokemon) {
        $this->dao->store($pokemon);
    }

    public function delete($id) {
        $this->dao->delete($id);
    }

}