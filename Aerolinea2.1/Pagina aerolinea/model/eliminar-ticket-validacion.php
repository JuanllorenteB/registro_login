<?php

class clseliminar extends clsconexion {
    private $eliminar;
    public $conn;

    public function __construct(){
        $objconexion = new clsconexion("localhost","root","","base_datos_aerolinea");
        $this->conn = $objconexion->conn;
        $this->eliminar = $_POST['eliminar'];
    }
    
    public function fntvalidacion(){
        if(isset($_POST['submit'])) {
            if (empty($_POST['eliminar']) || strlen(trim($_POST['eliminar'])) == 0) {
                echo '<script> alert("El campo selecione ticket no se puede dejar en blanco");
                window.location = "../view/eliminar.php";
                </script>';
                exit();
            }
        }
    }

    
    public function fnteliminarticket() {
        $query = $this->conn->prepare("SELECT * FROM tbl_reservas  WHERE correos = :correo");
        $query->bindParam(':correo', $_SESSION['correo']);
        $query->execute();
        $data = $query->fetchAll();
        foreach ($data as $ticket):
            echo '<option value="'.$ticket["id_reservas"].'"> nombre '.$ticket["nombre_cliente"].' fecha de salida '
            .$ticket["vuelo_salida"].' </option>';
        endforeach;
    }

    public function fnteliminar() {
        $stmt = $this->conn->prepare("DELETE FROM `tbl_reservas` WHERE id_reservas = :eliminar");
        $stmt->bindParam(':eliminar', $this->eliminar);
        $stmt->execute();
    
        if ($this->conn) {
            echo '<script> alert("ticket eliminado");
            window.location = "../view/ticket-reserva.php";
            </script>';
        }
    }
}


?>
