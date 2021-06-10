<?php

abstract class Controller {
    private $post; //propriété qui va stocker la superglobal post
    private $get; //propriété qui va stocker la superglobal get

    /**
     * initialisation des propriétés post et get
     */
    public function __construct() {
        $this->post = $_POST;
        $this->get = $_GET;
    }

    /**
     * est final pour qu'elle soit utilisée par le dev mais ne pourra pas etre modifiée
     * @return superglobale get 
     */
    protected final function inputGet(){
        return $this->get;
    }

     /**
     * est final pour qu'elle soit utilisée par le dev mais ne pourra pas etre modifiée
     * @return superglobale post 
     */
    protected final function inputPost(){
        return $this->post;
    }
    protected function render(string $viewPath, array $data) {

    }

}