<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    
    class IndexController extends BaseController {
        
        public function IndexAction(){
            $data = array("mensaje" => "Hola Mundo");
            $this->renderHTML("../views/index_view.php",$data);
        }

        public function SaludaAction($request){
            $url = explode("/", $request);
            $nombre = $url[2];
            $data = array("mensaje" => "Hola ". $nombre . "!!");
            $this->renderHTML("../views/saludo_view.php",$data);
        }

        public function NumerosAction($request){
            $numeros = "";
            for ($i=1; $i < 20; $i++) { 
                if ($i%2 == 0) {
                    $numeros = $numeros . $i . "<br/>";
                }
            }
            $data = array("mensaje" => $numeros);
            $this->renderHTML("../views/numeros_view.php",$data);
        }

    }
    
?>