<?php
class Factura {
    private $id;
    private $dministrador;
    private $torre;
    private $apartamento;
    private $fecha_cobro;
    private $fecha_pago;
    private $pago_sin_interes;
    private $pago_con_interes;

    public function __construct(
        $id,
        $dministrador,
        $torre,
        $apartamento,
        $fecha_cobro,
        $fecha_pago,
        $pago_sin_interes,
        $pago_con_interes
    ) {
        $this->id = $id;
        $this->dministrador = $dministrador;
        $this->torre = $torre;
        $this->apartamento = $apartamento;
        $this->fecha_cobro = $fecha_cobro;
        $this->fecha_pago = $fecha_pago;
        $this->pago_sin_interes = $pago_sin_interes;
        $this->pago_con_interes = $pago_con_interes;
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
    public function setTOrre($torre) {
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

    public function getPagoConInteres() {
        return $this->pago_con_interes;
    }
    public function setPagoConInteres($pago_con_interes) {
        $this->pago_con_interes = $pago_con_interes;
    }
}
?>
