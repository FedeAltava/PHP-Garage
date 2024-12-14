<?php
require_once 'vehiculo.php';
class Coche extends Vehiculo{
    public $puertas;


public function __construct($marca, $modelo, $anyo, $combustible, $consumo, $puertas) {
    parent::__construct($marca, $modelo, $anyo, $combustible, $consumo);
    $this->puertas = $puertas;
}
public function getPuertas() {
    return $this->puertas;
}

public function setPuertas($puertas) {
    $this->puertas = $puertas;
}
public function __toString() {
    return parent::__toString() . ", Puertas: {$this->puertas}";
}
public function getDatosCSV() {
    return [
        'coche',
        $this->marca, 
        $this->modelo, 
        $this->anyo, 
        $this->combustible, 
        $this->consumo, 
        $this->puertas
    ];
}

}
?>