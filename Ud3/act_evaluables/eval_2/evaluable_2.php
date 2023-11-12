<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Enunciado: Crear una aplicación que permita practicar tests de autoescuela.
     * 
     * Análisis: Se pide crear un formulario para seleccionar uno de los tres
     * tests (formularios) y luego decir las respuestas acertadas y si el
     * test ha sido superado.
     * 
     * Este es el formulario de selección del test.
     */

    include("./config/tests_cnf.php");
    $link="https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/act_evaluables/eval_2/evaluable_2.php";
    echo "<h1>Ejercicio 2 Examen de autoescuela</h1>
    <p>Crear una aplicación que permita practicar tests de autoescuela.<br/>
    Criterios de validación:</p>
    <ul>
        <li>Los test se encuentran almacenados en un array asociativo dentro de un<br/>
        directorio de configuración.</li>
        <li>Cada test utiliza un directorio para almacenar las fotos que necesita. El<br/>
        nombre de la carpeta es la concatenación de la cadena “dir_img_test” y el<br/>
        número de test. Por ejemplo, para el test 1 las imágenes se guardan en el<br/>
        directorio dir_img_test1.</li>
        <li>El nombre de cada foto se forma con la concatenación de la cadena “img” y<br/>
        el id de la pregunta. Por ejemplo, img1.jpg correspondería a la imagen de la<br/>
        primera pregunta.</li>
        <li>Formulario que muestre a los estudiantes una lista desplegable con los tests<br/>
        disponibles. La lista debe incluir id, tipo de permiso de conducir y categoría.</li>
        <li>Formulario con las preguntas del test seleccionado por el estudiante.</li>
        <li>Procesamiento del formulario mostrando el resultado del test realizado,<br/>
        indicando las respuestas correctas e incorrectas.</li>
        <li>Utilización de emoticonos para marcar el test como SUPERADO o NO<br/>
        SUPERADO.</li>
    </ul>";

    $ID = 1;
    
    define("TESTS",array(
        array("Valor"=>$aTests[0]["idTest"],"Literal"=>"TEST A--".$aTests[0]["Permiso"]."---".$aTests[0]["Categoria"]),
        array("Valor"=>$aTests[1]["idTest"],"Literal"=>"TEST B--".$aTests[1]["Permiso"]."---".$aTests[1]["Categoria"]),
        array("Valor"=>$aTests[2]["idTest"],"Literal"=>"TEST C--".$aTests[2]["Permiso"]."---".$aTests[2]["Categoria"])
    ));
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/bootstrap.css"></link>
    <title>Evaluable 2</title>
</head>
<body>
    <form method="post" action="eval_cuestionario.php">
        <label>
            SELECCIONE UN TEST:
            <select name="test">
                <?php
                    foreach (TESTS as $value) {
                        $selected = ($ID == $value["Valor"]) ? "selected" : "" ;
                        echo "<option value=\"" . $value["Valor"] . "\" $selected>" . $value["Literal"] . "</option>";
                    }
                ?>
            </select>
        </label>
        <br/>
        <input type="submit" name="envio1" value="Empezar test"><br/>
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