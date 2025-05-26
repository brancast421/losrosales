<?php 
include ("encabezado.php");
include ("Nav.php");
if($_SESSION["rol"] == "admin"){
    $idPropietario = $_GET["id"];
}
else{
    $idPropietario = $_SESSION["id"]; 
}
?>
<div class="container pt-2">
<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header"><h4>Apartamentos</h4></div>
            <div class="card-body">
                <?php 
                $Apartamento = new Apartamento();
                $Apartamentos = $Apartamento->consultar_por_id($idPropietario);
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead class='table-success'>
                        <tr>
                            <th>Torre</th>
                            <th>Apartamento</th>
                            <th>saldo</th>
                            <th  class='text-center'>Facturas</th>

                        </tr>
                      </thead>
                      <tbody>";
                foreach ($Apartamentos as $apa) {
                    echo "<tr>
                            <td>" . $apa->gettorre() . "</td>
                            <td>" . $apa->getapartamento() . "</td>
                            <td>" . $apa->getsaldo() . "</td>
                            <td  class='text-center'>
                                     <a href='?pid=" . base64_encode("presentacion/tabla_facturas.php") 
                                    . "&torre=" . $apa->gettorre()  . "&apartamento=" . $apa->getapartamento() ."'>
                                    <button type='button' class='btn btn-secondary'><i class='fa-solid fa-file-invoice'></i></button>
                                    </a>
                                    
                            </td>   
                                                  
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