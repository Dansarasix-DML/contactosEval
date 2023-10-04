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