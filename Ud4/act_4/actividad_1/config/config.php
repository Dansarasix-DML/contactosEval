<?php
    /**
     * @author Daniel Marñin López
     * @version 0.01a
     * 
     * Fichero de configuración
     */

    define("OPCIONES", array(
        array("Valor"=>"A","Literal"=>"MYSQL"),
        array("Valor"=>"B","Literal"=>"ORACLE"),
        array("Valor"=>"C","Literal"=>"LINUX")
    ));

    define("CURSOS", array(
        array("Valor"=>"23-24","Literal"=>"2023/2024"),
        array("Valor"=>"22-23","Literal"=>"2022/2023"),
        array("Valor"=>"21-22","Literal"=>"2021/2022"),
        array("Valor"=>"20-21","Literal"=>"2020/2021"),
        array("Valor"=>"19-20","Literal"=>"2019/2020"),
        array("Valor"=>"18-19","Literal"=>"2018/2019")
    ));

    define("FICHEROS", array(
        "A" => "usuarios_mysql.txt",
        "B" => "usuarios_oracle.txt",
        "C" => "usuarios_linux.txt"
    ));

    define("ACENTOS", array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ'));
    define("SIN_ACENTOS", array('a', 'e', 'i', 'o', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'N'));

?>