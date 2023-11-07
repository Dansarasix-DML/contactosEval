<?php

    /**
     * @name existeValor
     * @param int $f Fila de entrada
     * @param int $c Columna de entrada
     * @param array $array Array de números aleatorios
     * 
     * @return boolean Devuelve true si el valor ya está dentro
     */
    function existeValor($f, $c, $array){
        // Verificar si $n ya está en $n_aleatorios
        $existe = false;
        foreach ($array as $numeros) {
            if ($f == $numeros[0] && $c == $numeros[1]) {
                $existe = true;
                break;
            }
        }
        
        return $existe;
    }

    /**
     * @name existeFila
     * @param int $fila Fila generada
     * @param array $verbos Array de verbos
     * 
     * @return boolean Devuelve true si el valor ya está dentro
     */
    function existeFila($fila, $verbos){
        $existe = false;
        foreach ($verbos as $indice => $verbo) {
            if ($indice == $fila) {
                $existe = true;
                break;
            }
        }
        return $existe;
    }

?>