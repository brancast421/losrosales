<?php
require_once("persistencia/Conexion.php");
require_once ("persistencia/FacturaDAO.php");

class Factura {
    private $id;
    private $dministrador;
    private $torre;
    private $apartamento;
    private $fecha_cobro;
    private $fecha_pago;
    private $pago_sin_interes;
    private $interes;
    private $pago_total;
    private $porcentaje_interes;

    public function __construct(
        $id = "",
        $dministrador = "",
        $torre = "",
        $apartamento = "",
        $fecha_cobro = "",
        $fecha_pago = "",
        $pago_sin_interes = "",
        $interes = "",
        $pago_total = "",
        $porcentaje_interes = ""
    ) {
        $this->id = $id;
        $this->dministrador = $dministrador;
        $this->torre = $torre;
        $this->apartamento = $apartamento;
        $this->fecha_cobro = $fecha_cobro;
        $this->fecha_pago = $fecha_pago;
        $this->pago_sin_interes = $pago_sin_interes;
        $this->interes = $interes;
        $this->pago_total = $pago_total;
        $this->porcentaje_interes = $porcentaje_interes;
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getDministrador() {
        return $this->dministrador;
    }
    public function setDministrador($dministrador) {
        $this->dministrador = $dministrador;
    }

    public function getTorre() {
        return $this->torre;
    }
    public function setTorre($torre) {
        $this->torre = $torre;
    }

    public function getApartamento() {
        return $this->apartamento;
    }
    public function setApartamento($apartamento) {
        $this->apartamento = $apartamento;
    }

    public function getFechaCobro() {
        return $this->fecha_cobro;
    }
    public function setFechaCobro($fecha_cobro) {
        $this->fecha_cobro = $fecha_cobro;
    }

    public function getFechaPago() {
        return $this->fecha_pago;
    }
    public function setFechaPago($fecha_pago) {
        $this->fecha_pago = $fecha_pago;
    }

    public function getPagoSinInteres() {
        return $this->pago_sin_interes;
    }
    public function setPagoSinInteres($pago_sin_interes) {
        $this->pago_sin_interes = $pago_sin_interes;
    }
    public function getInteres() {
        return $this->interes;
    }
    public function setInteres($interes) {
        $this->interes = $interes;
    }

    public function getPagoTotal() {
        return $this->pago_total;
    }
    public function getporcentaje_interes() {
        return $this->porcentaje_interes;
    }
    public function setPagoTotal($pago_total) {
        $this->pago_total = $pago_total;
    }

    public function consultar_por_apartamento($torre = "", $apartamento = "") {
        $conexion = new Conexion();
        $facturaDAO = new FacturaDAO();
        $conexion->abrir();
        $conexion->ejecutar($facturaDAO->consultar_facturas_por_apartamento($torre, $apartamento));
        $facturas = array();
        while (($datos = $conexion->registro()) != null) {
            $factura = new Factura(
                $datos[0], 
                $datos[1], 
                $datos[2], 
                $datos[3], 
                $datos[4], 
                $datos[5], 
                $datos[6], 
                $datos[7], 
                $datos[8],
                $datos[9]
            );
            array_push($facturas, $factura);
        }
        $conexion->cerrar();
        return $facturas;
    }

    public function Nueva_factura($Administrador_idAdministrador, $Apartamento_torre,
     $Apartamento_apartamento, $fecha_cobro, $porcentaje_interes, $pago_sin_interes){

        $conexion = new Conexion();
        $conexion->abrir();

        $sql = $this->calcular_datos_facutura($Administrador_idAdministrador, $Apartamento_torre, 
        $Apartamento_apartamento, $fecha_cobro, $porcentaje_interes, $pago_sin_interes);
        
        $conexion->ejecutar($sql);
        $conexion->cerrar();
    }


    public function calcular_datos_facutura($Administrador_idAdministrador, $Apartamento_torre, $Apartamento_apartamento,
    $fecha_cobro, $porcentaje_interes, $pago_sin_interes){
        
        $apartamento = new ApartamentoDAO();

        $conexion = new Conexion();
        $conexion->abrir();

        $sql = $apartamento->consultar_valor_saldo_apartamento($Apartamento_torre, $Apartamento_apartamento);

        $conexion->ejecutar($sql);
        $fila = $conexion->registro();
        $saldo_apartamento = $fila[0]; 

      

        $fecha_cobro_dt = new DateTime($fecha_cobro);
        $hoy = new DateTime();
        $diferencia = $fecha_cobro_dt->diff($hoy);
        $dias_de_interes = $diferencia->days;

        $interes = (($porcentaje_interes/100) / 360) * $dias_de_interes * $pago_sin_interes;
        $pago_total = $pago_sin_interes + $interes;

        $facturaDAO = new FacturaDAO();

        if($saldo_apartamento < $pago_sin_interes){
            $fecha_pago = NULL;
        }else
        if($saldo_apartamento >= $pago_sin_interes){
            $fecha_pago = $hoy->format('Y-m-d');
            $saldo_apartamento -= $pago_sin_interes;
        }
        $conexion->ejecutar( $apartamento->actualizar_saldo_apartamento($Apartamento_torre, $Apartamento_apartamento,  $saldo_apartamento));
        $conexion->cerrar();

        return $facturaDAO->Nueva_factura($Administrador_idAdministrador, $Apartamento_torre, 
            $Apartamento_apartamento, $fecha_cobro, $fecha_pago, 
            $pago_sin_interes, $interes, $pago_total, $porcentaje_interes);
        
    }

}
?>
