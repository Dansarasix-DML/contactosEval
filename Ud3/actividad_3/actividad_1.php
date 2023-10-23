<?php
    /**
     * Script de la actividad 1
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    $link = "https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_3/actividad_1.php";
    echo "<h1>Ejercicio 1 Arrays</h1>
    <p>Definir un array que permita almacenar y mostrar la siguiente información.<br/>
    a. Meses del año.<br/>
    b. Tablero para jugar al juego de los barcos.<br/>
    c. Nota de los alumnos de 2o DAW para el módulo DWES.<br/>
    d. Verbos irregulares en inglés.<br/>
    e. Información sobre continentes, países, capitales y banderas.</p>";

    //Array unidimensional indexado
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo",
    "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    echo "<h3>Apartado a)</h3>";

    // For clásico para imprimir los meses
    for ($i=0; $i < count($meses); $i++) { 
        echo $meses[$i] . ", ";
    }

    echo "<h3>Apartado b)</h3>";

    //Array unidimensional indexado
    $tablero = array(
        1 => "A",
        2 => "B",
        3 => "C",
        4 => "D",
        5 => "E",
        6 => "F",
        7 => "G",
        8 => "H",
        9 => "I",
        10 => "J"
    );

    //Haciendo tablero
    echo '<table style="border-collapse: collapse;">';
    echo '<tr><th></th>';

    foreach ($tablero as $key => $value) {
        echo "<th>$key</th>";
    }

    //ForEach para imprimir las letras
    foreach ($tablero as $key => $value) {
        echo '<tr>';
        echo "<th>$value</th>";
        for ($j = 1; $j <= 10; $j++) {
            echo '<td class="nada"></td>';
        }
        echo '</tr>';        
    }

    echo '</table>';

    echo "<h3>Apartado c)</h3>";

    //Array unidimensional asociativo
    $notas = array(
        "Daniel Marín" => 7,
        "Eduardo Ruz" => 8,
        "Laura Luque" => 7
    );

    //Haciendo tabla
    echo '<table>';
    echo '<tr><th>Alumno</th><th>Nota</th>';

    foreach ($notas as $alumno => $nota) {
        echo '<tr>';
        echo '<td class="nada">' . $alumno . '</td><td class="nada">' . $nota . '</td>';
    }
    
    echo '<tr>';
    echo '</table>';

    echo "<h3>Apartado d)</h3>";

    //Array multidimensional asociativo
    $eng_verbs = array(
        "be" => array("was/were", "been"),
        "buy" => array("bought", "bought"),
        "cut" => array("cut", "cut")
    );

    //Hacemos tabla
    echo '<table>';
    echo '<tr><th>Verbo</th><th>Pasado</th><th>Participio</th>';

    foreach ($eng_verbs as $verbo => $formas) {
        echo '<tr>';
        echo '<td class="nada">' . $verbo . '</td><td class="nada">' . $formas[0] . '</td><td class="nada">' . $formas[1] . '</td>';
    }

    echo '<tr>';
    echo '</table>';

    echo "<h3>Apartado e)</h3>";

    //Array multidimensional asociativo
    $continentes = array(
        "Asia" => array(
            "Japón" => array("Tokyo", "🇯🇵"),
            "China" => array("Hon Kong", "🇨🇳")
        ),
        "Europa" => array(
            "España" => array("Madrid", "🇪🇸"),
            "Francia" => array("Paris", "🇫🇷"),
            "Alemania" => array("Berlin", "🇩🇪"),
        ),
        "América" => array(
            "Estados Unidos" => array("Washington D. C.", "🇺🇸"),
            "México" => array("Ciudad de México", "🇲🇽"),
            "Argentina" => array("Buenos Aires", "🇦🇷"),
        ),
        "África" => array(
            "Libia" => array("Trípoli", "🇱🇾"),
            "Madagascar" => array("Antananarivo", "🇲🇬"),
            "Nigeria" => array("Abuya", "🇳🇬")
        ),
        "Oceanía" => array(
            "Autralia" => array("Canberra", "🇦🇺")
        )
    );

    //Hacemos lista anidada
    echo "<ul>";
    foreach ($continentes as $cont => $paises) {
        echo "<li>" . $cont;
        echo "<ul>";
        foreach ($paises as $pais => $datos) {
            echo "<li>" . $pais;
            echo "<ul>";
            for ($i=0; $i < 2; $i++) { 
                echo "<li>" . $datos[$i] . "</li>";
            }
            echo "</ul>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</li>";
    }
    echo "</ul>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <link rel="stylesheet" href="./css/style.css"></link> 
    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
    <title>Unidad 3 - Ejercicio 1 Arrays</title>
</head>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="git" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
        </symbol>
    </svg>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2023 Daniel Marín López</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="<?php echo $link ?>" target="_blank"><svg class="bi" width="24" height="24"><use xlink:href="#git"/></svg></a></li>
        </ul>
  </footer>
</body>
</html>