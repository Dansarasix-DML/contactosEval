<?php
    /**
     * @author Daniel Marín Lópes
     * @version 0.01a
     * 
     * Script de un formulario avanzado
     */

     $link="https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/ejemplos_1/formulario2/index_2.php";

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
        <meta name="author" content="Daniel Marín López">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../css/bootstrap.css"></link>
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