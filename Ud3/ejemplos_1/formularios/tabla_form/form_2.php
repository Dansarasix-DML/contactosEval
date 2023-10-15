<?php
    /**
     * Script de la tabla de multiplicar con formulario
     *
     * @author Daniel Marín López
     * @version 0.05a
     * 
     * Enunciado:
     * Se pide una tabla de multiplicar que el usuario tendrá que completar
     * 
     * Analisis:
     * Generamos un array de números aleatorios sin repetirse
     * 
    */

    $link="https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/ejemplos_1/formularios/tabla_form/form_2.php";

    include("./config/config.php");
    include("./lib/funciones.php");

    //$PREGUNTAS = 5;
    $totalAciertos = 0;

    //Cargamos valores
    $valoresActuales = array();

    $n_aleatorios = array();
    /**
     * $n_aleatorios = array(
     *      array(3, 5),
     *      array(4, 9),
     *      ...
     * )
     */

    $procesaForm = false;
    $error = false;

    if (isset($_POST["enviar"])) {
        $procesaForm = true;
        foreach ($_POST["num"] as $f => $v1) {
            foreach ($v1 as $c => $v2) {
                $n_aleatorios[] = array($f, $c);
                $valoresActuales[$f][$c] = $v2;
                if ($valoresActuales[$f][$c] == $f*$c){
                    $totalAciertos++;
                }
            }
        }
    } else {
        //Generamos números aleatorios
        for ($i=0; $i < NUMINPUTS; $i++) { 
            do {
                $n = array(random_int(1, NUMTABLAS), random_int(1, NUMTABLAS));
            } while (existeValor($n[0], $n[1], $n_aleatorios));
            $n_aleatorios[] = $n;
            $valoresActuales[$n[0]][$n[1]]="";
        }
        // do {
            
    
        //     $existe = existeValor($n[0], $n[1], $n_aleatorios);
            
        //     // Si $n no está en $n_aleatorios, agregarlo
        //     if (!$existe) {
                
        //     }
        // } while (count($n_aleatorios) < $PREGUNTAS);
        // foreach ($n_aleatorios as $key => $value) {
        //     echo $value[0]."-".$value[1];
        //     echo "<br/>";
        // }
        // exit();
    }
    
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     for ($i = 1; $i <= 10; $i++) {
    //         for ($j = 1; $j <= 10; $j++) {
    //             $inputName = "resultado" . $i . "-" . $j;
    //             $inputValue = $_POST[$inputName] ?? '';
    
    //             if (is_numeric($inputValue) && $inputValue == $i * $j) {
    //                 $totalAciertos++;
    //             } else {
    //                 $error = true;
    //             }
    //         }
    //     }

    //     //Si hay error
    //     if ($error) {
    //         $procesaForm = false;
    //     }
    // }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Daniel Marín López">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../../css/bootstrap.css"></link>
        <link rel="stylesheet" href="./css/style.css"></link>
        <title>Tablas de Multiplicar</title>
    </head>
    <body>
    <h2>Tablas de Multiplicar del 1 al 10</h2>
        <form method="post" action="">
            <table>
            <tr><th>x</th>
            <?php
                for ($i = 1; $i <= NUMTABLAS; $i++) {
                    echo "<th>".$i."</th>";
                }
            ?>
            </tr>
            <?php
                for ($i = 1; $i <= NUMTABLAS; $i++) {
                    echo '<tr>';
                    echo "<th>".$i."</th>";
                    for ($j = 1; $j <= NUMTABLAS; $j++) {
                        if (existeValor($i, $j, $n_aleatorios)) {
                            $claseRespuesta = "";
                            $iconoRespuesta = "";
                            if ($procesaForm) {
                                $iconoRespuesta = $valoresActuales[$i][$j] == $i*$j ? "😄" : "😖";
                                $claseRespuesta = $valoresActuales[$i][$j] == $i*$j ? "acierto" : "fallo";
                            }
                            echo "<td><input class=\"".$claseRespuesta."\" title=\"".$i."x".$j."\" type=\"text\" name=\"num[".$i."][".$j."]\" value=\"".$valoresActuales[$i][$j]."\">".$iconoRespuesta."</td>";
                        } else {
                            echo '<td>' . ($i * $j) . '</td>';
                        }                            
                        // $cellFound = false;
                        // foreach ($n_aleatorios as $key => $value) {
                        //     if ($i == $value[0] and $j == $value[1]) {
                        //         echo "<td style=\"width: 20px; border: medium solid black; text-align: center; background-color:". $colors[$i - 1] .";\"><input style=\"width: 20px;\" type=\"text\" name=\"resultado".$value[0]."-".$value[1]."\"></td>";
                        //         $cellFound = true;
                        //         break;
                        //     } 
                        // }
                        // if (!$cellFound) {
                        //     echo '<td style="width: 10px; border: medium solid black; text-align: center; background-color:' . $colors[$i - 1] . ' ;">' . ($i * $j) . '</td>';
                        // }                            
                    }
                    echo '</tr>';
                }
            ?>
            </table>
            <br/>
            <input type="submit" name="enviar" value="Enviar"/>
        </form>
        <?php echo "Total de aciertos: $totalAciertos"; ?>
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