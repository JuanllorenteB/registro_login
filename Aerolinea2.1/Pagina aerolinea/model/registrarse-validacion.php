<?php

class clsregistro extends clsconexion {
    private $nombre;
    private $telefono;
    private $correo;
    private $passwor;
    private $passwor2;
    public $conn;

    public function __construct(){

        #instacio el objeto de la clase con los atributos para la conexión
        $objconexion = new clsconexion("localhost","root","","base_datos_aerolinea");
        #gracias a la instancia de la clase puedo obtener el valor de la variable "conn"
        $this->conn = $objconexion->conn;
        $this->nombre = $_POST['nombre'];
        $this->telefono = $_POST['telefono'];
        $this->correo = $_POST['correo'];
        $this->passwor = $_POST['passwor'];
        $this->passwor2 = $_POST['passwor2'];
        }

    public function fntvalidaciones(){
        #sentencia interminable 
        if(isset($_POST['submit'])) 
        {
            
            if (empty($_POST['nombre']) || strlen(trim($_POST['nombre'])) == 0) {
                echo '<script> alert("El campo nombre no se puede dejar en blanco");
                window.location = "../view/registro.php";
                </script>
                ';
            exit();    
            }

            if (empty($_POST['telefono']) || strlen(trim($_POST['telefono'])) == 0) {
                echo '<script> alert("El campo telefono no se puede dejar en blanco");
                window.location = "../view/registro.php";
                </script>
                ';
                exit();    
            } else {
                if(!is_numeric($this->telefono)) {
                    echo '<script> alert("El campo telefono solo puedes escribir numeros");
                    window.location = "../view/registro.php";
                    </script>
                    ';
                    exit(); 
                }
            }
            if (strlen($this->telefono) > 10){
                echo '<script> alert("El campo telefono solo acepta 10 caracteres");
                window.location = "../view/registro.php";
                </script>
                ';
                exit();   
            }


            if (empty($_POST['correo']) || strlen(trim($_POST['correo'])) == 0) {
                echo '<script> alert("El campo correo no se puede dejar en blanco");
                window.location = "../view/registro.php";
                </script>
                ';
                exit();     
            }elseif (!filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
                echo '<script> alert("El Correo que escribiste no es valido");
                window.location = "../view/registro.php";
                </script>
                ';
                exit();       
            }

            if (empty($_POST['passwor']) || strlen(trim($_POST['passwor'])) == 0) {
                echo '<script> alert("El campo contraseña no se puede dejar en blanco");
                window.location = "../view/registro.php";
                </script>
                ';
                exit();      
            }elseif (($this->passwor != $this->passwor2) ) {
                echo '<script> alert("El campo contraseña no es igual a vereficar contraseña");
                window.location = "../view/registro.php";
                </script>
                ';
                exit();    
            }if (strlen($this->passwor) < 5 ){
                echo '<script> alert("El campo contraseña tiene que tener 5 caracteres");
                window.location = "../view/registro.php";
                </script>
                ';
                exit();       
            }

            if (empty($_POST['passwor2']) || strlen(trim($_POST['passwor2'])) == 0) {
                echo '<script> alert("El campo contraseña no se puede dejar en blanco");
                window.location = "../view/registro.php";
                </script>
                ';
                exit();  
            } if (strlen($this->passwor2) < 5 ){
                echo '<script> alert("El campo Vereficar Contraseña tiene que tener 5 caracteres");
                window.location = "../view/registro.php";
                </script>
                ';
                exit();  
            }
        }
        #======================

        }

    
    public function fntqueryregistro(){

        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM tbl_usuario WHERE telefono = :telefono");
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->execute();
        $existe_telefono = $stmt->fetchColumn();

        if($existe_telefono) {
            echo '<script> alert("Este telefono ya existe");
            window.location = "../view/registro.php";
            </script>
            ';
            exit(); 
        }

        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM tbl_usuario WHERE correo = :correo");
        $stmt->bindParam(':correo', $this->correo);
        $stmt->execute();
        $existe_correo = $stmt->fetchColumn();

        if($existe_correo) {
            echo '<script> alert("Este correo ya existe");
            window.location = "../view/registro.php";
            </script>
            ';
            exit(); 
        }

        $stmt = $this->conn->prepare("INSERT INTO tbl_usuario(nombre, telefono, correo, passwor) VALUES (:nombre, :telefono, :correo, :passwor)");

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':passwor', $this->passwor);
        $stmt->execute();


        if ($this->conn) {
            echo 
            '<script> alert("Usuario registrado exitosamente");
            window.location = "../view/login.php";
            </script>';
        }

        }

    
}
?>