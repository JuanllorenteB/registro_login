<?php
session_start();
session_destroy();
echo '<script>alert("Cerraste Sesion");
window.location = "../view/login.php";</script>';
?>