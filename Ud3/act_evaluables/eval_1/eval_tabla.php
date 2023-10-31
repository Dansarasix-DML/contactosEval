<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Tabla de verbos irregulares
     */
    
    include "./config/verbos_cnf.php"; 
    include "./lib/funciones.php";

    $DIF=1;
    $N_VERBS=10;
    $DIF_ERR=$N_VERBS_ERR="";
    
    $totalAciertos = 0;
    $error = false;

    //Cargamos valores
    $valoresActuales = array();
    $rep = array();
    $verbs_sel = array();
    $n_aleatorios = array();

    $procesaForm = false;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["envio1"])) {
            $procesaForm = true;

            if (isset($_POST["dificultad"])) {
                $DIF=intval($_POST["dificultad"]);
            }

            if (empty($_POST["n_verbos"])) {
                $N_VERBS_ERR = "NÚMERO NO VÁLIDA";
                $error = true;
            }

            if ($_POST["n_verbos"] > LENGTH || $_POST["n_verbos"] <= 0) {
                $N_VERBS_ERR = "NÚMERO NO VÁLIDO, TOMANDO VALOR POR DEFECTO";
                $error = true;
            } else {
                $N_VERBS=intval($_POST["n_verbos"]);
            }
        }
    }

    if (isset($_POST["comprobar"])) {
        $procesaForm = true;
        foreach ($_POST["verb"] as $f => $v1) {
            $verbs_sel[$f] = $verbos_irr[$f];
            foreach ($v1 as $c => $v2) {
                $n_aleatorios[] = array($f, $c);
                $valoresActuales[$f][$c] = $v2;
                if ($valoresActuales[$f][$c] == $verbos_irr[$f][$c]){
                    $totalAciertos++;
                }
            }
        }
    } else {
        //Generamos números aleatorios
        for ($i = 0; $i < $N_VERBS; $i++) {
            do {
                $fila = random_int(0, LENGTH-1);
            } while (in_array($fila, $rep));
            $rep[] = $fila;
            $verbs_sel[$fila] = $verbos_irr[$fila];
            for ($c = 0; $c < $DIF; $c++) {
                do {
                    $a = random_int(0, 2);
                } while (existeValor($fila, $a, $n_aleatorios));
                $n_aleatorios[] = array($fila, $a);
                $valoresActuales[$fila][$a] = "";
            }

        }
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css"></link>
    <title>Tabla de verbos</title>
</head>
<body>
    <span class="error"> <?php echo $N_VERBS_ERR; ?> </span>
    <form method="post" action="">
        <table border="1px">
            <tr><th>x</th>
            <?php
                for ($i = 0; $i < COLS; $i++) {
                    echo "<th>".Cabeceras[$i]."</th>";
                }
            ?>
            </tr>
            <?php
            $i = 0;
            foreach ($verbs_sel as $key => $value) {
                $i++;
                echo '<tr>';
                echo "<th>".$i."</th>";
                for ($j=0; $j < COLS; $j++) {
                    if (existeValor($key, $j, $n_aleatorios)) {
                        $claseRespuesta = "";
                        $iconoRespuesta = "";
                        if ($procesaForm && isset($_POST["comprobar"])) {
                            $iconoRespuesta = $valoresActuales[$key][$j] == $verbos_irr[$key][$j] ? "😄" : "😖";
                            $claseRespuesta = $valoresActuales[$key][$j] == $verbos_irr[$key][$j] ? "acierto" : "fallo";
                        }
                        echo "<td><input class=\"".$claseRespuesta."\" type=\"text\" name=\"verb[".$key."][".$j."]\" value=\"".$valoresActuales[$key][$j]."\">".$iconoRespuesta."</td>";
                        } else {
                            echo '<td>' . $verbs_sel[$key][$j] . '</td>';
                    }
                }
                echo '</tr>';
            }
            ?>
        </table>
        <br/>
        <input type="submit" name="comprobar" value="Comprobar"/>
        <?php echo "Total de aciertos: $totalAciertos"; ?>
    </form>
</body>
</html>