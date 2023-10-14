<?php
    /**
     * @author Daniel Marín Lópes
     * @version 0.01a
     * 
     * Script de un formulario avanzado
     */

    /**
     * @name test_input
     * @param $data
     * @return $data
     * 
     * Función que limpia los datos de entrada
     */
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Definimos variable iniciales
    $name = $email = $gender = $comment = $website = "";
    //Declarar variables de error
    $nameErr = $emailErr = $websiteErr = "";

    //El género es un array
    $Genero = array("Hombre", "Mujer", "Otro");
    //Error de género
    $genderErr = "";

    //Variables para la movilidad
    //Array de opciones
    $Vehiculos = array("Bicicleta", "Coche", "Patín");
    //Array con opciones de seleccionadas
    $VehiculosSeleccion = array();

    //Opciones, con valor y literal
    $Opciones = array(
        array("Valor"=>1,"Literal"=>"Opcion 1"),
        array("Valor"=>2,"Literal"=>"Opcion 2"),
        array("Valor"=>3,"Literal"=>"Opcion 3"),
        array("Valor"=>4,"Literal"=>"Opcion 4"),
    );
    //Opción seleccionada
    $OpcionSeleccion = 1;

    //Variables coches
    $Coches = array("Renault", "Mercedes", "Volvo", "Seat", "Citroen");
    //Coches seleccionados
    $CochesSeleccion = array();

    $procesaForm = false;
    $error = false;

    //Detectamos error en la validación de los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $procesaForm = true;

        //Validar nombre
        if (empty($_POST["name"])) {
            $nameErr = "Nombre no definido";
            $error = true;
        } else {
            $name = test_input($_POST["name"]);
        }

        //Validar email
        if (empty($_POST["email"])) {
            $emailErr = "Email no definido";
            $error = true;
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Formato incorrecto";
                $error = true;
            }
        }

        //Validar URL
        $website = test_input($_POST["website"]);

        //Validar comentario
        $comment = test_input($_POST["comment"]);

        //Validar genero
        if (empty($_POST["gender"])) {
            $genderErr = "Genero no definido";
            $error = true;
        } else {
            $gender = $_POST["gender"];
        }

        //Validar vehículos
        if (isset($_POST["vehicle"])) {
            $VehiculosSeleccion = $_POST["vehicle"];
        }

        //Validar opciones
        if (isset($_POST["combo"])) {
            $OpcionSeleccion = $_POST["combo"];
        }

        //Validar coches
        if (isset($_POST["cars"])) {
            $CochesSeleccion = $_POST["cars"];
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
        <meta author="Daniel Marín López">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario 2</title>
        <style>
            .error {color: red;}
        </style>
    </head>
    <body>
        <?php
            if (!$procesaForm) { ?>
                <h1>Validar Formulario</h1>
                <p><span class="error">* Campos requeridos</span></p>
                <!--form method="post"-->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    NOMBRE: <input type="text" name="name" value="<?php echo $name; ?>">
                            <span class="error">* <?php echo $nameErr; ?> </span><br/><br/>
                    EMAIL: <input type="text" name="email" value="<?php echo $email; ?>">
                            <span class="error">* <?php echo $emailErr; ?> </span><br/><br/>
                    URL: <input type="text" name="website" value="<?php echo $website; ?>">
                            <span class="error">* <?php echo $websiteErr; ?> </span><br/><br/>
                    COMENTARIO: <br/>
                            <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea><br/><br/>
                    GÉNERO:
                        <?php
                            foreach ($Genero as $key => $value) {
                                $check="";
                                if ($gender == $value) {$check = "checked";}
                                    echo "<input type=\"radio\" name=\"gender\" value=\"$value\" $check>$value";
                            }
                            echo "<span class=\"error\">* $genderErr</span><br/><br/>";
                        ?>
                    TRANSPORTE:<br/>
                            <?php
                                foreach ($Vehiculos as $value) {
                                    $selected = (in_array($value, $VehiculosSeleccion)) ? "checked" : "" ;
                                    echo "<input type=\"checkbox\" name=\"vehicle[]\" value=\"".$value."\" $selected>" . $value;
                                }
                            ?>
                        <br/><br/>
                    SELECCIÓN DE OPCIÓN:
                        <select name="combo">
                            <?php
                                foreach ($Opciones as $value) {
                                    $selected = ($OpcionSeleccion == $value["Valor"]) ? "selected" : "" ;
                                    echo "<option value=\"" . $value["Valor"] . "\" $selected>" . $value["Literal"] . "</option>";
                                }
                            ?>
                        </select><br/><br/>
                    SELECCIÓN DE VEHÍCULOS:
                    <select multiple name="cars[]">
                        <?php
                            foreach ($Coches as $value) {
                                $selected = (in_array($value, $CochesSeleccion)) ? "selected" : "" ;
                                echo "<option value=\"" . $value . "\" $selected>" . $value . "</option>";
                            }
                        ?>
                    </select><br/><br/>
                    <input type="submit" name="submit" value="Submit">
                </form>
            
            <?php
                } else {
                    echo "<h1>Tu formulario</h1>";
                    echo "Nombre: ".$name;
                    echo "<br/>";
                    echo "Email: ".$email;
                    echo "<br/>";
                    echo "URL: ".$website;
                    echo "<br/>";
                    echo "Comentario: ".$comment;
                    echo "<br/>";
                    echo "Género: ".$gender;
                    echo "<br/>";
                    echo "Vehículos seleccionados: <br/>";
                    foreach ($VehiculosSeleccion as $element) {
                        echo $element . "<br/>";
                    }
                    echo "Opción: ".$OpcionSeleccion;
                    echo "<br/>";
                    echo "Coches seleccionados: <br/>";
                    foreach ($CochesSeleccion as $element) {
                        echo $element . "<br/>";
                    }
                }
            ?>        
    </body>
</html>