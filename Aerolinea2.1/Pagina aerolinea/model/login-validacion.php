<?php

class clslogin extends clsconexion{
    private $correo;
    private $passwor;
    public $conn;
    private $usuario;

    public function __construct(){
    $this->correo = $_POST['correo'];
    $this->passwor = $_POST['passwor'];
    $objconexion = new clsconexion("localhost","root","","base_datos_aerolinea");
    $this->conn = $objconexion->conn;}

    public function fntquerylogin(){
    // Verificar si el usuario y la contraseña son válidos
    $stmt = $this->conn->prepare("SELECT * FROM tbl_usuario WHERE correo = :correo AND passwor = :passwor");
    $stmt->bindParam(':correo', $this->correo);
    $stmt->bindParam(':passwor', $this->passwor);
    $stmt->execute();
    $this->usuario = $stmt->fetch();}


    public function fntvalidaciones(){

    if($this->usuario) {
        // Iniciar sesión y redirigir al usuario a la página de inicio
        session_start();
        $_SESSION['correo'] = $this->usuario['correo'];
        echo '<script> alert("Inicio de sesion exitoso");
            window.location = "../view/usuario-registrado.php";
            </script>
            ';
            exit(); 
    } else {
        // Si el usuario y la contraseña no son válidos, mostrar un mensaje de error
        echo '<script> alert("Correo o contraseña equivocado");
            window.location = "../view/login.php";
            </script>
            ';
            exit();
    }
    }
}


?>