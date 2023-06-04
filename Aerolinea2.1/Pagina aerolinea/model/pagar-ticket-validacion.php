<?php 


class clspagar extends clsconexion {
    
    private $pagar;
    private $estado;
    private $correo;
    public $conn;

    public function __construct(){
        $objconexion = new clsconexion("localhost","root","","base_datos_aerolinea");
        $this->conn = $objconexion->conn;
        $this->pagar = $_POST['pagar'];
        $this->estado = $_POST['estado'];
        $this->correo = $_POST['correos'];
    }


    public function fntvalidacion(){

        if(isset($_POST['submit'])) 
        {
            
            if (empty($_POST['pagar']) || strlen(trim($_POST['pagar'])) == 0) {
                echo '<script> alert("El campo selecione ticket no se puede dejar en blanco");
                window.location = "../view/pagar.php";
                </script>
                ';
            exit();    
            }

            if (empty($_POST['estado']) || strlen(trim($_POST['estado'])) == 0) {
                echo '<script> alert("El campo pagar ticket no se puede dejar en blanco");
                window.location = "../view/pagar.php";
                </script>
                ';
            exit();    
            }
        }
    }


    public function fntticket() {
            $query = $this->conn -> prepare ("SELECT * FROM tbl_reservas  WHERE correos = :correo");
            $query->bindParam(':correo', $_SESSION['correo']);
            $query->execute();
            $data = $query->fetchAll();
                foreach ($data as $ticket):
                echo '<option value="'.$ticket["id_reservas"].'"> nombre '.$ticket["nombre_cliente"].' fecha de salida '
                .$ticket["vuelo_salida"].' fecha de regreso '.$ticket["vuelo_regreso"].' </option>';
                endforeach;
    }

    public function fntpagarticket() {
        $query = $this->conn -> prepare ("SELECT * FROM tbl_estado");
            $query->execute();
            $data = $query->fetchAll();
            foreach ($data as $estado):
                echo '<option value="'.$estado["id_estado"].'">'.$estado["estado"].' </option>';
            endforeach;
    }


    public function fntpagoregistrado() {

        $stmt = $this->conn->prepare("INSERT INTO tbl_ticket(id_reservas, id_estado, correo) VALUES (:pagar, :estado, :correo)");
        $stmt->bindParam(':pagar', $this->pagar);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->execute();
        
    
        if ($this->conn) {
            echo
            '<script> alert("ticket registrado exitosa mente");
            window.location = "../view/ticket.php";
            </script>';

            }
        }
    }


?>