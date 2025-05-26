<?php 
session_start();
require_once("logica/Admin.php");
require_once("logica/Apartamento.php");
require_once("logica/Factura.php");
require_once("logica/Persona.php"); 
require_once("logica/Propietario.php");
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Los rosales cojunto residencial</title>
<!-- Bootstrap -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet">


<!-- FontAwesome -->
<link href="https://use.fontawesome.com/releases/v6.7.2/css/all.css"
	rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
<?php 

$paginas_sin_autenticacion = array(
    "presentacion/Login.php",
);

$paginas_con_autenticacion = array(
    "presentacion/Sesion_Admin.php",
    "presentacion/Sesion_Propietario.php",
    "presentacion/tabla_propietarios.php",
    "presentacion/tabla_apartamentos.php",
    "presentacion/tabla_facturas.php",
    "presentacion/pago.php",
    "presentacion/cerrarsesion.php",
    "presentacion/cambiardatos.php",
    "presentacion/factura.php",




);
if(!isset($_GET["pid"])){
    include ("presentacion/Login.php");
}else{

    $pid = base64_decode($_GET["pid"]);
    if(in_array($pid, $paginas_sin_autenticacion)){
        include $pid;
    }else if(in_array($pid, $paginas_con_autenticacion)){
        if(!isset($_SESSION["id"])){
            include "presentacion/Login.php";
        }else{
            include $pid;
        }
    }else{
        echo "error 404";   
    }
}

    
?>
</body>
</html>