<?php

class Vehiculo{
    public $marca;
    public $modelo;
    public $anyo;
    public $combustible;
    public $consumo;

    function __construct($marca,$modelo,$anyo,$combustible,$consumo){
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setAnyo($anyo);
        $this->setCombustible($combustible);
        $this->setconsumo($consumo);
    }

    function getMarca(){
        return $this->marca;
    }

    function setMarca($marca="marca por defecto"){
        $this->marca = $marca;
    }

    function getModelo(){
        return $this->modelo;
    }

    function setModelo($modelo="modelo por defecto"){
        $this->modelo = $modelo;
    }

    function getAnyo(){
        return $this->anyo;
    }

    function setAnyo($anyo="anyo por defecto"){
        $this->anyo = $anyo;
    }

    function getCombustible(){
        return $this->combustible;
    }

    function setCombustible($combustible="combustible por defecto"){
        $this->combustible = $combustible;
    }

        function getconsumo(){
        return $this->consumo;
    }

    function setconsumo($consumo="consumo por defecto"){
        $this->consumo = $consumo;
    }

    public function __toString() {
        return "Marca: {$this->marca}, Modelo: {$this->modelo}, Año: {$this->anyo}, Combustible: {$this->combustible}, Consumo: {$this->consumo} L/100km";
    }
}

?>