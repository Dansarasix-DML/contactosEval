<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;

    use App\Models\Postre;
    
    class PostresController extends BaseController {

        private function PostresSesion() {
            session_start();
            $procesaForm = false;

            if(!isset($_SESSION["pedido"])){
                $_SESSION["pedido"] = [];
            }
        
            if (isset($_POST["envio"])) {
                $procesaForm = true;
                $pedido = $_SESSION["pedido"];
        
                $id = $_POST["key"];
                $nombre = PRODUCTOS["postres"][$id]["nombre"];
                $precio = PRODUCTOS["postres"][$id]["precio"];
                $cantidad = $_POST["cantidad"];
        
                // $pedido[] = array(
                //     "id" => $id, 
                //     "tipo" => "postre",
                //     "cantidad" => $cantidad);

                $pedido[] = new Postre($id, $nombre, $precio, $cantidad);
                
                $_SESSION["pedido"] = $pedido;

            }

            // var_dump($pedido);

        }

        private function PostresFooter() {
            ob_start(); ?>

            <footer>
                <hr>
                <?php
                    echo "Recomendaciones:<br/>";
                    if (isset($_COOKIE["ultimoPedido"])) {
                        $ultimoPedido = json_decode($_COOKIE["ultimoPedido"], true);        
                        if ($ultimoPedido != null) {
                            foreach ($ultimoPedido as $producto) {
                                $tipo = ($producto["tipo"] == "pizza") ? 
                                "pizzas" : (($producto["tipo"] == "bebida") ? 
                                "bebidas" : "postres"); 
                                $nombre = PRODUCTOS[$tipo][$producto["id"]]["nombre"];               
                                $imagen = PRODUCTOS[$tipo][$producto["id"]]["imagen"];               
                            ?>
                                <div>
                                    <?php
                                        echo "<img src=\"".$imagen."\" alt=\"".$nombre."\">";
                                        echo "<br/>";
                                        echo "<p>".$nombre."</p>";
                                    ?>
                                </div>
                            <?php }
                        }        
                    }
                ?>
            </footer>
            <?php
            $footer = ob_get_clean();
            return $footer;
        }

        public function PostresAction() {
            $this->PostresSesion();
            $footer = $this->PostresFooter();
            foreach (PRODUCTOS["postres"] as $key => $postre) {
                ob_start(); // Inicia el almacenamiento en búfer de salida
            
                // Tu bloque de código HTML
                ?>
                <div>
                    <form action="" method="post">
                        <?php
                            echo "<input type=\"hidden\" name=\"key\" value=\"" . $key . "\">";
                            echo "<img src=\"".$postre["imagen"]."\" alt=\"".$postre["nombre"]."\">";
                            echo "<br/>";
                            echo "<p>".$postre["nombre"]."</p>";
                            echo "Cantidad: <select name=\"cantidad\">";
                            foreach (CANTIDAD as $value) {
                                echo "<option value=\"" . $value . "\">" . $value . "</option>";
                            }
                            echo "</select><br/><br/>";
                        ?>
                        <input type="submit" name="envio" value="Añadir al carrito">
                    </form>
                </div>
                <?php
                $html = ob_get_clean(); // Obtiene el contenido del búfer y lo limpia
                $data[] = array('key' => $key, 'html' => $html);
            }
            $data[] = array('key' => count($data), 'html' => $footer);
            $this->renderHTML("../views/postres_index.php",$data);
        }
    }

?>