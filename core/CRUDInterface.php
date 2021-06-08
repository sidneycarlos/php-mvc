<?php

interface CRUDInterface {
    /**
     * Retourne l'
     * @param $id
     * @return l'entité correspondante à l'id passé en argumen
     */
    public function retrieve(int $id) : object;

    /**
     * persiste l'entité passée en argument
     * @param id
     * @return bool
     */
    public function update(object $id) : bool;
    
    /**
     * @param id supprime l'entité correspondant à l'id passé en argument
     * @return bool 
     */
    public function delete(int $id) : bool;
    
    /**
     * @param array: tableau associatif
     * @return entité
     */
    public function create(array $args) : object;
}
