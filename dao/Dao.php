<?php

abstract class Dao {
    protected $pdo;

    public funtion __construct() {
        $this->pdo = new Pdo();
    }
    /**
     * $id
     * return entité
     */
    abstract public retrieve($id);

    /**
     * $id
     * return bool
     */
    abstract public update($id);

    /**
     * $id
     * return bool
     */
    abstract public delete($id);

    /**
     * $array: tableau associatif
     * return entité
     */
    abstract public create($array);

    /**
     * return toute les valeurs d'une table
     */
    abstract public getAll();

    /**
     * $array : tableau associatif
     * return valeur du tableau choisie dans le tableau où la value = une valeur déterminée
     */
    abstract public getAllBy($array);
}