<?php 
include ("encabezado.php");
include ("Nav.php");
$mensaje = " ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $torre = $_POST["torre"];
    $apartamento = $_POST["apartamento"];
    $fecha_cobro = $_POST["fecha_cobro"];
    $porcentaje_interes = $_POST["porcentaje_interes"];
    $cantidad = $_POST["cantidad"];
    
    $idadmin= $_SESSION["id"];

    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha_cobro) && strtotime($fecha_cobro)) {
        $factura = new Factura();
        $factura->Nueva_factura($idadmin, $torre, $apartamento, $fecha_cobro, $porcentaje_interes, $cantidad);

        $mensaje = "<div class='alert alert-success mt-3'>Factura registrada correctamente.</div>";

    } else {
        $mensaje = "<div class='alert alert-danger  mt-3'>El formato correcto es YYYY-MM-DD.</div>";
    }
} 

?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color:rgb(61, 135, 85);">
                    <h4 class="text-white mb-0"><i class="fas fa-briefcase me-2"></i> Registrar factura</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="torre" placeholder="Torre" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="apartamento" placeholder="Apartamento" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="fecha_cobro" placeholder="Fecha cobro (YYYY-MM-DD)" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="porcentaje_interes" placeholder="Porcentaje anual de interes" required min="0"  max="100">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="cantidad" placeholder="Valor factura" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn text-white" style="background-color:rgb(61, 135, 85);">
                                <i class="fas fa-check me-1"></i> Registrar factura
                            </button>
                        </div>
                    </form>
                    <?php echo $mensaje; ?>
                </div>
            </div>
        </div>
    </div>
</div>
