<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Funciones para procesar ficheros
     */

    include "./config/config.php";

    /**
     * @name procesaNombre
     * @param string $str Nombre con apellidos
     * @return string nombre de usuarios
     * 
     * Función que recibe el nombre y los apellidos de un alumno y devuelve su usuario
     */
    function procesaNombre($str) : String {
        $str = str_replace(ACENTOS, SIN_ACENTOS, $str);
        $str = str_replace(',', '', $str);
        $str = strtolower($str);
        $array = explode(' ', $str);
        switch (count($array)) {
            case 2:
                $ap1 = substr($array[0], 0, 4);
                $nom = substr($array[1], 0, 4);
                $usuario = $ap1 . $nom;
                break;
            
            default:
                $ap1 = substr($array[0], 0, 2);
                $ap2 = substr($array[1], 0, 2);
                $nom = substr($array[2], 0, 2);
                $usuario = $ap1 . $ap2 . $nom;
                break;
        }
        return $usuario;
    }

    /**
     * @name existeUsuario
     * @param string $user Fila de entrada
     * @param array $array Array de números aleatorios
     * 
     * @return boolean Devuelve true si el valor ya está dentro
     */
    function existeUsuario($user, $array){
        // Verificar si $n ya está en $n_aleatorios
        $existe = false;
        foreach ($array as $usuario) {
            if ($user === $usuario) {
                $existe = true;
                break;
            }
        }
        
        return $existe;
    }

    /**
     * @name Genera_fichero
     * @param string $dir Directorio donde se guarda el archivo
     * @param string $tipo Tipo de usuario (MySQL, ORACLE, LINUX)
     * @param string $curso Curso de los alumnos
     * @param array $alumnos Array con los nombres de los alumnos
     * 
     * Función que crea un archivo con los usuarios de los alumnos
     */
    function Genera_fichero($dir, $tipo, $curso, $alumnos){
        switch ($tipo) {
            case 'A':
                $file = $dir . "usuarios_mysql.txt";
                $handle = fopen($file,"w");
                if ($handle === false) {
                    die("No se puedo abrir el archivo");
                }
                foreach ($alumnos as $alumno) {
                    $user = "---\n";
                    $user .= "Usuario: ".$alumno."_2daw\n";
                    $user .= "BD: ".$alumno."_2daw\n";
                    switch (strlen($alumno)) {
                        case 8:
                            //Solo 1 apellido
                            $AA = $alumno[0].$alumno[1].$alumno[2].$alumno[3];
                            $name = $alumno[4].$alumno[5].$alumno[6].$alumno[7];
                            $user .= "AA: ".$AA." \n";
                            $user .= "n: ".$name." \n";
                            break;
                        
                        default:
                            $AA = $alumno[0].$alumno[1];
                            $aa = $alumno[2].$alumno[3];
                            $name = $alumno[4].$alumno[5];
                            $user .= "AA: ".$AA." \n";
                            $user .= "aa: ".$aa." \n";
                            $user .= "n: ".$name." \n";
                            break;
                    }
                    $user .= "Ayuda:\n";
                    $user .= "BD: CREATE DATABASE bdejemplo\n";
                    $user .= "Usuarios: GRANT ALL PRIVILEGES ON bdejemplo.*TO'".$alumno."'@'localhost'\n";
                    $user .= "IDENTIFIED BY 'clave'\n";
                    fwrite($handle, $user);
                    $user = "";
                }
                $user = "---";
                fwrite($handle, $user);
                fclose($handle);
                break;
            case 'B':
                $file = $dir . "usuarios_oracle.txt";
                $handle = fopen($file,"w");
                if ($handle === false) {
                    die("No se puedo abrir el archivo");
                }
                foreach ($alumnos as $alumno) {
                    $user = "---\n";
                    $user .= "CREATE USER ".$alumno." IDENTIFIED BY usuario\n";
                    $user .= "GRANT SELECT ON bdejemplo TO ".$alumno."\n";
                    $user .= "ALTER USER ".$alumno." QUOTA 100M ON 2daw_".$curso."\n";
                    $user .= "COMMIT\n";
                    fwrite($handle, $user);
                    $user = "";
                }
                $user = "---";
                fwrite($handle, $user);
                fclose($handle);
                break;
            case 'C':
                $file = $dir . "usuarios_linux.txt";
                $handle = fopen($file,"w");
                if ($handle === false) {
                    die("No se puedo abrir el archivo");
                }
                foreach ($alumnos as $alumno) {
                    $comando = "sudo useradd -G 2daw_".$curso." -d /2daw_".$curso."/".$alumno." -s /bin/bash -p usuario " . $alumno . "\n";
                    fwrite($handle, $comando);
                }
                fclose($handle);
                break;
            default:
                echo "Tipo no válido";
                break;
        }
    }


?>