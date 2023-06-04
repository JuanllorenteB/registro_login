<?php
include_once '../model/iniciar-sesison-validacion.php';

$objclssesion = new clssesion();
$objclssesion-> fntvalidarsesion();
//$mysqli = $objclssesion->conn;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_reserva-ticke.css">
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
            <a href="./consultar-vuelo.php">Consultar Vuelo</a>
            <a href="../controller/cerrar-sesion.php" >Cerrar Sesion</a>
        </nav>
    </div>



<table>
<h2>consultar Ticket </h2>
    <thead>
        <tr>
            <th>codigo del ticket</th>
            <th>Salida</th>
            <th>Destino</th>
            <th>Precio</th>
            <th>Nombre</th>
            <th>fecha de salida</th>
            <th>fecha de regreso</th>
            <th>Usuario</th>
        </tr>
    </thead>
    <?php 
    include_once '../model/ticket-reserva-validacion.php';
    $objclsreservar = new clsreserva();
    $objclsreservar-> fntmostrarreserva();

        $objclsreservar-> data;
        foreach ($objclsreservar-> data as $reserva):
    
    ?>
    <tbody>
        <tr>
            <td><?php echo $reserva['id_reservas'] ?> </td>
            <td><?php echo $reserva['vuelos_salida'] ?></td>
            <td><?php echo $reserva['vuelos_destinos'] ?></td>
            <td><?php echo $reserva['precio'] ?></td>
            <td><?php echo $reserva['nombre_cliente'] ?></td>
            <td><?php echo $reserva['vuelo_salida'] ?></td>
            <td><?php echo $reserva['vuelo_regreso'] ?></td>
            <td><?php echo $reserva['correos'] ?></td>
            </td>
        </tr>
        <?php
        endforeach; 
        ?>
        <button class="btn"> <?php echo "<a href='../view/pagar.php'>Pagar</a>";?></button>
        <button class="btn1"> <?php echo "<a href='../view/eliminar.php'>Eliminar</a>";?></button>
    </tbody>
</table>

    
</body>
</html>