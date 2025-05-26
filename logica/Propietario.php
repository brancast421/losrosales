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

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getFecha() {
        return $this->fecha_nacimiento;
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

    public function consultar_propietarios(){
        $conexion = new Conexion();
        $propietarioDAO = new PropietarioDAO();
        $conexion->abrir();
        $conexion->ejecutar($propietarioDAO->consultar_propietarios());

        $propietarios = array();
        while ($registro = $conexion->registro()) {
            $propietarios[] = new Propietario(
                $registro[0], 
                $registro[1], 
                $registro[2], 
                $registro[3], 
                "",           
                $registro[4]  
            );
        }
        $conexion->cerrar();
        return $propietarios;
    }

    
}