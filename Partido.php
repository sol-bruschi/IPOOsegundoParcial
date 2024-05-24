<?php
class Partido {
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

      //CONSTRUCTOR
      public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2) {
        $this->idpartido = $idpartido;
        $this->fecha = $fecha;
        $this->objEquipo1 = $objEquipo1;
        $this->cantGolesE1 = $cantGolesE1;
        $this->objEquipo2 = $objEquipo2;
        $this->cantGolesE2 = $cantGolesE2;
        $this->coefBase = 0.5;
    }


    // Métodos de acceso y modificación
    public function setIdpartido($idpartido) {
        $this->idpartido = $idpartido;
    }

    public function getIdpartido() {
        return $this->idpartido;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setCantGolesE1($cantGolesE1) {
        $this->cantGolesE1 = $cantGolesE1;
    }

    public function getCantGolesE1() {
        return $this->cantGolesE1;
    }

    public function setCantGolesE2($cantGolesE2) {
        $this->cantGolesE2 = $cantGolesE2;
    }

    public function getCantGolesE2() {
        return $this->cantGolesE2;
    }

    public function setObjEquipo1($objEquipo1) {
        $this->objEquipo1 = $objEquipo1;
    }

    public function getObjEquipo1() {
        return $this->objEquipo1;
    }

    public function setObjEquipo2($objEquipo2) {
        $this->objEquipo2 = $objEquipo2;
    }

    public function getObjEquipo2() {
        return $this->objEquipo2;
    }

    public function setCoefBase($coefBase) {
        $this->coefBase = $coefBase;
    }

    public function getCoefBase() {
        return $this->coefBase;
    }

    // Método para determinar el equipo ganador o empate
    public function darEquipoGanador() {
        $equipoGanador = [];

        if ($this->cantGolesE1 > $this->cantGolesE2) {
            $equipoGanador[] = $this->objEquipo1;
        } elseif ($this->cantGolesE1 < $this->cantGolesE2) {
            $equipoGanador[] = $this->objEquipo2;
        } else {
            $equipoGanador[] = $this->objEquipo1;
            $equipoGanador[] = $this->objEquipo2;
        }

        return $equipoGanador;
    }

    // Método para calcular el coeficiente del partido
    public function coeficientePartido() {
        $coeficienteEquipo1 = $this->coefBase * $this->cantGolesE1 * $this->objEquipo1->getCantJugadores();
        $coeficienteEquipo2 = $this->coefBase * $this->cantGolesE2 * $this->objEquipo2->getCantJugadores();        

        return ['equipo1' => $coeficienteEquipo1, 'equipo2' => $coeficienteEquipo2];
    }



    public function __toString() {
        $cadena = "idpartido: ".$this->getIdpartido()."\n";
        $cadena .= "Fecha: ".$this->getFecha()."\n";
        $cadena .= "\n"."--------------------------------------------------------"."\n";
        $cadena .= "<Equipo 1> "."\n".$this->getObjEquipo1()."\n";
        $cadena .= "Cantidad Goles E1: ".$this->getCantGolesE1()."\n";
        $cadena .= "\n"."--------------------------------------------------------"."\n";
        $cadena .= "<Equipo 2> "."\n".$this->getObjEquipo2()."\n";
        $cadena .= "Cantidad Goles E2: ".$this->getCantGolesE2()."\n";
        $cadena .= "\n"."--------------------------------------------------------"."\n";
        return $cadena;
    }
}

