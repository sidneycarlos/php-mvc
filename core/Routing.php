<?php

class Routing {
    private $config; //mapping du fichier json
    private $uri; //stockage du tableau issu de la variable globale
    private $route;//stockage du tableau de la route testée
    private $controller; //controleur qui a été trouvé
    private $args; //tableau des arguments à passer au controller (éléments variable de l'URI)
    private $method; //verbe http de la requête

    public function __construct() {//zone d'initialisation
        $this->config = json_decode(file_get_contents('./config/routing.json'), true);
        $this->uri = explode('/',$_SERVER["REQUEST_URI"]);
    
    }

    /**
     * Déclenche le mécanisme à chaque requête http
     * 
     */
    public function execute(){
        foreach($this->config as $key => $value) {
            $this->route = explode("/", $key);
            
            if($this->isEqual()) {
                $this->compare();
            }
        }
    }
        


    /**
     * Compare la longueur des tableaux $route et $uri 
     * @return un booléen 
     */
    private function isEqual(){
        if (count($this->uri) == count($this->route)) {
            return true;            
        } 
    }


    /**
     * Récupère la valeur correspondant la valeur de la route (string ou tableau)
     * $value 
     * @return string correspondant au controller de la route sélectionnée
     */
    //private function getValue($value){}



    /**
     * Ajoute l'élément de l'URI à l'index
     * $index 
     * @return l'URI à l'index
     */
    //private function addArgument($index){}



    /**
     * Compare chaque élément des tableaux URI et Route 
     * @return false
     * ou stocke l'élément variable dans un array en tant
     * qu'argument à passer au contrôleur grâce à la méthode addArgument($index)
     */
    private function compare(){
        
    }



    /**
     * utilise les propriété controller et arg une fois que la route a été trouvée
     * @return
     */
    //private function invoke(){}

}