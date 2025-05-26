<?php
require_once("persistencia/Conexion.php");
require_once ("persistencia/ApartamentoDAO.php");


class Apartamento{
    private $torre ;
    private $apartamento;
    private $Propietario_idPropietario  ;
    private $saldo;
    
    public function gettorre(){
        return $this -> torre;
    }
    
    public function getapartamento(){
        return $this -> apartamento;
    }
    
    public function getPropietario_idPropietario(){
        return $this -> Propietario_idPropietario;
    }
    
    public function getsaldo(){
        return $this -> saldo;
    }

     public function __construct($torre = "", $apartamento = "", $Propietario_idPropietario = 0, $saldo = 0){
        $this -> torre = $torre;
        $this -> apartamento = $apartamento;
        $this -> Propietario_idPropietario = $Propietario_idPropietario;
        $this -> saldo = $saldo;
    }
    
    public function consultar_por_id($id=""){
        $conexion = new Conexion();
        $apartamentoDAO = new ApartamentoDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($apartamentoDAO -> consultar_apartamentos_por_id($id));
        $apartamentos = array();
        while(($datos = $conexion -> registro()) != null){
           $apartamento = new Apartamento(
            $datos[0], 
            $datos[1], 
            $datos[2],
            $datos[3]);
            array_push($apartamentos, $apartamento);
        }
        $conexion -> cerrar();
        return $apartamentos;
    }
    
    
}



?>