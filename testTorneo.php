<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquetbol.php");

// Crear categorías
$catMayores = new Categoria(1, 'Mayores');
$catJuveniles = new Categoria(2, 'Juveniles');
$catMenores = new Categoria(3, 'Menores');

// Crear de equipos
$objE1 = new Equipo("Equipo Uno", "Cap.Uno", 1, $catMayores);
$objE2 = new Equipo("Equipo Dos", "Cap.Dos", 2, $catMayores);
$objE3 = new Equipo("Equipo Tres", "Cap.Tres", 3, $catJuveniles);
$objE4 = new Equipo("Equipo Cuatro", "Cap.Cuatro", 4, $catJuveniles);
$objE5 = new Equipo("Equipo Cinco", "Cap.Cinco", 5, $catMayores);
$objE6 = new Equipo("Equipo Seis", "Cap.Seis", 6, $catMayores);
$objE7 = new Equipo("Equipo Siete", "Cap.Siete", 7, $catJuveniles);
$objE8 = new Equipo("Equipo Ocho", "Cap.Ocho", 8, $catJuveniles);
$objE9 = new Equipo("Equipo Nueve", "Cap.Nueve", 9, $catMenores);
$objE10 = new Equipo("Equipo Diez", "Cap.Diez", 9, $catMenores);
$objE11 = new Equipo("Equipo Once", "Cap.Once", 11, $catMayores);
$objE12 = new Equipo("Equipo Doce", "Cap.Doce", 11, $catMayores);

// Crear instancia de Torneo
$objTorneo = new Torneo(100000);

// Crear objetos de PartidoBasquetbol
$partidoBasquetbol1 = new PartidoBasquetbol(11, "05/05/2024", $objE7, 80, $objE8, 120, 7);
$partidoBasquetbol2 = new PartidoBasquetbol(12, "06/05/2024", $objE9, 81, $objE10, 110, 8);
$partidoBasquetbol3 = new PartidoBasquetbol(13, "07/05/2024", $objE11, 115, $objE12, 85, 9);

// Crear objetos de PartidoFutbol
$partidoFutbol1 = new PartidoFutbol(14, "07/05/2024", $objE1, 3, $objE2, 2, 0.27);
$partidoFutbol2 = new PartidoFutbol(15, "08/05/2024", $objE3, 0, $objE4, 1, 0.13);
$partidoFutbol3 = new PartidoFutbol(16, "09/05/2024", $objE5, 2, $objE6, 3, 0.5);

// Invocar ingresarPartido
echo "Ingresando partido...\n";

$partido = $objTorneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');

if ($partido !== null) {
    echo "Partido ingresado correctamente.\n";
    echo "Cantidad de equipos en el torneo: " . count($objTorneo->getColPartidos()) . "\n";
} else {
    echo "Error al ingresar el partido. No cumple los requisitos necesarios.\n";
}

// Invocar ingresarPartido
echo "Ingresando partido...\n";

$partido = $objTorneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');

if ($partido !== null) {
    echo "Partido ingresado correctamente.\n";
    echo "Cantidad de equipos en el torneo: " . count($objTorneo->getColPartidos()) . "\n";
} else {
    echo "Error al ingresar el partido. No cumple los requisitos necesarios.\n";
}

// Invocar ingresarPartido
echo "Ingresando partido...\n";

$partido = $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');

if ($partido !== null) {
    echo "Partido ingresado correctamente.\n";
    echo "Cantidad de equipos en el torneo: " . count($objTorneo->getColPartidos()) . "\n";
} else {
    echo "Error al ingresar el partido. No cumple los requisitos necesarios.\n";
}

// Invocar darGanadores('basquet') y visualizar el resultado
echo "Obteniendo ganadores de partidos de básquetbol...\n";
$ganadoresBasquet = $objTorneo->darGanadores('basquet');

echo "Ganadores de partidos de básquetbol:\n";
foreach ($ganadoresBasquet as $ganador) {
    echo $ganador->getNombre() . "\n";
}

// Invocar darGanadores('futbol') y visualizar el resultado
echo "Obteniendo ganadores de partidos de fútbol...\n";
$ganadoresFutbol = $objTorneo->darGanadores('futbol');

echo "Ganadores de partidos de fútbol:\n";
foreach ($ganadoresFutbol as $ganador) {
    echo $ganador->getNombre() . "\n";
}

// Calcular el premio para los partidos de básquetbol
$premioPartido1 = $objTorneo->calcularPremioPartido($partidoBasquetbol1);
$premioPartido2 = $objTorneo->calcularPremioPartido($partidoBasquetbol2);
$premioPartido3 = $objTorneo->calcularPremioPartido($partidoBasquetbol3);

// Visualizar los premios para los partidos de básquetbol
echo "Premio para el partido de básquetbol 1:\n";
print_r($premioPartido1);

echo "Premio para el partido de básquetbol 2:\n";
print_r($premioPartido2);

echo "Premio para el partido de básquetbol 3:\n";
print_r($premioPartido3);


// Calcular el premio para los partidos de fútbol
$premioPartido4 = $objTorneo->calcularPremioPartido($partidoFutbol1);
$premioPartido5 = $objTorneo->calcularPremioPartido($partidoFutbol2);
$premioPartido6 = $objTorneo->calcularPremioPartido($partidoFutbol3);

// Visualizar los premios para los partidos de fútbol
echo "Premio para el partido de fútbol 1:\n";
print_r($premioPartido4);

echo "Premio para el partido de fútbol 2:\n";
print_r($premioPartido5);

echo "Premio para el partido de fútbol 3:\n";
print_r($premioPartido6);

// Mostrar el objeto Torneo
echo "Objeto Torneo:\n";
echo $objTorneo . "\n";
?>
