<?php

if (!isset($_SESSION["id"])) {
    header("Location: ?pid=" . base64_encode("presentacion/Login.php"));
    exit;
}

$rol = $_SESSION["rol"];
$id = $_SESSION["id"];
$mensaje = "";

if ($rol == "admin") {
    //cargar datos para placeholders

} else if ($rol == "propietario") {
    //cargar datos para placeholders
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($rol == "admin") {
        // Actualizar
    } else if ($rol == "propietario") {
        // Actualizar
    }
    $mensaje = "Datos actualizados correctamente";
}

?>
<?php 
include ("encabezado.php");
include ("Nav.php");
?>



<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color:rgb(61, 135, 85);">
                    <h4 class="text-white mb-0"><i class="fas fa-briefcase me-2"></i> Actualizar Datos</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="nombre" placeholder="nombre" >
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="apellido" placeholder="apellido" >
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="correo" placeholder="correo" >
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn text-white" style="background-color:rgb(61, 135, 85);">
                                <i class="fas fa-check me-1"></i> Guardar cambios
                            </button>
                        </div>
                    </form>
                    <?php echo $mensaje; ?>
                </div>
            </div>
        </div>
    </div>
</div>