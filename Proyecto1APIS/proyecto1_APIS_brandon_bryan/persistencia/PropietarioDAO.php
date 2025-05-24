<?php

class PropietarioDAO{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $fecha_nacimiento;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $fecha_nacimiento = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> fecha_nacimiento = $fecha_nacimiento;
    }

    public function autenticar(){
        return "select idPropietario
                from propietario  
                where correo = '" . $this -> correo . "' and clave = '" . md5($this -> clave) . "'";
    }
    
    public function consultar(){
        return "select nombre, apellido, correo
                from propietario
                where idPropietario = '" . $this -> id . "'";
    }
}
