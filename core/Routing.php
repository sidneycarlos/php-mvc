<?php

class Routing {
    private $config;

    public function __construct() {
        $this->config = json_decode(file_get_contents('./config/routing.json'), true);
    }

}