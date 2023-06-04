<?php
include_once '../model/conexion.php';
include_once '../model/login-validacion.php';


$objclslogin = new clslogin();
$objclslogin->fntquerylogin();
$objclslogin->fntvalidaciones();

?>