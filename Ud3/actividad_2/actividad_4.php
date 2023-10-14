<?php
    /**
     * Script de la Actividad 4
     *
     * @author Daniel Marín López
     * @version 0.05a
    */

    $link="https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_2/actividad_4.php";

    // $colors = array("#FF0000", "#0000FF", "#008000", "#FFFF00", "#FFA500", "#800080", "#FF7F50", "#DC143C", "#ADFF2F");

    // echo '<h2>Tablas de colores</h2>';
    // echo '<table style="border-collapse: collapse;">';
    // echo '</tr>';
    // for ($i=1; $i <= 3; $i++) { 
    //     echo '<td style="border: medium solid black; text-align: center; background-color:' . $colors[$i - 1] . ' ;">' . $colors[$i - 1] . '</td>';
    // }
    // echo '</tr>';
    // for ($i=4; $i <= 6; $i++) { 
    //     echo '<td style="border: medium solid black; text-align: center; background-color:' . $colors[$i - 1] . ' ;">' . $colors[$i - 1] . '</td>';
    // }
    // echo '</tr>';
    // for ($i=7; $i <= 9; $i++) { 
    //     echo '<td style="border: medium solid black; text-align: center; background-color:' . $colors[$i - 1] . ' ;">' . $colors[$i - 1] . '</td>';
    // }

    // echo "<br/>";
    // echo "<a href=\"https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_2/actividad_4.php\">GITHUB</a>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
    <title>Unidad 3 - Ejercicio 4 Bucles</title>
</head>
<body>
    <h1>Ejercicio 4 Bucles</h1>
    <p>Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor<br/>
    hexadecimal que le corresponde. Cada celda será un enlace a una página que<br/>
    mostrará un fondo de pantalla con el color seleccionado. ¿Puedes hacerlo con los<br/>
    conocimientos que tienes?</p>
    <table border="1">
        <tr>
            <th>Color y Valor Hexadecimal</th>
        </tr>
        <?php
        for ($r = 0; $r <= 255; $r += 51) {
            echo "<tr>";
            for ($g = 0; $g <= 255; $g += 51) {
                echo "<tr>";
                for ($b = 0; $b <= 255; $b += 51) {
                    $color = sprintf("#%02X%02X%02X", $r, $g, $b); // Crea el valor hexadecimal
                    echo "<td style='background-color: $color; color: white;'>$color</td>";
                }
                echo "</tr>";
            }
            echo "</tr>";
        }
        ?>
    </table>
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
