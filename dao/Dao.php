<?php

abstract class Dao implements CRUDInterface, RepositoryInterface {
    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO("");
    }
   
}