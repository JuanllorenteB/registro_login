<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_login.css">
    <title>Login</title>
</head>
<body>
<div class="head">
    <div class="logo">
        <a href="./inicio.php">Aerolinea Amigo</a>
    </div>
    <nav class="navbar">
        <a href="./inicio.php">Inicio</a>
        <a href="./registro.php">Registrate</a>
    </nav>
</div>

<form action="../controller/login-usuario.php" method="post">
    <h1>Iniciar Sesion</h1>

    <label for="">Correo:</label>
    <input type="text" name="correo" placeholder="Ingresa tu correo">

    <label for="">Contraseña:</label>
    <input type="password" name="passwor" placeholder="Ingresa tu contraseña">
    <input type="submit" name="submit" value="Iniciar Sesion" class="button">

    <p>¿Todavia no tienes cuenta ? <a class="link" href="./registro.php">Registrate</a></p>
</form>
    
</body>
</html>