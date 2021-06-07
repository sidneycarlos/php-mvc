<?php

interface RepositoryInterface {
    
    /**
     * @param array
     * @return valeurs d'une table
     */
    public function getAll() : array;

    /**
     * @param array : tableau associatif
     * @return valeurs du tableau choisies dans le tableau où la value = une valeur déterminée
     */
    public function getAllBy(array $args) : array;
}
