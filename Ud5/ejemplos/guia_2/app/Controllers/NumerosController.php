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
            $data = array("mensaje" => "listado", "contenido" => $numeros);
            $this->renderHTML("../views/numeros_view.php",$data);
        }

    }
    
?>