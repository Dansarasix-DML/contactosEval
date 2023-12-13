<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Models;

    abstract class DBAbstractModel{
        private static $db_host = DBHOST;
        private static $db_user = DBUSER;
        private static $db_pass = DBPASS;
        private static $db_name = DBNAME;
        private static $db_port = DBPORT;

        protected $mensaje = "";
        protected $conn; //Manejador de DB

        //Manejo básico de consultas
        protected $query; //consulta
        protected $params = array(); //parámetros
        protected $rows = array(); // datos de salida

        //Mátodos abstractos
        abstract protected function get();
        abstract protected function set();
        abstract protected function edit();
        abstract protected function delete();

        //Función de conexión
        protected function open_connection(){
            $dsn = 'mysql:host='.self::$db_host.';'.'dbname='.self::$db_name.';'.'port='.self::$db_port;
            try {
                // $this->conn = new PDO ("mysql:host=localhost; dbname=veterinaria", "veterinaria", "usuario");
                $this->conn = new PDO ($dsn, self::$db_user, self::$db_pass,
                                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf-8"));
                return $this->conn;
            } catch (PDOException $e) {
                echo "Error de conexión";
                exit();
            }
        }
        
        //Método que devuelve el último índice introducido
        public function lastInsert(){
            return $this->conn->lastInsertId();
        }

        //Cerrar conexión
        public function close_conection(){
            return $this->conn=null;
        }

        protected function get_results_from_query(){
            $this->open_connection();
            if (($_stmt = $this->conn->prepare($this->query))) {
                #PREG_PATTERN_ORDER flag para especificar como se cargan los resultados en $named.
                if (preg_match_all('/(:\w+)/', $this->query, $_named, PREG_PATTERN_ORDER)) {
                    $_named = array_pop($_named);
                    foreach ($_named as $_param) {
                    $_stmt->bindValue($_param, $this->params[substr($_param, 1)]);
                    }
                }
            
                try {
                    if (! $_stmt->execute()) {
                        printf("Error de consulta: %s\n", $_stmt->errorInfo()[2]);
                    }
                    
                    $this->rows = $_stmt->fetchAll(PDO::FETCH_ASSOC);
                    $_stmt->closeCursor();
                } 
                catch(PDOException $e){
                        printf("Error en consulta: %s\n" , $e->getMessage());
                }
            }
        }

        
    }

    


?>