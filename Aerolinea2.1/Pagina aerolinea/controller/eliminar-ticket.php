<?php
include_once '../model/conexion.php';
include_once '../model/eliminar-ticket-validacion.php';



    $insertarpago = new clseliminar();
    $insertarpago-> fntvalidacion();
    $insertarpago-> fnteliminar();

?>