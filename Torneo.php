<?php

class Torneo {
    private $colPartidos;
    private $importePremio;

    // Constructor
    public function __construct($importePremio) {
        $this->setColPartidos([]);
        $this->setImportePremio($importePremio);
    }

     // Métodos de acceso y modificación
     public function setColPartidos($colPartidos) {
        $this->colPartidos = $colPartidos;
    }

    public function getColPartidos() {
        return $this->colPartidos;
    }

    public function setImportePremio($importePremio) {
        $this->importePremio = $importePremio;
    }

    public function getImportePremio() {
        return $this->importePremio;
    }

    // Agrega un partido a la coleccion de partidos
    public function agregarPartido($objPartido) {
        $colPartidos = $this->getColPartidos();
        $colPartidos[] = $objPartido;
        $this->setColPartidos($colPartidos);
    }

  // Ingresa nuevo partido al torneo
public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido) {
    // Verificar que los equipos tengan la misma categoría e igual cantidad de jugadores
    if ($this->verificarEquipos($objEquipo1, $objEquipo2)) {
        // Crear la instancia de la clase Partido según el tipo de partido
        $nuevoPartido = null;
        if ($tipoPartido === 'futbol') {
            $nuevoPartido = new PartidoFutbol(count($this->colPartidos) + 1, $fecha, $objEquipo1, 0, $objEquipo2, 0, '');
        } elseif ($tipoPartido === 'basquetbol') {
            $nuevoPartido = new PartidoBasquetbol(count($this->colPartidos) + 1, $fecha, $objEquipo1, 0, $objEquipo2, 0, 0, 0, 0.75);
        }

        if ($nuevoPartido !== null) {
            // Agregar el partido a la colección de partidos del Torneo
            $this->agregarPartido($nuevoPartido);
            return $nuevoPartido;
        } else {
            // Mensaje de error si el tipo de partido no es válido
            return "Tipo de partido no válido.";
        }
    } else {
        // Mensaje de error si los equipos no cumplen con los requisitos
        return "Los equipos no tienen la misma categoría o la misma cantidad de jugadores.";
    }
} 


public function verificarEquipos($equipo1, $equipo2) {
    echo "Categoría equipo 1: " . $equipo1->getObjCategoria()->getDescripcion() . "\n";
    echo "Categoría equipo 2: " . $equipo2->getObjCategoria()->getDescripcion() . "\n";
    echo "Cantidad de jugadores equipo 1: " . $equipo1->getCantJugadores() . "\n";
    echo "Cantidad de jugadores equipo 2: " . $equipo2->getCantJugadores() . "\n";

    // Comparamos las categorías usando los nombres
    return ($equipo1->getCantJugadores() === $equipo2->getCantJugadores()) && ($equipo1->getObjCategoria()->getDescripcion() === $equipo2->getObjCategoria()->getDescripcion());
}


    // Método para obtener los ganadores de los partidos según el deporte especificado
    public function darGanadores($deporte) {
        $ganadores = [];
        $i = 0;
        while ($i < count($this->colPartidos)) {
            $partido = $this->colPartidos[$i];
            if ($deporte === 'futbol' && $partido instanceof PartidoFutbol) {
                $ganadores[] = $partido->darEquipoGanador();
            } elseif ($deporte === 'basquetbol' && $partido instanceof PartidoBasquetbol) {
                $ganadores[] = $partido->darEquipoGanador();
            }
            $i++;
        }
        return $ganadores;
    }

    // Método para calcular el premio del partido
    public function calcularPremioPartido($objPartido) {
        $coeficiente = $objPartido->coeficientePartido();
        $equipoGanador = $objPartido->darEquipoGanador();
        if (!is_array($coeficiente)) {
            $premioPartido = $coeficiente * $this->getImportePremio();
        } else {
            // Manejar el caso en el que $coeficiente es un array
            // Por ejemplo, puedes imprimir un mensaje de error o manejarlo de otra manera según tus necesidades.
            echo "Error: El coeficiente es un array.";
        }
        

        return ['equipoGanador' => $equipoGanador, 'premioPartido' => $premioPartido];
    }

    public function puedeAgregarPartido($objPartido) {
        $equiposValidos = false;
        $i = 0;
        while (!$equiposValidos && $i < count($this->colPartidos)) {
            $partido = $this->colPartidos[$i];
            $equiposValidos = $this->verificarEquipos($objPartido->getObjEquipo1(), $objPartido->getObjEquipo2());
            $i++;
        }
        return $equiposValidos;
    }
    
    public function puedeIngresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido) {
        return $this->verificarEquipos($objEquipo1, $objEquipo2);
    }
    
    public function existePartido($objPartido) {
        return in_array($objPartido, $this->colPartidos);
    }
    
}
