    <?php 
    if(isset($_GET["sesion"])){
        if($_GET["sesion"] == "false"){
            session_destroy();
        }
    }
    $error=false;
    if(isset($_POST["autenticar"])){
        $correo = $_POST["correo"];
        $clave = $_POST["clave"];
        $admin = new Admin("", "", "", $correo, $clave);
        if($admin -> autenticar()){
            $_SESSION["id"] = $admin -> getId();
            $_SESSION["rol"] = "admin";
            header("Location: ?pid=" . base64_encode("presentacion/Sesion_Admin.php"));
            exit;
            
        }else {
                $propietario = new propietario("", "", "", $correo, $clave);
                if($propietario -> autenticar()){
                    $_SESSION["id"] = $propietario -> getId();
                    $_SESSION["rol"] = "propietario";
                    header("Location: ?pid=" . base64_encode("presentacion/Sesion_Propietario.php"));
                    exit;
                }else{
                    $error=true;
                }
            
        }
    }
    include ("encabezado.php");
    ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color:rgb(61, 135, 85);">
                        <h4 class="text-white mb-0">
                            <i class="fas fa-lock me-2"></i> Inicio de sesion
                        </h4>
                    </div>
                    <div class="card-body" style="font-family: 'Segoe UI', sans-serif;">
                        <form action="?pid=<?php echo base64_encode("presentacion/Login.php") ?>" method="post">
                            <div class="mb-3">								
                                <input type="email" class="form-control" name="correo" placeholder="Correo electronico" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="clave" placeholder="Contraseña" required>
                            </div>							
                            <div class="d-grid">
                                <button type="submit" class="btn text-white" style="background-color:rgb(61, 135, 85);" name="autenticar">
                                    <i class="fas fa-sign-in-alt me-1"></i> Ingresar
                                </button>
                            </div>
                            
                        </form>
                        <?php 
                        if ($error ){
                            echo "<div class='alert alert-danger mt-3 text-center' role='alert'>
                                    Credenciales incorrectas
                                </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>