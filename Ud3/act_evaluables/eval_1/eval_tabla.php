<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Esta es la tabla de verbos irregulares:
     * 
     * Se generán nº aleatorios y con ellos se extraen los verbos
     * para crear la tabla. Una vez creada se pondrán inputs en
     * los huecos de cada verbo (Dependiendo de la DIFicultad).
     * 
     * Al final, cuando el usuario envia la tabla esta pondrá
     * de verde los aciertos y rojo los fallos y pondrá al final
     * cuantos aciertos a tenido el usuario.
     */
    
    include "./config/verbos_cnf.php"; 
    include "./lib/funciones.php";
    $link="https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/act_evaluables/eval_1/eval_tabla.php";

    echo "<h1>Ejercicio 1 Tabla de verbos irregulares</h1>
    <p>Crear una aplicación que permita mediante un formulario practicar el
    aprendizaje de los verbos irregulares en inglés.<br/>
    Criterios de validación:</p>
    <ul>
        <li>Array de configuración con todos los verbos.</li>
        <li>Formulario configuración que permita seleccionar número de verbos y<br/>
        número de preguntas por verbo. Incluye un input tipo text y una lista<br/>
        desplegable.</li>
        <li>Formulario de entrada según los datos recogidos en el formulario de<br/>
        configuración y mostrado conjuntamente.</li>
        <li>Validación del formulario mostrando el porcentaje de aciertos y marcando de<br/>
        manera diferenciada los aciertos de los fallos.</li>
        <li>Opción que permita mostrar todas las respuestas.</li>
        <li>Aplicar estilos y criterios de usabilidad.</li>
    </ul>";

    $DIF=1;
    $N_VERBS=10;
    $DIF_ERR=$N_VERBS_ERR="";
    
    $totalAciertos = 0;
    $error = false;

    //Cargamos valores
    $valoresActuales = array();
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
                $N_VERBS_ERR = "NÚMERO NO VÁLIDO";
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
            } while (existeFila($fila, $verbs_sel));
            $verbs_sel[$fila] = $verbos_irr[$fila];
            for ($c = 0; $c < $DIF; $c++) {
                do {
                    $columna = random_int(0, 2);
                } while (existeValor($fila, $columna, $n_aleatorios));
                $n_aleatorios[] = array($fila, $columna);
                $valoresActuales[$fila][$columna] = "";
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
    <link rel="stylesheet" href="../../../css/bootstrap.css"></link>
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