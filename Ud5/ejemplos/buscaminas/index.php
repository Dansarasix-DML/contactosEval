<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Página principal del buscaminas
     */

    include "./config/config.php";

    function mostrar_tablero(array $tablero) {
        for ($i=0; $i < count($tablero); $i++) { 
            for ($j=0; $j < count($tablero[$i]); $j++) { 
                echo $tablero[$i][$j];
            }
            echo "<br/>";
        }
    }

    function jugadaGanadora(){
        $num_invisible = 0;
        $bool = false;

        foreach ($_SESSION["tablero_visible"] as $columna) {
            foreach ($columna as $casilla) {
                if ($casilla == 0) {
                    $num_invisible++;
                }
            }
        }

        if ($num_invisible == MINAS) {
            $bool = true;
        }

        return $bool;
    }

    function clickCasilla($f, $c){
        if ($_SESSION["tablero_visible"][$f][$c] == 0) {
            $_SESSION["tablero_visible"][$f][$c] = 1;
                if ($_SESSION["tablero_invisible"][$f][$c] == 9) {
                    return 0;
                } else if (jugadaGanadora()){
                    return 1;
                } else if($_SESSION["tablero_invisible"][$f][$c] == 0){
                    for ($j=max(0, $f-1); $j <= min(COLUMNAS-1, $f+1); $j++) { 
                        for ($k=max(0, $c-1); $k <= min(COLUMNAS-1, $c+1); $k++) { 
                            clickCasilla($j, $k);
                        }
                    }
                }
        }
    }

    function mostrar_visible(array $tablero) {
        for ($i=0; $i < count($tablero); $i++) { 
            for ($j=0; $j < count($tablero[$i]); $j++) { 
                if ($_SESSION["tablero_visible"][$i][$j] == 0) {
                    echo "<a href=\"index.php?i=$i&j=$j\"> " . "c" . " </a>";
                } else {
                    echo $_SESSION["tablero_invisible"][$i][$j];
                }
            }
            echo "<br/>";
        }
    }

    function genera_minas() {
        for ($i=0; $i < MINAS; $i++) { 
            do {
                $f = random_int(0,COLUMNAS-1);
                $c = random_int(0,COLUMNAS-1);
            } while ($_SESSION["tablero_invisible"][$f][$c] == 9);
            $_SESSION["tablero_invisible"][$f][$c] = 9;
            for ($j=max(0, $f-1); $j <= min(COLUMNAS-1, $f+1); $j++) { 
                for ($k=max(0, $c-1); $k <= min(COLUMNAS-1, $c+1); $k++) { 
                    if ($_SESSION["tablero_invisible"][$j][$k] != 9) {
                        $_SESSION["tablero_invisible"][$j][$k]++;
                    }
                }
            }
        }
    }

    session_start();

    if (isset($_GET['modoBandera'])) {
        $modoBandera = ($_GET['modoBandera'] == "true");
        $_SESSION['bandera'] = $modoBandera;
    }

    if (!isset($_SESSION["tablero_invisible"])) {
        $_SESSION["tablero_visible"] = array();
        $_SESSION["tablero_invisible"] = array();

        for ($i=0; $i < COLUMNAS; $i++) { 
            for ($j=0; $j < COLUMNAS; $j++) { 
                $_SESSION["tablero_visible"][$i][$j] = 0; //Valores de 0-8 o 9(minas)
                $_SESSION["tablero_invisible"][$i][$j] = 0; //Valores false(no visible), true(visible)
                $_SESSION['bandera'] = false;
                $_SESSION['casillasBandera']=[];
            }
        }
        genera_minas();

    }

    $resp = "";

    echo "<a href=\"cierra_sesion.php\">Cerrar Sesión</a><br/>";
    if (isset($_GET["i"]) && isset($_GET["j"])) {
        $fila = $_GET["i"];
        $columna = $_GET["j"];
        if ($_SESSION['bandera'] == false){
            $resp = clickCasilla($fila, $columna) ?? "";
        } else {
            $estabaMarcado = false;
            if (!empty($_SESSION['casillasBandera'])){
                for ($i = 0; $i < sizeof($_SESSION['casillasBandera']); $i++){
                    if ($_SESSION['casillasBandera'][$i][0] == $fila && $_SESSION['casillasBandera'][$i][1] == $columna){
                        unset($_SESSION['casillasBandera'][$i]);
                        $_SESSION['casillasBandera'] = array_values($_SESSION['casillasBandera']);
                        $estabaMarcado = true;
                    } 
                }
            }
            if (!$estabaMarcado) array_push($_SESSION['casillasBandera'], [$fila, $columna]);
        }
    }
    mostrar_tablero($_SESSION["tablero_invisible"]);

    echo "<br/><br/>";

    echo "Tablero de juego: ";
    echo "<br/><br/>";
    $modoBandera = ($_SESSION['bandera'] == false) ? "true" : "false";
    $textoBoton = ($_SESSION['bandera'] == false) ? "Activar modo bandera" : "Desactivar modo bandera";
    echo "<a href=\"index.php?modoBandera={$modoBandera}\"><input type=\"button\" value=\"{$textoBoton}\"></a>";
    echo "<br/><br/>";
    echo "<table>";
    for ($i=0; $i < COLUMNAS; $i++) { 
        echo "<tr>";
        for ($j=0; $j < COLUMNAS; $j++) {
            if ($_SESSION["tablero_visible"][$i][$j] == 0) {
                if ($resp == 1 || $resp == 0) {
                    if ($_SESSION["tablero_invisible"][$i][$j] == 9) {
                        echo "<td>P</td>";
                    } else {
                        echo "<td>C</td>";
                    }
                } else {
                    echo "<td><a href=\"index.php?i=$i&j=$j\"> " . "C" . " </a></td>";
                }
            } else {
                if ($_SESSION["tablero_invisible"][$i][$j] == 9) {
                    echo "<td>P</td>";
                } else {
                    if ($_SESSION["bandera"]) {
                        echo "<td>X</td>";
                    } else {
                        echo "<td>".$_SESSION["tablero_invisible"][$i][$j]."</td>";
                    }
                }
            }
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<br/>";
    if ($resp == 0) {
        echo "HAS PERDIDO";
    } else if ($resp == 1){
        echo "HAS GANADO";
    } else {
        echo "";
    }

?>