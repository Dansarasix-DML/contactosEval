<?php
    /**
     * Script de la Actividad 2
     *
     * @author Daniel Marín López
     * @version 0.01a
     * 
    */

    $link = "https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_3/actividad_2.php";
    $texto1 = "Definir un array que permita almacenar y mostrar la siguiente información.<br/>
    a. Meses del año.<br/>
    b. Tablero para jugar al juego de los barcos.<br/>
    c. Nota de los alumnos de 2o DAW para el módulo DWES.<br/>
    d. Verbos irregulares en inglés.<br/>
    e. Información sobre continentes, países, capitales y banderas.";
    $texto2 = "Indexar los ejercicios mediante un array.";
    $texto3 = "Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de<br/>
    ellos. El resultado debe mostrar nombre y fotografía.";
    $texto4 = "Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres.<br/>
    Almacenar información incluyendo foto y mostrar los menús disponibles. Mostrar el<br/>
    precio del menú suponiendo que éste se calcula sumando el precio de cada uno de<br/>
    los platos incluidos y con un descuento del 20 %.";
    $texto5 = "Mejorar el calendario con un array de los días festivos: colores diferentes,<br/>
    nacionales, comunidad, locales.";

    $ejercicios = array(
        "Actividad 1 Arrays" => array("./actividad_1.php", $texto1),
        "Actividad 2 Arrays (Actual)" => array("./actividad_2.php", $texto2),
        "Actividad 3 Arrays" => array("./actividad_3.php", $texto3),
        "Actividad 4 Arrays" => array("./actividad_4.php", $texto4),
        "Actividad 5 Arrays" => array("./actividad_5.php", $texto5),
    );

    echo "<h1>Ejercicios (Ejercicio 2)</h1>";
    foreach ($ejercicios as $ejercicio => $url) {
        echo "<h3><a href=" . $url[0] . ">" . $ejercicio . "</a></h3>";
        echo "<p>".$url[1]."</p>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
    <title>Unidad 3 - Ejercicio 2 Arrays</title>
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