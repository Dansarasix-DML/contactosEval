<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */


    namespace App\Controllers;
    use App\Models\Usuario;

    class AuthController{


        public function LoginAction() {

            if (isset($_POST)) {
                $user = $_POST["user"];
                $passwd = $_POST["passwd"];

                $usuario = Usuario::getInstancia();

                $auth = $usuario->getByCredentials($user, $passwd);

                if ($auth) {
                    $_SESSION["profile"] = "Usuario";
                    $_SESSION["user"] = $auth;
                }

            }

            header("Location: http://contactos.eval/");

            
        }

        public function LogoutAction() {

            session_unset();

            session_destroy();

            header("Location: http://contactos.eval/");
            
        }

    }



?>