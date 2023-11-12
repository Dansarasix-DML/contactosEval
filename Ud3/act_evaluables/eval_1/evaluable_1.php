<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Enunciado: Crear una aplicación que permita mediante un formulario practicar el
     * aprendizaje de los verbos irregulares en inglés.
     * 
     * Análisis: Se pide un formulario de configuración que lleve a otro formulario
     * que sea una tabla con verbos seleccionados de manera aleatoria y que el
     * usuario debe rellenar. Si acierta tendrá un punto, al final se deben ver
     * todos los aciertos al darle al botón de envio.
     * 
     * Este es el formulario de configuración de la tabla de verbos:
     *  DIF = 1 (huecos) => EASY
     *  DIF = 2 (huecos) => NORMAL
     *  DIF = 3 (huecos) => HARD
     * 
     *  N_VERBOS = Nº de verbos que desea el usuario entre 1 y la longitud del array
     */

    include "./config/verbos_cnf.php";
    $link="https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/act_evaluables/eval_1/evaluable_1.php";
    
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/bootstrap.css"></link>
    <title>Evaluable 1</title>
</head>
<body>
    <form method="post" action="eval_tabla.php">
        <label>
            Dificultad: 
                <select name="dificultad">
                    <?php
                        foreach (DIFICULTADES as $value) {
                            $selected = ($DIF == $value["Valor"]) ? "selected" : "" ;
                            echo "<option value=\"" . $value["Valor"] . "\" $selected>" . $value["Literal"] . "</option>";
                        }
                    ?>
                </select>
                <br/>
        </label>
        <br/>
        <label>
            Nº Verbos: <input type="text" name="n_verbos" value="<?php echo $N_VERBS; ?>"><br/>
        </label>
        <br/>
        <input type="submit" name="envio1" value="Enviar"><br/>
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