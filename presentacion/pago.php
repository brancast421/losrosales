<?php

if (!isset($_SESSION["id"]) || $_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/Login.php"));
    exit;
}
include("encabezado.php");
include("Nav.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["torre"], $_POST["apartamento"], $_POST["valor"])) {
    require_once("persistencia/Conexion.php");
    require_once("persistencia/ApartamentoDAO.php");
    require_once("logica/Factura.php");
    require_once("persistencia/FacturaDAO.php");

    $torre = $_POST["torre"];
    $apartamento = $_POST["apartamento"];
    $valor = intval($_POST["valor"]);
    $apartamentoDAO = new ApartamentoDAO();
    $conexion = new Conexion();
    $conexion->abrir();
    $facturaDAO = new FacturaDAO();
    $consulta = $apartamentoDAO->consultar_valor_saldo_apartamento($torre, $apartamento);
    $conexion->ejecutar($consulta);
    $fila = $conexion->registro();

    if ($fila) {
        $saldo_actual = intval($fila[0]);
        $nuevo_saldo = $saldo_actual + $valor;

        $update = $apartamentoDAO->actualizar_saldo_apartamento($torre, $apartamento, $nuevo_saldo);
        $conexion->ejecutar($update);

        $factura = new Factura();
        $facturas = $factura->consultar_por_apartamento($torre, $apartamento);

        $saldo_para_pagar = $nuevo_saldo;
        $facturas_pagadas = 0;

        foreach ($facturas as $factura) {
            if ($factura->getFechaPago() == null) {
                $pago_total = $factura->getpagototal();

                if ($saldo_para_pagar >= $pago_total) {
                    $fecha_actual = date("Y-m-d");
                    $idFactura = $factura->getId();

                    $updateFactura = $facturaDAO->registrar_factura_pagada($idFactura, $fecha_actual);
                    $conexion->ejecutar($updateFactura);

                    $saldo_para_pagar -= $pago_total;
                    $facturas_pagadas++;
                } else {
                    break;
                }
            }
        }

        $updateSaldoFinal = $apartamentoDAO->actualizar_saldo_apartamento($torre, $apartamento, $saldo_para_pagar);
        $conexion->ejecutar($updateSaldoFinal);

        $mensaje = "<div class='alert alert-success mt-3'>Pago registrado correctamente. Nuevo saldo: $saldo_para_pagar.<br>Facturas pagadas: $facturas_pagadas</div>";
    } else {
        $mensaje = "<div class='alert alert-danger mt-3'>No se encontró el apartamento.</div>";
    }

    $conexion->cerrar();
}
?>

<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color:rgb(61, 135, 85);">
                    <h4 class="text-white mb-0"><i class="fas fa-briefcase me-2"></i> Registrar Pago</h4>
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
                            <input type="number" class="form-control" name="valor" placeholder="Valor a pagar" required min="1">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn text-white" style="background-color:rgb(61, 135, 85);">
                                <i class="fas fa-check me-1"></i> Registrar Pago
                            </button>
                        </div>
                    </form>
                    <?php echo $mensaje; ?>
                </div>
            </div>
        </div>
    </div>
</div>