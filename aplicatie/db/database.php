<?php

class Database {

  	private $_host = 'localhost';
    private $_username = 'linndows_user';
    private $_password = 'g0@U1d78';
    private $_database = 'linndows_learn';
   
     
    protected $connection;
    
    public function __construct()
    {
        if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->connection;
    }
}
?>
