<?php
require_once 'vehiculo.php';
class Moto extends Vehiculo{
    public $cilindrada;

public function __construct($marca, $modelo, $anyo, $combustible, $consumo, $cilindrada) {
    parent::__construct($marca, $modelo, $anyo, $combustible, $consumo);
    $this->cilindrada = $cilindrada;
}
public function getCilindrada() {
    return $this->cilindrada;
}

public function setCilindrada($cilindrada) {
    $this->cilindrada = $cilindrada;
}
public function __toString() {
    return parent::__toString() . ", cilindrada: {$this->cilindrada}";
}
public function getDatosCSV() {
    return [
        'moto',
        $this->marca, 
        $this->modelo, 
        $this->anyo, 
        $this->combustible, 
        $this->consumo, 
        $this->cilindrada
    ];
}

}
?>