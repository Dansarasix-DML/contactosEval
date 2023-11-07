<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Clase Perro que tiene varios atributos y métodos
     */

    namespace App\Models;
    class Perro {
        private $_color;
        private $_nombre;
        private $_habilidad;
        private $_sociabilidad;

        public function __construct($color, $nombre){
            $this->_color = $color;
            $this->_nombre = $nombre;
            $this->_habilidad = 0;
            $this->_sociabilidad = 5;
        }

        public function entrenar(){
            if($this->_habilidad <= 100){
                $this->_habilidad++;
            }
        }

        public function darPata(){
            $ret = "¿Cómo?";
            if($this->_habilidad > 5){
                $ret = "Levanta la pata";
            }
            return $ret;
        }
    }
?>