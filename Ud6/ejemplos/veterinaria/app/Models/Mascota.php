<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    // require_once "DBAbstractModel.php";
    namespace App\Models;

    class Mascota extends DBAbstractModel {
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
        private $tipo;
        private $inteligencia;
        private $created_at;
        private $updated_at;

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
        public function setInteligencia($inteligencia){
            $this->inteligencia = $inteligencia;
        }

        public function getMensaje(){
            return $this->mensaje;
        }

        public function set($user_data=array()){
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "INSERT INTO animal_mascota(nombre, tipo, inteligencia)
                            VALUES(:nombre, :tipo, :inteligencia)";
            //$this->parametros['id']= $id;
            $this->params['nombre']= $this->nombre;
            $this->params['tipo']= $this->tipo;
            $this->params['inteligencia']= $this->inteligencia;
            $this->get_results_from_query();
            //$this->execute_single_query();
            $this->mensaje = 'Mascota agregada correctamente';
        
        }

        public function get($id){
            if($id != '') {
                $this->query = "
                SELECT *
                FROM animal_mascota
                WHERE id = :id";
                //Cargamos los parámetros.
                $this->params['id']= $id;
                //Ejecutamos consulta que devuelve registros.
                $this->get_results_from_query();
                }
                if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
                }
                $this->mensaje = 'sh encontrado';
                }
                else {
                $this->mensaje = 'sh no encontrado';
                }
                return $this->rows;
        }
        public function edit($user_data=array()){
            $nombre=$tipo=$inteligencia='';
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
                }
                $this->query = "
                UPDATE animal_mascota
                SET nombre=:nombre,
                tipo=:tipo,
                inteligencia=:inteligencia
                WHERE id = :id
                ";
                // $this->parametros['id']=$id;
                $this->params['nombre']=$nombre;
                $this->params['tipo']=$tipo;
                $this->params['inteligencia']=$inteligencia;
                $this->get_results_from_query();
                $this->mensaje = 'sh modificado';
        }
        public function delete($id=''){
            $this->query = "DELETE FROM superheroes
            WHERE id = :id";
            $this->params['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'SH eliminado';
        }

    }

?>