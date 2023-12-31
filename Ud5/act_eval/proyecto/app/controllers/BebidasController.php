<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;

    use App\Models\Bebida;
    
    class BebidasController extends BaseController {

        private function BebidasSesion() {
            session_start();
            $procesaForm = false;

            if(!isset($_SESSION["pedido"])){
                $_SESSION["pedido"] = [];
            }

            if (isset($_POST["envio"])) {
                $procesaForm = true;
                $pedido = $_SESSION["pedido"];

                $id = $_POST["key"];
                $nombre = PRODUCTOS["bebidas"][$id]["nombre"];
                $precio = PRODUCTOS["bebidas"][$id]["precio"];
                $cantidad = $_POST["cantidad"];

                // $pedido[] = array(
                //     "id" => $id, 
                //     "tipo" => "bebida",
                //     "cantidad" => $cantidad);

                // $bebida = new Bebida($id, PRODUCTOS["bebidas"][$id]["nombre"], PRODUCTOS["bebidas"][$id]["precio"], $cantidad);
                
                $pedido[] = new Bebida($id, $nombre, $precio, $cantidad);
                
                $_SESSION["pedido"] = $pedido;
            }

            // var_dump($pedido);

        }

        private function BebidasFooter() {
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

        public function BebidasAction() {
            $this->BebidasSesion();
            $footer = $this->BebidasFooter();
            foreach (PRODUCTOS["bebidas"] as $key => $bebida) {

                ob_start(); // Inicia el almacenamiento en búfer de salida
            
                // Tu bloque de código HTML
                ?>
                <div>
                    <form action="" method="post">
                        <?php
                            echo "<input type=\"hidden\" name=\"key\" value=\"" . $key . "\">";
                            echo "<img src=\"".$bebida["imagen"]."\" alt=\"".$bebida["nombre"]."\">";
                            echo "<br/>";
                            echo "<p>".$bebida["nombre"]."</p>";
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
            $this->renderHTML("../views/bebidas_index.php",$data);
        }
    }

?>