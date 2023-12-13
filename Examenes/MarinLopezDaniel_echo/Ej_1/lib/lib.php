<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * @DNI: 31880329
     */

    //Password: echo
    /**
     * @name horarioDia
     * @param string, dia de la semana
     * @param string, grupo al que pertenece el horario
     * return array, array bidimensional indexado con la asignatura y su profesor guardados
     * en orden según la hora.
     */
    function horarioDia($dia, $grupo) {
        $asignaturas = array();

        foreach (HORARIOS as $g) {
            if ($grupo == $g["grupo"]) {
                // echo $g["grupo"];
                $i = 0;
                foreach ($g["horario"] as $key => $value) {
                    for ($i=0; $i < count($value["horas"]); $i++) { 
                        if ($dia == $value["horas"][$i]["Dia"]) {
                            $asignaturas[intval(substr($value["horas"][$i]["Hora"], 0))-1] = [$key, $value["profesor"]];
                        }
                    }
                }
            }
        }

        return $asignaturas;
    }

?>