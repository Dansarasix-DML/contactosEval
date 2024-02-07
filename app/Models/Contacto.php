<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Models;

    class Contacto extends DBAbstractModel{
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
        private $nombre;
        private $telefono;
        private $email;
        private $provincia;
        private $created_at;
        private $updated_at;

        public function setID($id){
            $this->id = $id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setProv($provincia){
            $this->provincia = $provincia;
        }

        public function getID(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getProv(){
            return $this->provincia;
        }

        public function getMensaje(){
            return $this->mensaje;
        }

        public function get($id="") {
            if ($id != "") {
                $this->query = "SELECT *
                FROM contacto WHERE id = :id";
                $this->parametros["id"] = $id;
                $this->getResultsFromQuery();
            }

            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Contacto encontrado';
            } else {
                $this->mensaje = 'Contacto no encontrado';
            }
            return $this->rows[0] ?? null;
            
        }

        public function getAll() {
            $this->query = "SELECT * FROM contacto";

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

        public function set() {
            $this->query = "INSERT INTO contacto (nombre, telefono, email)
            VALUES(:nombre, :telefono, :email)";

            $this->parametros['nombre']= $this->nombre;
            $this->parametros['telefono']= $this->telefono;
            $this->parametros['email']= $this->email;
            $this->getResultsFromQuery();
            //$this->execute_single_query();
            $this->mensaje = 'Contacto añadido';
        }

        public function edit() {
            $fecha = new \DateTime();
            $this->query = "UPDATE contacto
            SET nombre=:nombre,
            telefono=:telefono,
            email=:email,
            updated_at=:fecha
            WHERE id = :id";

            $this->parametros['id'] = $this->id;
            $this->parametros['nombre'] = $this->nombre;
            $this->parametros['telefono'] = $this->telefono;
            $this->parametros['email'] = $this->email;
            $this->parametros['fecha'] = date("Y-m-d H:m:s", $fecha->getTimestamp());
            $this->getResultsFromQuery();
            $this->mensaje = 'Contacto modificado';
        }

        public function delete($id = "") {
            $this->query = "DELETE FROM contacto
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->getResultsFromQuery();
            $this->mensaje = 'Contacto eliminado';
        }

        public function getContactosByProvincia($provincia = "") {
            $this->query = "SELECT * FROM contacto WHERE provincia = :provincia";

            $this->parametros['provincia'] = $provincia;

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

    }




?>