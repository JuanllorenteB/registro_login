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

<form action="../controller/pagar-ticket.php" method="POST">
    
    <h1>Pagar ticket</h1>

    <label for="pagar">Selecione un ticket:</label>
    <select name="pagar">
        <option value="0">Seleccione:</option>
        <?php
        include_once '../model/pagar-ticket-validacion.php';
        $montrar = new clspagar;
        $montrar->fntticket();
        ?>
    </select>
    

    <label for="estado">Pagar ticket:</label>
    <select name="estado">
        <option value="0">Seleccione:</option>
        <?php
        include_once '../model/pagar-ticket-validacion.php';
        $montrar = new clspagar;
        $montrar->fntpagarticket();
        ?>
    </select>

    <label for="">Usuario:</label>
    <input type="text" name="correos" value="<?php 
    $objclssesion-> fntcorreo();?>" readonly>


    <input type="submit" name="submit" value="pagar ticket" class="button">
</form>


</body>
</html>