<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*ALGORITMO DE ORDENACIÓN DIRECTA EN PHP:
            n = tamano_array;
            para i = 1 hasta n - 1:
                elemento_actual = array[i];
                j = i - 1;
                mientras j >= 0 Y array[j] > elemento_actual:
                    array[j + 1] = array[j];
                    j--;
                array[j + 1] = elemento_actual;
        */
        function Ord_Directa($array){
            $n = count($array);
            for ($i = 1; $i < $n; $i++) {
                $elemento_actual = $array[$i];
                $j = $i - 1;
                while ($j >= 0 && $array[$j] > $elemento_actual) {
                    $array[$j + 1] = $array[$j];
                    $j--;
                }
                $array[$j + 1] = $elemento_actual;
            }
            return $array;
        }

        $miarray = array(0 => 5, 1 => 2, 2 => 1, 3 => 8, 4 => 7);
        $miarray = Ord_Directa($miarray);
        foreach ($miarray as $i) {
            echo $i . "<br>";
        }
    ?>
</body>
</html>