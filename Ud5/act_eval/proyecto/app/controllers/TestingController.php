<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    
    class TestingController extends BaseController {
        
        public function TestingAction(){
            $data = array("mensaje" => "Hola Mundo");
            $this->renderHTML("../test/test_index.php",$data);
        }

    }
    
?>