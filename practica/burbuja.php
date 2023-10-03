<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*ALGORITMO DE BURBUJA EN PHP:
            para i -> 0 hasta n - 1:
                para j -> 0 hasta n - i - 1:
                    si a[j] > a[j + 1]:
                        aux = a[j]
                        a[j] = a[j + 1]
                        a[j + 1] = aux
                    fin si
                fin for
            fin for
        */
        function Burbuja($array){
            for ($i = 0; $i < (sizeof($array) - 1); $i++){
                for ($j = 0; $j < (sizeof($array) - $i - 1); $j++) {
                    if ($array[$j] > $array[$j + 1]){
                        $a = $array[$j];
                        $array[$j] =  $array[$j + 1];
                        $array[$j + 1] = $a;
                    }
                }
            }
            return $array;
        }
        /*ALGORITMO DE BÚSQUEDA BINARIA:
            array = [a1, a2, ..., an];
            valor = x;
            n = longitud_array;
            centro = 0;
            inferior = 0;
            superior = n - 1;
            mientras inferior <= superior:
                centro = ((superior - inferior) / 2) + inferior;
                si array[centro] == valor:
                    regresar array[centro];
                sino si array[centro] > valor:
                    superior = centro - 1;
                sino:
                    inferior = centro + 1;
        */
        function busquedaBinaria($array, $valor){
            $length = sizeof($array);
            $centro = 0;
            $inf = 0;
            $sup = $length - 1;
            while ($inf <= $sup){
                $centro = (($sup - $inf) / 2) + $inf;
                if ($array[$centro] == $valor){
                    return $array[$centro];
                }else if ($array[$centro] > $valor) {
                    $sup = $centro - 1;
                }else {
                    $inf = $centro + 1;
                }
            }
        }
        $miarray = array(0 => 5, 1 => 2, 2 => 1, 3 => 8, 4 => 7);
        $miarray = Burbuja($miarray);
        foreach ($miarray as $i) {
            echo $i . "<br>";
        }
        echo "---<br>";
        echo busquedaBinaria($miarray, 7);
    ?>
</body>
</html>