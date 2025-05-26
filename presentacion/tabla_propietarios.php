<?php 
include ("encabezado.php");
include ("Nav.php");
?>
<div class="container pt-2">
<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header"><h4>Propietarios</h4></div>
            <div class="card-body">
                <?php 
                $propietario = new Propietario();
                $propietarios = $propietario -> consultar_propietarios();
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead class='table-success'>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Fecha de Nacimiento</th>
                            <th  class='text-center'>Apartamentos</th>
                        </tr>
                      </thead>
                      <tbody>";
                foreach ($propietarios as $pro) {
                    echo "<tr>
                            <td>" . $pro->getId() . "</td>
                            <td>" . $pro->getNombre() . "</td>
                            <td>" . $pro->getApellido() . "</td>
                            <td>" . $pro->getCorreo() . "</td>
                            <td>" . $pro->getFecha() . "</td>
                            <td  class='text-center'>
                                    <a href='?pid=" . base64_encode("presentacion/tabla_apartamentos.php") 
                                    . "&id=" . $pro->getId() . "'>
                                    <button type='button' class='btn btn-secondary'><i class='fa-solid fa-building'></i></button>
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

