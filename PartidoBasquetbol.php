<?php

class PartidoBasquetbol extends Partido {
    private $infraccionesEquipo1;
    private $infraccionesEquipo2;
    private $coeficientePenalizacion;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $infraccionesEquipo1 = 0, $infraccionesEquipo2 = 0, $coeficientePenalizacion = 0.75) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->setInfraccionesEquipo1($infraccionesEquipo1);
        $this->setInfraccionesEquipo2($infraccionesEquipo2);
        $this->setCoeficientePenalizacion($coeficientePenalizacion);
    }

    public function setInfraccionesEquipo1($infracciones) {
        $this->infraccionesEquipo1 = $infracciones;
    }

    public function getInfraccionesEquipo1() {
        return $this->infraccionesEquipo1;
    }

    public function setInfraccionesEquipo2($infracciones) {
        $this->infraccionesEquipo2 = $infracciones;
    }

    public function getInfraccionesEquipo2() {
        return $this->infraccionesEquipo2;
    }

    public function setCoeficientePenalizacion($coeficiente) {
        $this->coeficientePenalizacion = $coeficiente;
    }

    public function getCoeficientePenalizacion() {
        return $this->coeficientePenalizacion;
    }
}
