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
    <link rel="stylesheet" href="./css/style_ticketss.css">
    <title>Ticket</title>
</head>
<body>
<div class="head">
        <div class="logo">
            <a href="./usuario-registrado.php">Aerolinea Amigo</a>
        </div>
        <nav class="navbar">
            <a href="./usuario-registrado.php">inicio<s</a>
            <a href="./ticket-reserva.php">Ticket Reservados<s</a>
            <a href="./consultar-vuelo.php">Consultar Vuelo</a>
            <a href="../controller/cerrar-sesion.php"  >Cerrar Sesion</a>
        </nav>
</div>

<table>
<h2>Ticket comprados</h2>
    <thead>
        <tr>
            <th>Codigo Del Ticket</th>
            <th>Vuelo Salida</th>
            <th>Vuelo Destino</th>
            <th>Precio</th>
            <th>Fecha de Salida</th>
            <th>Fecha de Regreso</th>
            <th>estado del ticket</th>
            <th>Usuario</th>
        </tr>
    </thead>
    <?php 
    include_once '../model/ticket-validacion.php';
    $objticket = new clsticket();
    $objticket-> fntmostrarticket();
    
    foreach ( $objticket->data as $pago):
    ?>
    <tbody>
        <tr>
            <td><?php echo $pago['id_reservas'] ?> </td>
            <td><?php echo $pago['vuelos_salida'] ?> </td>
            <td><?php echo $pago['vuelos_destinos'] ?> </td>
            <td><?php echo $pago['precio'] ?> </td>
            <td><?php echo $pago['vuelo_salida'] ?> </td>
            <td><?php echo $pago['vuelo_regreso'] ?> </td>
            <td><?php echo $pago['id_estado'] ?></td>
            <td><?php echo $pago['correos'] ?></td>
        </tr>
        <?php   
        endforeach;
        ?>
    </tbody>
</table>

    
    
</body>
</html>