<?php

include_once '../model/iniciar-sesison-validacion.php';

$objclssesion = new clssesion();
$objclssesion-> fntvalidarsesion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_usuario-registrado.css">
    <title>Document</title>
</head>

<body>
    <div class="head">
        <div class="logo">
            <a href="">Aerolinea Amigo</a>
        </div>
        <nav class="navbar">
            <a href="./ticket.php">Tickets <s</a>
            <a href="./ticket-reserva.php">Tickets Reservados</a>
            <a href="./consultar-vuelo.php">Consultar Vuelo</a>
            <a href="../controller/cerrar-sesion.php"  >Cerrar Sesion</a>
        </nav>
    </div>

    <header class="content header">
        <h2 class="titulo">Bienvenido Usuario</h2>
    </header>
    
</body>
</html>
