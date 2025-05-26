<?php
if($_SESSION["rol"] != "propietario"){
    header("Location: ?pid=" . base64_encode("presentacion/Login.php"));
}
?>
<div class="container py-4">

<?php 
include ("encabezado.php");
include ("Nav.php");
?>

<h2 >tabla de apartamentos </h2>



</div> 

    