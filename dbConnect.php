<?php  
    class dbConnect { 
        public $conn;
        function __construct() {  
            require_once('config.php');  
             
        }  
        public function connect_db(){
            $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD); 

            mysqli_select_db($this->conn,DB_DATABASE);  
            if(!$this->conn)
            {  
                die ("Cannot connecconn,t to the database");  
            }  
             
            return $this->conn; 
        } 
        public function Close(){  
            mysqli_close();  
        }  
    }
?>  