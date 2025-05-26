<?php
$direccion_inicio="";
if($_SESSION["rol"]== "admin"){
 $direccion_inicio = '?pid=' . base64_encode('presentacion/Sesion_Admin.php');
}elseif($_SESSION["rol"]== "propietario")
 $direccion_inicio = '?pid=' . base64_encode('presentacion/Sesion_Propietario.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent mt-0">
  <div class="container" style="background-color:rgb(61, 135, 85); border-radius: 8px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $direccion_inicio;?>"><i class="fas fa-home"></i> Inicio</a>
        </li>
        
         <li class="nav-item">
            <a class="nav-link" 
                <?php
                if ($_SESSION["rol"] == "admin") {
                    echo 'href="?pid=' . base64_encode("presentacion/tabla_propietarios.php") . '"';
                } elseif ($_SESSION["rol"] == "propietario") {
                    echo 'href="?pid=' . base64_encode("presentacion/tabla_apartamentos.php") . '"';
                }
                ?>
            >  
                <i class="fas fa-graduation-cap"></i> Visualizacion
            </a>
            </li>
            <?php
            if ($_SESSION["rol"] == "admin") {
                echo '<li class="nav-item">
          <a class="nav-link" href="?pid=' . base64_encode("presentacion/pago.php") . '"><i class="fas fa-briefcase"></i> Pago</a>
        </li>';
               echo '<li class="nav-item">
          <a class="nav-link" href="?pid=' . base64_encode("presentacion/factura.php") . '"><i class="fas fa-briefcase"></i> Factura</a>
        </li>';
            }
            ?> 
      </ul>
      <div class="dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="profileDropdown" data-bs-toggle="dropdown">
          <i class="fas fa-user"></i> hola
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
          <li><a class="dropdown-item" href="?pid=<?php echo base64_encode("presentacion/cambiardatos.php"); ?>">Cambiar datos</a></li>
          <li><a class="dropdown-item" href="?pid=<?php echo base64_encode("presentacion/cerrarsesion.php"); ?>">Cerrar sesión</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

