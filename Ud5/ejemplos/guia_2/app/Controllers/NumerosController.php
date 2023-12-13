<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    
    class NumerosController extends BaseController {
        
        public function NumerosAction(){
            $numeros = [];
            $i = 1;
            while ($i <= 20) {
                if ($i%2 == 0) {
                    $numeros[] = $i;
                }
                $i++;
            }
            $data = array("mensaje" => "Listado de números", "contenido" => $numeros);
            $this->renderHTML("../views/numeros_view.php",$data);
        }

        public function NumerosDeseadosAction($request){
            $url = explode("/", $request);
            $numeros = [];
            $i = 1;
            while ($i <= intval($url[2]*2)) {
                if ($i%2 == 0) {
                    $numeros[] = $i;
                    
                } 
                $i++;
            }
            $data = array("mensaje" => "Listado de números", "contenido" => $numeros);
            $this->renderHTML("../views/numeros_view.php",$data);
        }

    }
    
?>