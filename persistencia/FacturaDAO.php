<?php

class FacturaDAO{
    private $idFactura ;
    private $Administrador_idAdministrador ;
    private $Apartamento_torre ;
    private $Apartamento_apartamento ;
    private $fecha_cobro;
    private $fecha_pago;
    private $pago_sin_interes ;
    private $interes;
    private $pago_total;
    private $porcentaje_interes;

    public function __construct($idFactura  = "", $Administrador_idAdministrador  = "", $Apartamento_torre = "",
     $Apartamento_apartamento = "", $fecha_cobro = "", $fecha_pago = "",
     $pago_sin_interes = "", $interes = "", $pago_total = "", $porcentaje_interes = ""){

        $this -> idFactura  = $idFactura ;
        $this -> Administrador_idAdministrador  = $Administrador_idAdministrador ;
        $this -> Apartamento_torre  = $Apartamento_torre ;
        $this -> Apartamento_apartamento  = $Apartamento_apartamento ;
        $this -> fecha_cobro = $fecha_cobro;
        $this -> fecha_pago = $fecha_pago;
        $this -> pago_sin_interes  = $pago_sin_interes ;
        $this -> interes = $interes;
        $this -> pago_total = $pago_total;
        $this -> porcentaje_interes = $porcentaje_interes;
    }

   
    
    public function consultar_facturas_por_apartamento($torre, $apartamento) {
        return "select idFactura, Administrador_idAdministrador, Apartamento_torre, Apartamento_apartamento, fecha_cobro, fecha_pago, pago_sin_interes, interes, pago_total, porcentaje_interes
                from factura
                where Apartamento_torre = '$torre' AND Apartamento_apartamento = '$apartamento'
                order by fecha_cobro ASC";
    }

    public function registrar_factura_pagada($idFactura, $fecha_actual){
        return "update factura
                set fecha_pago = '$fecha_actual'
                where idFactura = '$idFactura'";
    }

    public function Nueva_factura($Administrador_idAdministrador, $Apartamento_torre, 
        $Apartamento_apartamento, $fecha_cobro, $fecha_pago, 
        $pago_sin_interes, $interes, $pago_total, $porcentaje_interes) {
        if( $fecha_pago == NULL){
            $fecha_pago_sql = "NULL";
        }
        else{
            $fecha_pago_sql = "'$fecha_pago'";
        }
        return "insert into `factura` (
            `Administrador_idAdministrador`, `Apartamento_torre`, `Apartamento_apartamento`,
            `fecha_cobro`, `fecha_pago`, `pago_sin_interes`, `interes`, `pago_total`, `porcentaje_interes`
        ) values (
            '$Administrador_idAdministrador', '$Apartamento_torre', '$Apartamento_apartamento',
            '$fecha_cobro', $fecha_pago_sql, $pago_sin_interes, $interes, $pago_total, $porcentaje_interes
        );";
    }
    
}
