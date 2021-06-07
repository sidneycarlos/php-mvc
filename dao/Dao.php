<?php

abstract class Dao {
    protected $pdo;

    public funtion __construct($pdo) {
        $this->pdo = $pdo;
    }
    /**
     * $id
     * $name : entité
     * return name
     */
    abstract public retrieve($id, $name);

    /**
     * $id
     * bool : false initialisé par défaut
     * return bool
     */
    abstract public update($id, false);

    /**
     * $id
     * bool : false initialisé par défaut
     * return bool
     */
    abstract public delete($id, false);

    /**
     * $array: tableau associatif
     * $name : entité
     * return name
     */
    abstract public create($array, $name);

    /**
     * return toute les valeurs d'une table
     */
    abstract public getAll();

    /**
     * $array : tableau associatif
     * return valeur du tableau choisie dans le tableau où la value = une valeur déterminée
     */
    abstract public getAllBy($array, $value);
}