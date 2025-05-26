<?php 
include ("encabezado.php");
include ("Nav.php");
$torre = $_GET["torre"];
$apartamento = $_GET["apartamento"];
?>
<div class="container pt-2">
<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header"><h4>Facturas</h4></div>
            <div class="card-body">
                <?php 
                $Factura = new Factura();
                $Facturas = $Factura->consultar_por_apartamento($torre, $apartamento);
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead class='table-success'>
                        <tr>
                            <th>Fecha cobro</th>
                            <th>Fecha pago</th>
                            <th>interes anual</th>
                            <th>Pago sin interes</th>
                            <th>interes</th>
                            <th>pago total</th>
                        </tr>
                      </thead>
                      <tbody>";
                foreach ($Facturas as $fact) {
                    echo "<tr>
                            <td>" . $fact->getFechaCobro() . "</td>
                            <td>" . $fact->getFechaPago() . "</td>
                            <td>" . $fact->getporcentaje_interes() ." % </td>
                            <td>" . $fact->getPagoSinInteres() . "</td>
                            <td>" . $fact->getInteres() . "</td>
                            <td>" . $fact->getpagototal() . "</td>
                          </tr>";
                }
                echo "</tbody></table>";
                echo "</div>";
                ?>			
            </div>
        </div>
    </div>
</div>
</div>