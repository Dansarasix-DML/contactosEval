<?php
    /**
     * Script de la Actividad 4
     *
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Enunciado:
     * Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres.
     * Almacenar información incluyendo foto y mostrar los menús disponibles. Mostrar el
     * precio del menú suponiendo que éste se calcula sumando el precio de cada uno de
     * los platos incluidos y con un descuento del 20 %.
     * 
     * Analisis:
     * Necesitamos 3 arrays por cada tipo de plato y cada uno guardar la iformación de
     * cada plato, arrays multidimensionales indexados.
    */

    $link = "https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_3/actividad_4.php";
    echo "<h1>Ejercicio 4 Arrays</h1>
    <p>Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres.<br/>
    Almacenar información incluyendo foto y mostrar los menús disponibles. Mostrar el<br/>
    precio del menú suponiendo que éste se calcula sumando el precio de cada uno de<br/>
    los platos incluidos y con un descuento del 20 %.</p>";

    $primeros = array(
        array('nombre' => 'Ensalada César', 'precio' => 10.99, 'foto' => 'ensalada_cesar.jpg'),
        array('nombre' => 'Sopa de Tomate', 'precio' => 8.99, 'foto' => 'sopa_tomate.jpg'),
        array('nombre' => 'Bruschetta', 'precio' => 9.99, 'foto' => 'bruschetta.jpg'),
    );
    
    $segundos = array(
        array('nombre' => 'Filete de Salmón', 'precio' => 16.99, 'foto' => 'salmon.jpg'),
        array('nombre' => 'Pollo a la Parrilla', 'precio' => 12.99, 'foto' => 'pollo_parrilla.jpg'),
        array('nombre' => 'Pasta Carbonara', 'precio' => 14.99, 'foto' => 'carbonara.jpg'),
        array('nombre' => 'Ternera Asada', 'precio' => 18.99, 'foto' => 'ternera_asada.jpg'),
        array('nombre' => 'Parrillada Mixta', 'precio' => 20.99, 'foto' => 'parrillada_mixta.jpg'),
    );

    $postres = array(
        array('nombre' => 'Tarta de Chocolate', 'precio' => 7.99, 'foto' => 'tarta_chocolate.jpg'),
        array('nombre' => 'Helado de Vainilla', 'precio' => 5.99, 'foto' => 'helado_vainilla.jpg'),
        array('nombre' => 'Fruta Fresca', 'precio' => 6.99, 'foto' => 'fruta_fresca.jpg'),
    );

    /**
     * Función para calcular el precio del menu
     * @param array $platos
     * @param int $descuento
     * 
     * @return float precio con descuento
     */
    function calcularprecio($platos, $descuento) {
        $precio_total = 0;
        foreach ($platos as $plato) {
            $precio_total += $plato["precio"];
        }

        return $precio_total * $descuento;
    };

    /**
     * Función para imprimir el menú
     * @param array $menu
     */
    function imprimir_menu($menu){
        echo "<p>Precio: " . calcularprecio($menu, 0.8) . "€</p>";

        for ($i=0; $i < count($menu); $i++) { 
            echo "<p><b>" . $menu[$i]["nombre"] . "</b> - " . $menu[$i]["precio"] . "€</p>";
        }
    }

    // Mostrar los menús disponibles y sus precios
    echo "<h2>Menús Disponibles:</h2>";
    echo "<h3>Menú 1: Primer Plato + Segundo Plato + Postre</h3>";

    //array_merge sirve para fusionar arrays
    $menu1 = array_merge([$primeros[0], $segundos[0], $postres[0]]);
    imprimir_menu($menu1);

    echo "<h3>Menú 2: Primer Plato + Segundo Plato + Postre</h3>";

    $menu2 = array_merge([$primeros[1], $segundos[2], $postres[2]]);
    imprimir_menu($menu2);

    echo "<br/>";
    echo "<a href=\"https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_3/actividad_4.php\">GITHUB</a>";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
    <title>Unidad 3 - Ejercicio 4 Arrays</title>
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