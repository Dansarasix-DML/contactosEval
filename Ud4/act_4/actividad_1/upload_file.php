<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Procesamiento del fichero para generar usuarios
     */

    include "./includes/funciones.php";

    //Array de alumnos
    $alumnos = array();
    $procesaForm = false;

    //Comprobamos que el fichero se puede ejecutar
    if (!isset($_POST["envio"])) {
        header("location: index.php");
    } else {
        $procesaForm = true;
        if (isset($_POST["tipo"])) {
            $tipo = $_POST["tipo"];
        }

        if (isset($_POST["curso"])) {
            $curso = $_POST["curso"];
        }
    }

    //Cargamos constantes
    define("DIR_LOAD","./files/");
    define("MAX_SIZE","200000");
    $extensions = array("csv");
    $formats = array("text/csv");
    $aux = explode(".", $_FILES["file"]["name"]);
    $extension = end($aux);
    
    //Procesamiento del fichero
    if (($_FILES["file"]["size"] <= MAX_SIZE) and (in_array($extension, $extensions)) and (in_array($_FILES["file"]["type"], $formats))) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: ". $_FILES["file"]["error"];
        } else {
            $file_name = uniqid().".".pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            if (file_exists(DIR_LOAD . $file_name)) {
                echo "El fichero ya existe";
            } else {
                if ($procesaForm) {
                    $uploaded_file = DIR_LOAD . $file_name;
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $uploaded_file)){
                        if (($handle = fopen($uploaded_file,"r")) !== false) {
                            $firstLine = true;
                            while (($data = fgetcsv($handle, null, ",")) !== false) {
                                if ($firstLine) {
                                    $firstLine = false;
                                    continue;
                                }
                                $user_or = $user = procesaNombre($data[0]);
                                $i = 1;
                                while (in_array($user, $alumnos)) {
                                    $user = $user_or . $i;
                                    $i++;
                                }
                                $alumnos[] = $user;
                                //$i = 1;
                            }
                            fclose($handle);
                            //No queremos el archivo en nuestro servidor
                            if (file_exists($uploaded_file)) {
                                unlink($uploaded_file);
                            }
                            Genera_fichero(DIR_LOAD, $tipo, $curso, $alumnos);
                            
                            $nombreArchivo = FICHEROS[$tipo];
                            $rutaArchivo = DIR_LOAD . $nombreArchivo;

                            // Verificar si el archivo existe antes de realizar la descarga
                            if (file_exists($rutaArchivo)) {
                                // Encabezados para forzar la descarga del archivo
                                header('Content-Description: File Transfer');
                                header('Content-Type: application/octet-stream');
                                header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
                                header('Expires: 0');
                                header('Cache-Control: must-revalidate');
                                header('Pragma: public');
                                header('Content-Length: ' . filesize($rutaArchivo));

                                // Leer y mostrar el contenido del archivo
                                readfile($rutaArchivo);
                                unlink($rutaArchivo);
                                exit;
                            } else {
                                echo "El archivo no existe.";
                            }
                        }
                    }
                }
            }
        }
    } else {
        echo "Ha ocurrido un error.";
    }

?>