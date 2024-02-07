<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    
    namespace App\Models;
    use App\Models\DBAbstractModel;

    class Usuario extends DBAbstractModel{

        private static $instancia;
        public static function getInstancia(){
            if (!isset(self::$instancia)) {
                $miclase = __CLASS__;
                return self::$instancia = new $miclase;
            }
            return self::$instancia;
        }
        public function __clone(){
            trigger_error("CLONACIÓN NO PERMITIDA", E_USER_ERROR);
        }

        private $id;
        private $usuario;
        private $passwd;
        // private $created_at;
        // private $updated_at;

        public function setID($id){
            $this->id = $id;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        public function setPasswd($passwd){
            $this->passwd = $passwd;
        }

        public function getID(){
            return $this->id;
        }

        public function getUsuario(){
            return $this->usuario;
        }

        public function getPasswd(){
            return $this->passwd;
        }

        public function getMensaje(){
            return $this->mensaje;
        }

        public function login($usuario, $passwd) {
            $this->query = "SELECT *
            FROM usuario
            WHERE usuario = :usuario and
            password = :password";

            $this->parametros["usuario"] = $usuario;
            $this->parametros["password"] = $passwd;

            $this->getResultsFromQuery();
            if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'sh encontrado';
                
            } else {
                $this->mensaje = 'sh no encontrado';
            }
            return $this->rows[0] ?? null;

        }

        public function get($id="") {
            if ($id != "") {
                $this->query = "SELECT *
                FROM usuario WHERE id = :id";
                $this->parametros["id"] = $id;
                $this->getResultsFromQuery();
            }

            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Usuario encontrado';
            } else {
                $this->mensaje = 'Usuario no encontrado';
            }
            return $this->rows[0] ?? null;
            
        }

        public function getAll() {
            $this->query = "SELECT * FROM usuario";

            $this->getResultsFromQuery();

            if (count($this->rows) > 0) {
                foreach ($this->rows as $indice => $fila) {
                    foreach ($fila as $propiedad => $valor) {
                        $this->$propiedad = $valor;
                    }
                }
                $this->mensaje = 'Registros encontrados';
            } else {
                $this->mensaje = 'No se encontraron registros';
            }
            return $this->rows ?? null;
        }

        public function getByCredentials($user = "", $passwd = "") {
            if ($user != "" && $passwd != "") {
                $this->query = "SELECT *
                FROM usuario WHERE usuario = :user
                AND password = :passwd";
                $this->parametros["user"] = $user;
                $this->parametros["passwd"] = $passwd;
                $this->getResultsFromQuery();
            }

            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Usuario encontrado';
            } else {
                $this->mensaje = 'Usuario no encontrado';
            }
            return $this->rows[0] ?? null;
        }

        public function set() {
            $this->query = "INSERT INTO usuario (usuario, password)
            VALUES(:usuario, :passwd)";

            $this->parametros['usuario']= $this->usuario;
            $this->parametros['passwd']= $this->passwd;
            $this->getResultsFromQuery();
            //$this->execute_single_query();
            $this->mensaje = 'Usuario añadido';
        }

        public function edit() {
            // $fecha = new \DateTime();
            $this->query = "UPDATE usuario
            SET usuario=:usuario,
            password=:passwd
            WHERE id = :id";

            $this->parametros['id'] = $this->id;
            $this->parametros['usuario'] = $this->usuario;
            $this->parametros['passwd'] = $this->passwd;
            // $this->parametros['fecha'] = date("Y-m-d H:m:s", $fecha->getTimestamp());
            $this->getResultsFromQuery();
            $this->mensaje = 'Usuario modificado';
        }

        public function delete($id = "") {
            $this->query = "DELETE FROM usuario
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->getResultsFromQuery();
            $this->mensaje = 'Usuario eliminado';
        }

    }


?>