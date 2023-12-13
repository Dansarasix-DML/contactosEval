<?php
    /**
     * @author Daniel Marñin López
     * @version 0.01a
     * 
     */

    $preguntas = array(
        array(
            "ID" => 1,
            "Titulo" => "Examen tipo test 1",
            "Corrector" => array("a","b","c"),
            "Preguntas" => array(
                array(
                    "idpregunta" => 1,
                    "Pregunta"=>"1. Pregunta 1",
                    "respuestas"=>array("a) Respuesta 1.","b) Respuesta 2.","c) Respuesta 3.")
                ),
                array(
                    "idpregunta" => 2,
                    "Pregunta"=>"2. Pregunta 2",
                    "respuestas"=>array("a) Respuesta 1.","b) Respuesta 2.","c) Respuesta 3.")
                ),
                array(
                    "idpregunta" => 3,
                    "Pregunta"=>"3. Pregunta 3",
                    "respuestas"=>array("a) Respuesta 1.","b) Respuesta 2.","c) Respuesta 3.")
                )

            )
        )
    );


    define("TESTS",array(
        array("Valor"=>$preguntas[0]["ID"], "Literal"=>$preguntas[0]["Titulo"]),
    ));


?>