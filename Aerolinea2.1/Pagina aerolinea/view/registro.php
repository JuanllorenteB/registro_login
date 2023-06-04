<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_registro.css">
    <title>Registro</title>
</head>
<body>
<div class="head">
    <div class="logo">
        <a href="./inicio.php">Aerolinea Amigo</a>
    </div>
    <nav class="navbar">
        <a href="./inicio.php">Inicio</a>
        <a href="./login.php">Iniciar Sesion</a>
    </nav>

</div>
<form action="../controller/registro-usuario.php"   method="post">
    <h1>Registro</h1>

    <label for="">Nombre:</label>
    <input type="text" name="nombre" placeholder="Ingresa tu nombre" pattern="^[a-zA-Z ]+$" >

    <label for="">Telefono:</label>
    <input type="text" name="telefono" placeholder="Ingresa tu telefono"   minlength="0" >

    <label for="">Correo:</label>
    <input type="text" name="correo" placeholder="Ingresa tu correo"  >

    <label for="">Contraseña:</label>
    <input type="password" name="passwor" placeholder="Ingresa tu contraseña" minlength="5" >

    <label for="">Verificar Contraseña:</label>
    <input type="Password" name="passwor2" placeholder="Ingresala de nuevo" minlength="5" >
    <input type="submit" name="submit" value="Registrate" class="button">
    <p>Al registrate aceptas nuestros terminos y condiciones</p>
    <p>¿Ya tienes cuenta ? <a class="link" href="./login.php">Iniciar Sesion</a></p>

</form>

</body>
</html>