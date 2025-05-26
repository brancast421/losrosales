<?php
if($_SESSION["rol"] != "admin"){
    header("Location: ?pid=" . base64_encode("presentacion/Login.php"));
}
?>
<div>
<?php 
include ("encabezado.php");
include ("Nav.php");
?>




</div> 

