<?php
    /**
     * @author Daniel Marín Lópes
     * @version 0.01a
     * 
     * Script de un formulario avanzado
     */

     //Añadimos funciones
     include "funciones.php";

     //Cargamos variables
     $nombre = $apellidos = $correo = $gen = $url = $comentario = "";
     $genero = array("Hombre", "Mujer", "Otro");

     //Cargamos variables de error
     $nombre_Err = $ap_Err = $correo_Err = $url_Err = "";
     $genero_Err = "";

     //Empezamos con el formulario
     $procesaForm = false;
     $error = false;

     //Errores en la validación
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $procesaForm = true;

        //Validar nombre y apellidos
        if (empty($_POST["nombre"])) {
            $nombre_Err = "Indique su nombre";
            $error = true;
        } else {
            $nombre = test_input($_POST["nombre"]);
        }

        if (empty($_POST["apellidos"])) {
            $ap_Err = "Indique sus apellidos";
            $error = true;
        } else {
            $apellidos = test_input2($_POST["apellidos"]);
        }

        //Validar el correo/email
        if (empty($_POST["correo"])) {
            $correo_Err = "Indique su correo";
            $error = true;
        } else {
            $correo = test_input($_POST["correo"]);
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $correo_Err = "Formato incorrecto";
                $error = true;
            }
        }

        //Validar URL y comentario
        $url = test_input($_POST["url"]);
        $comentario = test_input($_POST["comentario"]);

        //Validamos género
        if (empty($_POST["genero"])) {
            $genero_Err = "Indique su género";
            $error = true;
        } else {
            $gen = test_input($_POST["genero"]);
        }

        //Si hay error
        if ($error) {
            $procesaForm = false;
        }
     }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 1</title>
    <style>
        .error {color: red;}
    </style>
</head>
<body>
    <?php
        if (!$procesaForm) { ?>
            <h1>Formulario de prueba 1</h1>
            <p><span class="error">* Campos obligatorios</span></p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                NOMBRE: <input type="text" name="nombre" value="<?php echo $nombre; ?>">
                        <span class="error">* <?php echo $nombre_Err; ?></span>
                        <br/><br/>
                APELLIDOS: <input type="text" name="apellidos" value="<?php echo $apellidos; ?>">
                            <span class="error">* <?php echo $ap_Err; ?></span>
                            <br/><br/>
                GÉNERO:
                    <?php
                        foreach ($genero as $key => $value) {
                            $check = "";
                            if ($gen == $value) {$check = "checked";}
                            echo "<input type=\"radio\" name=\"genero\" value=\"$value\" $check>$value";
                        }
                        echo "<span class=\"error\">* $genero_Err</span><br/><br/>";
                    ?>
                CORREO: <input type="text" name="correo" value="<?php echo $correo; ?>">
                        <span class="error">* <?php echo $correo_Err; ?></span>
                        <br/><br/>
                URL: <input type="text" name="url" value="<?php echo $url; ?>">
                    <span class="error">* <?php echo $url_Err; ?></span>
                    <br/><br/>
                COMENTARIO: <br/>
                            <textarea name="comentario" rows="5" cols="40"><?php echo $comentario; ?></textarea>
                            <br/><br/>

                <input type="submit" name="submit" value="Enviar">
            </form>
    <?php
        } else {
            echo "<h1>Tus Datos</h1>";
            echo "Usuario: ".$nombre." ".$apellidos;
            echo "<br/>";
            echo "Género: ".$gen;
            echo "<br/>";
            echo "Correo: ".$correo;
            echo "<br/>";
            echo "URL: ".$url;
            echo "<br/>";
            echo "Comentario: ".$comentario;
            echo "<br/>";
        }
    ?>
</body>
</html>