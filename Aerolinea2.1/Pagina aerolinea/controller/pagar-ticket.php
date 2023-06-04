<?php
include_once '../model/conexion.php';
include_once '../model/pagar-ticket-validacion.php';



    $insertarpago = new clspagar();
    $insertarpago-> fntvalidacion();
    $insertarpago-> fntpagoregistrado();


?>