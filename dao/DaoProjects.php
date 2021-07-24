<?php

class DaoProjects extends Dao {
    public function getAll() : array {
        return $this->pdo->query("SELECT * FROM PROJECT ORDER BY project_name ASC LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllBy(array $args) : array{
        
        
    }

    public function retrieve(int $id) : object{

    }

    
    public function update(object $id) : bool{

    }
    
    public function delete(int $id) : bool{

    }
    
    public function create(array $args) : object{

    }
}