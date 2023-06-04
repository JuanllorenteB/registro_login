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

<form action="../controller/consulta-vuelo-class.php" method="post">
    
    <h1>Consultas de Vuelos Disponibles</h1>

    <label for="id_vuelo">Selecciona un Destino:</label>
    <select name="id_vuelo">
        <option value="0">Seleccione:</option>
        <?php
        include_once '../model/consultar-vuelo-validacion.php';
        $montrar = new clsconsultar;
        $montrar->fntmonstrar();
        ?>
    </select>


    <label for="">Nombre:</label>
    <input type="text" name="nombre_cliente" placeholder="Ingresa tu nombre"  pattern="^[a-zA-Z ]+$" >


    
    
    <label for="">Fecha de salida:</label>
    <input type="date" name="vuelo_salida" placeholder="Escoge la fecha de tu vuelo">

    <label for="">Fecha de regreso:</label>
    <input type="date" name="vuelo_regreso" placeholder="Escoge la fecha de tu vuelo">

    <label for="">Usuario:</label>
    <input type="text" name="correos" value="<?php 
    $objclssesion-> fntcorreo();?>" readonly>



    <input type="submit" name="submit" value="Reservar ticket" class="button">
</form>


</body>
</html>