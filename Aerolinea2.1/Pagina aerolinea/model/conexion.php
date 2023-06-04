<?php 


class clsconexion{

    public $conn;

    public function __construct($servername,$username,$password,$dbname){
        
            try {
                $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            #Establecer el modo de error PDO a excepción
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch(PDOException $e) {
                $e->getMessage();
            }    
    }
}

?>