<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * @DNI: 31880329
     */

    #Ejercicio 0
    //Password: echo
    // Array indexado unidimensional constante de las contraseñas para el ejercicio 0
    define('PASSWS', array("array", "for", "while", "foreach", "if", "function", "echo"));


    #Ejercicio 1.

    //Password: echo
    //Este es el array indexado multidimensional donde aparecen los horarios 

    $horarios = array(
        array (
                "grupo"=>"2º DAW A",
                //Array asociativo del horario del curso
                "horario"=>array(
                            //Array asociativo de asignaturas
                            "DWES"=>array("nombre"=>"Desarrollo web en entorno servidor",
                                    "profesor"=>"José Aguilera",
                                    //Array indexado de las horas de cada asignatura
                                    "horas"=>array(
                                        //Array asociativo con el día y la hora                                                 
                                        array("Dia"=>"Lunes", "Hora"=>"1ª"),
                                        array("Dia"=>"Lunes", "Hora"=>"2ª"),
                                        array("Dia"=>"Martes", "Hora"=>"1ª"),
                                        array("Dia"=>"Martes", "Hora"=>"2ª"),
                                        array("Dia"=>"Miércoles", "Hora"=>"1ª"),
                                        array("Dia"=>"Miércoles", "Hora"=>"2ª"),
                                        array("Dia"=>"Viernes", "Hora"=>"3ª"),
                                        array("Dia"=>"Viernes", "Hora"=>"4ª")
                                    )
                            ),
                            "DWEC"=>array("nombre"=>"Desarrollo Web en entorno cliente",
                                    "profesor"=>"Lourdes Margarin",
                                    "horas"=>array(
                                            array("Dia"=>"Lunes", "Hora"=>"3ª"),
                                            array("Dia"=>"Lunes", "Hora"=>"4ª"),
                                            array("Dia"=>"Martes", "Hora"=>"3ª"),
                                            array("Dia"=>"Martes", "Hora"=>"4ª"),
                                            array("Dia"=>"Jueves", "Hora"=>"1ª"),
                                            array("Dia"=>"Jueves", "Hora"=>"2ª")
                                    )
                            ),
                            "DIW"=>array("nombre"=>"Diseño de Interfaces Web",
                                    "profesor"=>"Jaime Rabasco",
                                    "horas"=>array(
                                            array("Dia"=>"Miércoles", "Hora"=>"3ª"),
                                            array("Dia"=>"Miércoles", "Hora"=>"4ª"),
                                            array("Dia"=>"Jueves", "Hora"=>"5ª"),
                                            array("Dia"=>"Jueves", "Hora"=>"6ª"),
                                            array("Dia"=>"Viernes", "Hora"=>"1ª"),
                                            array("Dia"=>"Viernes", "Hora"=>"2ª")
                                    )
                            ),
                            "DeAW"=>array("nombre"=>"Desarrollo de Aplicaciones Web",
                                    "profesor"=>"Carmen Tripiana",
                                    "horas"=>array(
                                            array("Dia"=>"Martes", "Hora"=>"5ª"),
                                            array("Dia"=>"Martes", "Hora"=>"6ª"),
                                            array("Dia"=>"Viernes", "Hora"=>"5ª")
                                    )
                            ),
                            "EIE"=>array("nombre"=>"Empresas e Iniciativa Empresarial",
                                    "profesor"=>"Raquel",
                                    "horas"=>array(
                                            array("Dia"=>"Lunes", "Hora"=>"5ª"),
                                            array("Dia"=>"Lunes", "Hora"=>"6ª"),
                                            array("Dia"=>"Miércoles", "Hora"=>"5ª"),
                                            array("Dia"=>"Miércoles", "Hora"=>"6ª"),
                                    )
                            ),
                            "HLC"=>array("nombre"=>"Horas de Libre Configuración",
                                    "profesor"=>"Daniel Marín López",
                                    "horas"=>array(
                                            array("Dia"=>"Jueves", "Hora"=>"3ª"),
                                            array("Dia"=>"Jueves", "Hora"=>"4ª"),
                                            array("Dia"=>"Viernes", "Hora"=>"6ª")
                                    )
                            )			
                )
        ),
        array (
                "grupo"=>"1º DAW A",
                "horario"=>array(
                    "PROG"=>array("nombre"=>"Programación",
                            "profesor"=>"José Cuervo",
                            "horas"=>array(
                                //Array con el día y la hora                                                 
                                array("Dia"=>"Lunes", "Hora"=>"1ª"),
                                array("Dia"=>"Lunes", "Hora"=>"2ª"),
                                array("Dia"=>"Martes", "Hora"=>"1ª"),
                                array("Dia"=>"Martes", "Hora"=>"2ª"),
                                array("Dia"=>"Miércoles", "Hora"=>"1ª"),
                                array("Dia"=>"Miércoles", "Hora"=>"2ª"),
                                array("Dia"=>"Viernes", "Hora"=>"3ª"),
                                array("Dia"=>"Viernes", "Hora"=>"4ª")
                            )
                    ),
                    "BD"=>array("nombre"=>"Bases de Datos",
                            "profesor"=>"Jorge",
                            "horas"=>array(
                                    array("Dia"=>"Lunes", "Hora"=>"3ª"),
                                    array("Dia"=>"Lunes", "Hora"=>"4ª"),
                                    array("Dia"=>"Martes", "Hora"=>"3ª"),
                                    array("Dia"=>"Martes", "Hora"=>"4ª"),
                                    array("Dia"=>"Jueves", "Hora"=>"1ª"),
                                    array("Dia"=>"Jueves", "Hora"=>"2ª")
                            )
                    ),
                    "SIS"=>array("nombre"=>"Sistemas",
                            "profesor"=>"Miguel Angel",
                            "horas"=>array(
                                    array("Dia"=>"Miércoles", "Hora"=>"3ª"),
                                    array("Dia"=>"Miércoles", "Hora"=>"4ª"),
                                    array("Dia"=>"Jueves", "Hora"=>"5ª"),
                                    array("Dia"=>"Jueves", "Hora"=>"6ª"),
                                    array("Dia"=>"Viernes", "Hora"=>"1ª"),
                                    array("Dia"=>"Viernes", "Hora"=>"2ª")
                            )
                    ),
                    "LM"=>array("nombre"=>"Lenguaje de Marcas",
                            "profesor"=>"Antonio",
                            "horas"=>array(
                                    array("Dia"=>"Martes", "Hora"=>"5ª"),
                                    array("Dia"=>"Martes", "Hora"=>"6ª"),
                                    array("Dia"=>"Viernes", "Hora"=>"5ª")
                            )
                    ),
                    "FOL"=>array("nombre"=>"Formación y Orientación Laboral",
                            "profesor"=>"Carmen",
                            "horas"=>array(
                                    array("Dia"=>"Lunes", "Hora"=>"5ª"),
                                    array("Dia"=>"Lunes", "Hora"=>"6ª"),
                                    array("Dia"=>"Miércoles", "Hora"=>"5ª"),
                                    array("Dia"=>"Miércoles", "Hora"=>"6ª"),
                            )
                    ),
                    "ED"=>array("nombre"=>"Entornos de Desarrollo",
                            "profesor"=>"Fernando",
                            "horas"=>array(
                                    array("Dia"=>"Jueves", "Hora"=>"3ª"),
                                    array("Dia"=>"Jueves", "Hora"=>"4ª"),
                                    array("Dia"=>"Viernes", "Hora"=>"6ª")
                            )
                    )			
                ) 
        )
    );

    define("HORARIOS", $horarios);

    #Ejercicio 2.


    #array de idiomas
    //Password: echo
    // Array indexado que contiene todos los idiomas posibles.
    $idiomas = array("Español", "Inglés","Francés", "Aleman","Italiano","Portugués");

    #array con el cuestionario.
    //Password: echo
    // Array indexado bidimensional asociativo que recoge las preguntas con su tipo, enunciado, respuestas, etc.
    $test = array(
        array ("pregunta" => "The room where secretaries work is called an .....",
            "Tipo"=>"text",
            "Respuesta"=>array("office"),
            "Acierto"=>1,
            "Fallo"=>0),
        array ("pregunta" => "To go to the top of the building you can take the .....",
            "Tipo"=>"text",
            "Respuesta"=>array("lift","elevator"),
            "Acierto"=>1,
            "Fallo"=>0),
        array ("pregunta" => "I ..... tennis every Sunday morning.",
            "Tipo"=>"Multiple-choice",
            "Opciones"=>array("playing","play","am playing","am play"),
            "Respuesta"=>"play",
            "Acierto"=>1,
            "Fallo"=>-0.25),
        array ("pregunta" => "Don't make so much noise. Noriko ..... to study for her ESL test!",
            "Tipo"=>"Multiple-choice",
            "Opciones"=>array("try","tries","tried","is trying"),
            "Respuesta"=>"is trying",
            "Acierto"=>1,
            "Fallo"=>-0.25),
        array ("pregunta" => "Jun-Sik ..... his teeth before breakfast every morning.",
            "Tipo"=>"Multiple-choice",
            "Opciones"=>array("will cleaned","is cleaning","cleans","clean"),
            "Respuesta"=>"cleans",
            "Acierto"=>1,
            "Fallo"=>-0.25),
        array ("pregunta" => "Sorry, she can't come to the phone. She ..... a bath!",
            "Tipo"=>"Multiple-choice",
            "Opciones"=>array("is having","having","have","has"),
            "Respuesta"=>"is having",
            "Acierto"=>1,
            "Fallo"=>-0.25),
        array ("pregunta" => "	..... many times every winter in Frankfurt.",
            "Tipo"=>"Multiple-choice",
            "Opciones"=>array("It snows","snowed","It is snowing","It is snow"),
            "Respuesta"=>"It snows",
            "Acierto"=>1,
            "Fallo"=>-0.25)
            );