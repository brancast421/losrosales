<?php

if (!isset($_SESSION["id"]) || $_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/Login.php"));
    exit;
}
include("encabezado.php");
include("Nav.php");
session_start();
session_unset();
session_destroy();
header("Location: ?pid=" . base64_encode("presentacion/Login.php"));
exit;
?>