<?php


abstract class Dao implements CRUDInterface, RepositoryInterface {
    protected $pdo;
    


    

    public function __construct() {
        //$this->pdo = new PDO('mysql:dbname=planning_in_love;host=172.17.0.1:3434', 'root', 'root');
        $config = json_decode(file_get_contents('./config/database.json'),true);
        $driver = $config['driver'];
        $host = $config['host'];
        $port = $config['port'];
        $username = $config['username'];
        $password = $config['password'];
        $dbname = $config['dbname'];
        
        $this->pdo = new PDO($driver . ':dbname=' . $dbname . ';host=' . $host . ':' . $port , $username , $password);

    
    }

   
}