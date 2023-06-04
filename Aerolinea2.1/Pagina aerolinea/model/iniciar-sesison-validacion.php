<?php 
include_once '../model/conexion.php';

class clssesion extends clsconexion {
    private $id_reservas;
    private $correos;
    public $conn;
    private $usuario;

    public function __construct(){
    $objconexion = new clsconexion("localhost","root","","base_datos_aerolinea");
    $this->conn = $objconexion->conn;}

    public function fntvalidarsesion(){
    session_start();

    if (!isset($_SESSION['correo'])) {
        echo '<script>
        window.location = "../view/login.php";</script>';
        session_destroy();
        die;
        }
    }
    public function fntcorreo(){
        echo $_SESSION['correo'];
    
    }
    
}

?>