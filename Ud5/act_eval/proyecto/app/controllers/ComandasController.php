<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    
    class ComandasController extends BaseController {

        private function ComandasSesion() {

            session_start();
            //Cargamos variables
            $user=$pass="";


            if (!isset($_SESSION["auth"])) {
                $_SESSION["auth"] = false;
                $_SESSION["user"] = "Invitado";

            }  

            $auth = $_SESSION["auth"];
            $user = $_SESSION["user"];

            $procesaForm = false;

            if (isset($_POST["enviar"])) {
                //procesamos formulario
                $procesaForm = true;
                $_SESSION["user"] = $_POST["usuario"];
                $_SESSION["passwd"] = $_POST["passwd"];
            }   
            
            return array($auth, $user);
        }

        private function contienePalabra($nombreArchivo, $palabraClave) {
            return strpos($nombreArchivo, $palabraClave) !== false;
        }

        private function ElaborarComanda() {
            $directorio = "../files/";
            $file = $_POST["archivo"];

            // echo var_dump($file);

            list($init, $fecha, $hora, $estado) = explode("_", $file);

            rename($directorio.$file, $directorio."{$init}_{$fecha}_{$hora}_elaborada.txt");

            header("Location: http://famia.com/");
        }

        private function BorrarComanda() {
            $directorio = "../files/";
            $file = $_POST["archivo"];

            // echo var_dump($file);

            unlink($directorio.$file);
            
            header("Location: http://famia.com/");
        }

        private function ComandasInicio($user) {
            $comandas_pendientes = [];
            echo "Bienvenido ".$user;
            // echo "<br/><a href=\"#\">Cerrar sesión</a>";
            include "../include/cierre_form.php";
            if (isset($_POST["cierre"])) {
                session_unset();
                session_destroy();
                header("Location: http://famia.com/");
            }

            if (isset($_POST["elaborar"])) {
                $this->ElaborarComanda();
            }

            if (isset($_POST["borrar"])) {
                $this->BorrarComanda();
            }

            echo "<hr/>";
            echo "<h3>Comandas</h3>";
            $directorio = "../files/";
            $archivos = scandir($directorio);

            echo "<ul>";
            foreach ($archivos as $archivo) {
                if ($archivo != "." && $archivo != "..") {
                    $rutaArchivo = $directorio . "/" . $archivo;

                    $handle = fopen($rutaArchivo, "r");

                    $primeraLinea = fgets($handle);

                    fclose($handle);

                    $nopendiente = ($this->contienePalabra($archivo, "elaborada") ? true : false);
                    $style = $nopendiente ? "elaborada" : "pendiente";
                    echo "<li class=\"{$style}\"><form method=\"post\" action=\"\">";
                    echo str_replace('-', '', $primeraLinea);;
                    if (!$nopendiente) {
                        echo "<input type=\"hidden\" name=\"archivo\" value=\"$archivo\">";
                        echo "<input class=\"boton\" type=\"submit\" name=\"elaborar\" value=\"Realizar comanda\">";
                    } else {
                        echo "<input type=\"hidden\" name=\"archivo\" value=\"$archivo\">";
                        echo "<input class=\"boton\" type=\"submit\" name=\"borrar\" value=\"Borrar comanda\">";
                    }
                    echo "</form></li>";
                }
            }
            echo "</ul>";
        }

        private function testInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        private function Login() {
            $user = $this->testInput($_POST["usuario"]);
            $pass = $this->testInput($_POST["passwd"]);


            foreach (USERS as $usuario) {
                if ($user == $usuario->getUser() && $pass == $usuario->getPasswd()) {
                    $_SESSION["auth"] = true;
                    $_SESSION["user"] = $usuario->getUser();
                }
            }

            header("Location: http://famia.com/");
        }

        public function ComandasAction() {
            $datos = $this->ComandasSesion();

            $auth = $datos[0];
            $user = $datos[1];

            ob_start();
            ?>
            <div id="sesion">
            <?php
                if ($auth) {
                    $this->ComandasInicio($user);
            ?>

                <?php } else {
                    echo "Por favor, identifiquese:<br/><br/>";
                    include("../include/login_form.php");
                    if (isset($_POST["enviar"])) {
                        $this->Login();
                    }
                }
                
            ?>
        </div>
        <?php
            $html = ob_get_clean(); // Obtiene el contenido del búfer y lo limpia
            $data = array('comanda' => $html);
            $this->renderHTML("../views/comandas_index.php",$data);
        }

    }

?>