<?php
include_once '../model/conexion.php';
include_once '../model/registrarse-validacion.php';


$objclsregistro = new clsregistro();
$objclsregistro-> fntvalidaciones();
$objclsregistro->fntqueryregistro();

?>