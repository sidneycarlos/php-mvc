<?php

class ProjectsController extends Controller{
    public function getProjects() {
        $this->render("index", array("projects" => (new DaoProjects())->getAll()));
    }
    
}