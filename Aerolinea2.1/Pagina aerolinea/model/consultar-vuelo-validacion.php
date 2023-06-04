<?php 


class clsconsultar extends clsconexion {
    
    private $id_vuelo;
    private $nombre_cliente;
    private $vuelo_salida;
    private $id_usuario;
    private $correos;
    private $vuelo_regreso;
    public $conn;
    private $hoy;

    public function __construct(){
        $objconexion = new clsconexion("localhost","root","","base_datos_aerolinea");
        $this->conn = $objconexion->conn;
        $this->id_vuelo = $_POST['id_vuelo'];
        $this->nombre_cliente = $_POST['nombre_cliente'];
        $this->vuelo_salida = $_POST['vuelo_salida'];
        $this->vuelo_regreso = $_POST['vuelo_regreso'];
        $this->correos = $_POST['correos'];
    }


    public function fntvalidacionconsulta() {

        $hoy= date("Y-m-d");

        if(isset($_POST['submit'])) 
        {
            
            if (empty($_POST['nombre_cliente']) || strlen(trim($_POST['nombre_cliente'])) == 0) {
                echo '<script> alert("El campo nombre no se puede dejar en blanco");
                window.location = "../view/consultar-vuelo.php";
                </script>
                ';
            exit();    
            }

            if (empty($_POST['id_vuelo']) || strlen(trim($_POST['id_vuelo'])) == 0) {
                echo '<script> alert("El campo vuelo no se puede dejar en blanco");
                window.location = "../view/consultar-vuelo.php";
                </script>
                ';
            exit();    
            }
        }

        if ( $this->vuelo_salida < $hoy) {
            echo '<script> alert("fecha salida no valido");
            window.location = "../view/consultar-vuelo.php";
            </script>
            ';
        exit(); 
        }

        if ( $this->vuelo_regreso < $hoy) {
            echo '<script> alert("fecha salida no valido");
            window.location = "../view/consultar-vuelo.php";
            </script>
            ';
        exit(); 
        }


        if ( $this->vuelo_salida > $this->vuelo_regreso) {
            echo '<script> alert("fecha regreso no valido");
            window.location = "../view/consultar-vuelo.php";
            </script>
            ';
        exit(); 
        }


    }
    public function fntmonstrar() {
        $query = $this->conn -> prepare ("SELECT v.id_vuelo, s.vuelos_salida, d.vuelos_destinos, p.precio 
            FROM tbl_vuelo AS v 
            INNER JOIN tbl_salida AS s ON v.id_salida = s.id_salida 
            INNER JOIN tbl_destino AS d ON v.id_destino = d.id_destino 
            INNER JOIN tbl_precio AS p ON v.id_precio = p.id_precio");
            $query->execute();
            $data = $query->fetchAll();
            foreach ($data as $destino):
                echo '<option value="'.$destino["id_vuelo"].'">'.$destino["vuelos_salida"].'-'.$destino["vuelos_destinos"].' '.$destino["precio"].' </option>';
                endforeach;
    }
public function fntconsultar() {

    $stmt = $this->conn->prepare("INSERT INTO tbl_reservas(id_vuelo, nombre_cliente, vuelo_salida, vuelo_regreso, correos) VALUES (:id_vuelo, :nombre_cliente, :vuelo_salida, :vuelo_regreso, :correos)");
    $stmt->bindParam(':id_vuelo', $this->id_vuelo);
    $stmt->bindParam(':nombre_cliente', $this->nombre_cliente);
    $stmt->bindParam(':vuelo_salida', $this->vuelo_salida);
    $stmt->bindParam(':vuelo_regreso', $this->vuelo_regreso);
    $stmt->bindParam(':correos', $this->correos);
    $stmt->execute();


    if ($this->conn) {
        echo 
        '<script> alert("ticket registrado exitosa mente");
        window.location = "../view/ticket-reserva.php";
        </script>';
        }
    }
}


?>