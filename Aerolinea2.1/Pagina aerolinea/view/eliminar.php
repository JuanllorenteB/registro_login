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
    <link rel="stylesheet" href="./css/style_cosultar-vuelos.css">
    <title>Document</title>
</head>
<body>
<div class="head">
        <div class="logo">
            <a href="./usuario-registrado.php">Aerolinea Amigo</a>
        </div>
        <nav class="navbar">
            <a href="./usuario-registrado.php">inicio<s</a>
            <a href="./ticket.php">Tickets<s</a>
            <a href="./ticket-reserva.php">Tickets Reservados</a>
            <a href="../controller/cerrar-sesion.php"  >Cerrar Sesion</a>
        </nav>
</div>

<form action="../controller/eliminar-ticket.php" method="POST">
    
    <h1>Eliminar ticket</h1>

    <label for="eliminar">Selecione un ticket:</label>
    <select name="eliminar">
        <option value="0">Seleccione:</option>
        <?php
        include_once '../model/eliminar-ticket-validacion.php';
        $montrar = new clseliminar;
        $montrar->fnteliminarticket();
        ?>
    </select>
    <input type="submit" name="submit" value="eliminar ticket" class="button">
</form>


</body>
</html>