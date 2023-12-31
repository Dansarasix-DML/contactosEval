<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Models;

    class Pizza {
        private $id;
        private $nombre;
        private $tamano;
        private $precio;
        private $cantidad;

        public function __construct($id, $nombre, $tamano, $precio, $cantidad) {
            $this->setId($id);
            $this->setNombre($nombre);
            $this->setTamano($tamano);
            $this->setPrecio($precio);
            $this->setCantidad($cantidad);
        }

        public function getId() {
            return $this->id;
        }
    
        public function setId($id) {
            $this->id = $id;
        }

        public function getNombre() {
            return $this->nombre;
        }
    
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getTamano() {
            return $this->tamano;
        }
    
        public function setTamano($tamano) {
            $this->tamano = $tamano;
        }

        public function getPrecio() {
            return $this->precio;
        }
    
        public function setPrecio($precio) {
            $this->precio = $precio;
        }

        public function getCantidad() {
            return $this->cantidad;
        }
    
        public function setCantidad($cantidad) {
            $this->cantidad = $cantidad;
        }
    }

?>