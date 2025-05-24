<?php
require_once("persistencia/Conexion.php");
require_once("logica/Persona.php");
require_once("persistencia/PropietarioDAO.php");

class Propietario extends Persona {

    private $fecha_nacimiento = "";
    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $fecha_nacimiento = ""){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this -> fecha_nacimiento = $fecha_nacimiento;
    }
    
    public function autenticar(){
        $conexion = new Conexion();
        $propetarioDAO = new PropietarioDAO("","","", $this -> correo, $this -> clave);
        $conexion -> abrir();
        $conexion -> ejecutar($propetarioDAO -> autenticar());
        if($conexion -> filas() == 1){            
            $this -> id = $conexion -> registro()[0];
            $conexion->cerrar();
            return true;
        }else{
            $conexion->cerrar();
            return false;
        }
    }

    
}