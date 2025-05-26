<?php

class ApartamentoDAO{
    private $torre;
    private $apartamento;
    private $Propietario_idPropietario;
    private $saldo;

    public function __construct($torre = "", $apartamento = "", $Propietario_idPropietario = 0, $saldo = 0){
        $this -> torre = $torre;
        $this -> apartamento = $apartamento;
        $this -> Propietario_idPropietario = $Propietario_idPropietario;
        $this -> saldo = $saldo;
    }

    public function consultar_apartamentos_por_id($id = ""){
        return "select torre, apartamento, Propietario_idPropietario, saldo
                from apartamento
                where Propietario_idPropietario = '" . $id . "'";
    }
    public function consultar_valor_saldo_apartamento($torre = "", $apartamento = ""){
        return "select saldo
                from apartamento
                where torre = '" . $torre . "' and apartamento = '" . $apartamento . "'";
    }
    public function actualizar_saldo_apartamento($torre = "", $apartamento = "", $nuevo_saldo = 0){
        return "update apartamento
                set saldo = '" . $nuevo_saldo . "'
                where torre = '" . $torre . "' and apartamento = '" . $apartamento . "'";
                
    }
    
}
