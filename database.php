<?php
    class database{
        private $host;
        private $user;
        private $password;
        private $database;
        private $table;
        
        public function __construct($table){
            $this->host = "localhost";
            $this->user = "dbuser";
            $this->password = "goodbyeWorld";
            $this->database = "eventDB";
            $this->table = $table;
        }
        
        public function getHost(){
            return $this->host;
        }
        
        public function getUser(){
            return $this->user;
        }
        
        public function getPassword(){
            return $this->password;
        }
        
        public function getDatabase(){
            return $this->database;
        }
        
        public function getTable(){
            return $this->table;
        }
        
        public function connectToDB() {
            $db = mysqli_connect($this->host, $this->user, $this->password, $this->database);
            if (mysqli_connect_errno()) {
                echo "Connect failed.\n".mysqli_connect_error();
                exit();
            }
            return $db;
        }
    }
?>