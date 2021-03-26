<?php
class PokemonDAO {
    public function __construct () {
        $this->table = 'pokemons';
        $this->connection = new PDO('mysql:host=localhost;dbname=pokemonsdb', 'root', '');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function fetchAll () {

        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            //return $this->createAll($result);
            return $result;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function createAll ($results) {
        $productList = array();
        foreach ($results as $result) {
            array_push($productList, $this->create($result));
        }
        return $productList;
    }

    function create ($result) {
        return new Pokemon(
            $result['name']
        );
    }

    function store ($data) {

        if(empty($data['name'])) {
            return false;
        }

            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO pokemons(id, name, spriteURL) values(?, ?, ?)"
                );
                $statement->execute([
                    $data['id'],
                    $data['name'],
                    $data['spriteURL']
                ]);
            } catch(PDOException $e) {
                print $e->getMessage();
            }

    }

    function delete ($id) {

        if(empty($id)) {
            return false;
        }

        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE id = ?");
            $statement->execute([
                $id
            ]);
        } catch(PDOException $e) {
            print $e->getMessage();
        }
    }

}