<?php
    /**
     * Script de configuración
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    $serverIp = $_SERVER['HTTP_HOST'];

    $datos = array(
        "nombre" => "Daniel",
        "apellidos" => "Marín López",
        "foto" => "./img/foto.jpg",
        "mail" => "a21maloda@iesgrancapitan.org",
        "phone" => "618367935",
        "redessociales" => array(
            "twitter" => "https://twitter.com/",
            "linkedin" => "https://es.linkedin.com/"
        ),
        "resumen" => "Lorem ipsum dolor sit amet, consec",
        "trabajos" => array(
            array(
                "titulo" => "Programación",
                "descripción" => "lorem ipsum",
                "visible" => true,
                "fechainicio" => "15/09/2022",
                "fechafinal" => "13/05/2023",
                "logros" => array("Director de proyectos", "Formación Python")
            ),
            array(
                "titulo" => "Bases de Datos",
                "descripción" => "lorem ipsum",
                "visible" => true,
                "fechainicio" => "15/09/2021",
                "fechafinal" => "22/06/2022",
                "logros" => array("Secretario de Bases de Datos", "Formación MySQL")
            ),
            array(
                "titulo" => "Lenguaje de Marcas",
                "descripción" => "lorem ipsum",
                "visible" => true,
                "fechainicio" => "15/09/2021",
                "fechafinal" => "22/06/2022",
                "logros" => array("Diseñador de Páginas", "Formación HTML 5 Y CSS 3")
            )
        ),
        "proyectos" => array(
            array(
                "titulo" => "Desarrollo Web en Entorno Servidor",
                "descripción" => "Trabajo realizado durante el curso",
                "logo" => "",
                "tecnologias" => "HTML, PHP",
                "url" => "http://".$serverIp."/DWES/"
            ),
            array(
                "titulo" => "Proyecto 2",
                "descripción" => "lorem ipsum",
                "logo" => "",
                "tecnologias" => "MySQL, Python",
                "url" => ""
            )
        ),
        "skills" => array(
            array(
                "categoria" => "Idiomas",
                "Habilidades" => array("Inglés")
            ),
            array(
                "categoria" => "Manejo de lenguajes",
                "Habilidades" => array("Python", "MySQL", "HTML")
            )
        )
    );
?>