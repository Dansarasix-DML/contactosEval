<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Clase Persona que tiene varios atributos y métodos
     */

    namespace App\Models;

    class Persona {
        private $_nombre;
        private $_apellido1;
        private $_apellido2;

        public function __construct($nombre, $ap1, $ap2) {
            $this->_nombre = $nombre;
            $this->_apellido1 = $ap1;
            $this->_apellido2 = $ap2;
        }

        // public function __destruct() {
        //     echo $this->_nombre . "destruido";
        // }

        public function saluda() {
            echo "Hola Mundo<br/>";
        }

        public function Nombre() {
            return $this->_nombre." ".$this->_apellido1." ".$this->_apellido2;
        }
    }

?>