<?php

class PartidoFutbol extends Partido {
    private $categoriaPartido;
    private $coeficientesCategorias;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $categoriaPartido) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->setCategoriaPartido($categoriaPartido);
        $this->coeficientesCategorias = [
            'Menores' => 0.13,
            'Juveniles' => 0.19,
            'Mayores' => 0.27
        ];
    }

    public function setCategoriaPartido($categoria) {
        $this->categoriaPartido = $categoria;
    }

    public function getCategoriaPartido() {
        return $this->categoriaPartido;
    }

    public function calcularCoeficiente($objEquipo) {
        $coeficienteBase = $this->getCoefBase();
    
        if (!array_key_exists($this->getCategoriaPartido(), $this->coeficientesCategorias)) {
            return null; // O algún otro valor predeterminado
        }
    
        $coeficienteCategoria = $this->coeficientesCategorias[$this->getCategoriaPartido()];
    
        if ($objEquipo === $this->getObjEquipo1()) {
            return $coeficienteBase * $this->getCantGolesE1() * $coeficienteCategoria;
        } elseif ($objEquipo === $this->getObjEquipo2()) {
            return $coeficienteBase * $this->getCantGolesE2() * $coeficienteCategoria;
        } else {
            return null; // O algún otro valor predeterminado
        }
    }
    
}