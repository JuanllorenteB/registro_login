<?php
include_once '../model/conexion.php';
include_once '../model/consultar-vuelo-validacion.php';



    $insertarDatos = new clsconsultar();
    $insertarDatos->fntvalidacionconsulta();
    $insertarDatos->fntconsultar();

?>