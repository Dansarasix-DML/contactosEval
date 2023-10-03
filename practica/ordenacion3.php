<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*ALGORITMO DE SELECCIÓN DIRECTA EN PHP:
            n = tamano_array;
            para i = 0 hasta n - 1:
                min_indice = i;
                para j = i + 1 hasta n -1:
                    si array[j] < array[min_indice]:
                        min_indice = j;
                temp = array[min_indice];
                array[min_indice] = array[i];
                array[i] = temp;
        */
        function Sel_Directa($array){
            $n = count($array);
            for ($i = 0; $i < $n - 1; $i++) {
                $minIndex = $i;
                for ($j = $i + 1; $j < $n; $j++) {
                    if ($array[$j] < $array[$minIndex]) {
                        $minIndex = $j;
                    }
                }
                $temp = $array[$minIndex];
                $array[$minIndex] = $array[$i];
                $array[$i] = $temp;
            }
            return $array;
        }
        $miarray = array(0 => 5, 1 => 2, 2 => 1, 3 => 8, 4 => 7);
        $miarray = Sel_Directa($miarray);
        foreach ($miarray as $i) {
            echo $i . "<br>";
        }
    ?>
</body>
</html>