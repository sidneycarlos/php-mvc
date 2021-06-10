<?php

abstract class Controller {
    private $post;
    private $get;

    public function __construct() {
        $this->post = $_POST;
        $this->get = $_GET;
    }

    protected function render(string $viewPath, array $data) {

    }

}