<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * @DNI: 31880329
     */

    include "../config/config.php";
    include "./lib/lib.php";

    $hayhorario = false;

    define("HORS",array(
        array("Valor"=>0,"Literal"=>"2º DAW A"),
        array("Valor"=>1,"Literal"=>"1º DAW A"),
    ));

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["muestreo"])) {
            $hayhorario = true;
            $i = intval($_POST["horario"]);
            $grupo = HORARIOS[$i];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <link rel="stylesheet" href="./css/style.css">
    <title>Horario</title>
</head>
<body>
    <h1>DANIEL MARÍN LÓPEZ, PASSWORD: ECHO</h1>
    <form method="post" action="">
        <label>
            SELECCIONE UN HORARIO:
            <select name="horario">
                <?php
                    foreach (HORS as $value) {
                        $selected = ($ID == $value["Valor"]) ? "selected" : "" ;
                        echo "<option value=\"" . $value["Valor"] . "\" $selected>" . $value["Literal"] . "</option>";
                    }
                ?>
            </select>
        </label>
        <br/>
        <input type="submit" name="muestreo" value="Mostrar Horario"><br/>
    </form>
    <?php if ($hayhorario) {?>
        <h3><?php echo $grupo["grupo"] ?></h3>
        <table>
            <th>x</th><th>Lunes</th><th>Martes</th><th>Míercoles</th><th>Jueves</th><th>Viernes</th>
            <?php
                for ($i=1; $i < 7; $i++) { 
                    echo "<tr>";
                    echo "<th>".$i."ª</th>
                    <td class=\"".horarioDia("Lunes",$grupo["grupo"])[$i-1][0]."\">".horarioDia("Lunes",$grupo["grupo"])[$i-1][0]."<legend>".horarioDia("Lunes",$grupo["grupo"])[$i-1][1]."</legend></td>
                    <td class=\"".horarioDia("Martes",$grupo["grupo"])[$i-1][0]."\">".horarioDia("Martes",$grupo["grupo"])[$i-1][0]."<legend>".horarioDia("Martes",$grupo["grupo"])[$i-1][1]."</legend></td>
                    <td class=\"".horarioDia("Miércoles",$grupo["grupo"])[$i-1][0]."\">".horarioDia("Miércoles",$grupo["grupo"])[$i-1][0]."<legend>".horarioDia("Miércoles",$grupo["grupo"])[$i-1][1]."</legend></td>
                    <td class=\"".horarioDia("Jueves",$grupo["grupo"])[$i-1][0]."\">".horarioDia("Jueves",$grupo["grupo"])[$i-1][0]."<legend>".horarioDia("Jueves",$grupo["grupo"])[$i-1][1]."</legend></td>
                    <td class=\"".horarioDia("Viernes",$grupo["grupo"])[$i-1][0]."\">".horarioDia("Viernes",$grupo["grupo"])[$i-1][0]."<legend>".horarioDia("Viernes",$grupo["grupo"])[$i-1][1]."</legend></td>";
                    echo "</tr>";
                }
            ?>
    </table>
    <?php }?>
</body>
</html>