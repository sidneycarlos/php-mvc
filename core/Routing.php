<?php
class Routing
{
    /**     *     * @var Array Tableau associatif representant le fichier de configuration      */    private $config;
    /**     * Tableau representant l'URI     * @var array      */    private $uri;
    /**     * Tableau representant la route correspondante à l'URI     * @var array     */    private $route;
    /**     * Le controleur correspondant à la route trouvée     * @var string      */    private $controller;
    /**     * Tableau des arguments a passer à la methode du controleur     * @var array     */    private $args;
    /**     * chaine representant le verbe http     * @var string      */    private $method;
    function __construct()
    {
        $DS = DIRECTORY_SEPARATOR;
        $directory = explode($DS, __DIR__);
        unset($directory[count($directory) - 1]);
        $root = implode($DS, $directory);
        $this->config = json_decode(file_get_contents($root . $DS . "config" . $DS . "routing.json"),            true);
        $this->args = array();
    }



    /**     * Execute l'algorithme de routing     */    
    public function execute()
    {
        $uri = explode("?", $_SERVER['REQUEST_URI'])[0];
        $this->uri = explode("/", $uri);
        $this->method = $_SERVER['REQUEST_METHOD'];
        foreach ($this->config as $key => $value) {
            $this->route = explode("/", $key);
            $this->controller = $this->getValue($value);
            if ($this->isEqual()) {
                if ($this->compare()) {
                    break;
                }
            }
        }
    }


    /**
     * Passer dans l'uri le transformer en tableau avec le ? en séparateur récupérer la valeur après le séparateur
     * transformer ce nouveau string en tableau avec le séparateur &
     * itérer dans le tableau, la valeur avant "=" est une key celle après est une value
     */
    /*public function sanitize()
    {
        $uri = explode("?", $_SERVER['REQEST_URI'])[1];
        $this->uri = explode("&", $uri);
        $key = array();
        $value = array();
        for ($i = 0; $i < count($this->uri); $i++) {
            global $key;
            global $value;
            array_push($key,explode("=", $this->uri[$i])[0]) ;
            array_push($value,explode("=", $this->uri[$i])[1]) ;
        }
    }*/


    /**     * Compare la longueur des tableaux     */    
    private function isEqual()
    {
        if (strpos($this->uri[count($this->uri) - 1], "?") === 0) {
            unset($this->uri[count($this->uri) - 1]);
        }
        return (count($this->uri) === count($this->route)) ? true : false;
    }



    /**     * Retourne la clé (le controleur) dans le tableau des routes     */    
    private function getValue($value)
    {
        if (is_array($value)) {
            return (isset($value[$this->method])) ? $value[$this->method] : null;
        } else {
            return $value;
        }
    }



    /**     * Ajoute l'element variable de l'URI dans la liste des arguments     */    
    private function addArgument($i)
    {
        if (!empty($this->route[$i])) {
            $pos = strpos("(:)", $this->route[$i]);
            if ($pos === 0) {
                array_push($this->args, $this->uri[$i]);
                return true;
            }
        }
        return false;
    }



    /**     * Effectue la comparaison des elements      * entre l'URI et la route     */    
    private function compare()
    {
        for ($index = 0; $index < count($this->route); $index++) {
            if ($this->route[$index] !== $this->uri[$index]) {
                if (!$this->addArgument($index)) {
                    return false;
                }
            }
        }
        $this->invoke();
    }



    /**     * Invoque la methode selectionnée     */    
    private function invoke()
    {
        $elements = explode(":", $this->controller);
        $object = new $elements[0]();
        return call_user_func_array(array($object, $elements[1]), $this->args);
    }
}

/**
 * si la clé contient le string "?" on récupère la valeur du string qu'il y a après
 * on explode avec le séparateur & et on stock dans un tableau l'index[1]
 */
