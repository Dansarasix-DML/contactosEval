<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;

    use App\Models\Pizza;
    
    class PizzasController extends BaseController {

        private function PizzasSesion() {
            session_start();
            $procesaForm = false;

            if(!isset($_SESSION["pedido"])){
                $_SESSION["pedido"] = [];
            }

            if (isset($_POST["envio"])) {
                $procesaForm = true;
                $pedido = $_SESSION["pedido"];

                $id = $_POST["key"];
                $nombre = PRODUCTOS["pizzas"][$id]["nombre"];
                $tamano = $_POST["tamano"];
                $precio = PRODUCTOS["pizzas"][$id]["precio"][$tamano];
                $cantidad = $_POST["cantidad"];

                // $pedido[] = array(
                //     "id" => $id, 
                //     "tipo" => "pizza",
                //     "tamano" => $tamano, 
                //     "cantidad" => $cantidad);

                $pedido[] = new Pizza($id, $nombre, $tamano, $precio, $cantidad);
                
                $_SESSION["pedido"] = $pedido;
                
            }

            // var_dump($pedido);
        }

        private function PizzasFooter() {
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
        
        public function PizzasAction(){
            $this->PizzasSesion();
            $footer = $this->PizzasFooter();
            foreach (PRODUCTOS["pizzas"] as $key => $pizza) {
                ob_start(); // Inicia el almacenamiento en búfer de salida
            
                // Tu bloque de código HTML
                ?>
                <div>
                    <form action="" method="post">
                        <input type="hidden" name="key" value="<?= $key ?>">
                        <img src="<?= $pizza["imagen"] ?>" alt="<?= $pizza["nombre"] ?>">
                        <br/>
                        <p><?= $pizza["nombre"] ?></p>
                        Tamaño: <select name="tamano">
                            <?php foreach ($pizza["precio"] as $tamano => $precio) : ?>
                                <option value="<?= $tamano ?>"><?= $tamano . ': ' . $precio . '€' ?></option>
                            <?php endforeach; ?>
                        </select><br/><br/>
                        Cantidad: <select name="cantidad">
                            <?php foreach (CANTIDAD as $value) : ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php endforeach; ?>
                        </select><br/><br/>
                        <input type="submit" name="envio" value="Añadir al carrito">
                    </form>
                </div>
                <?php
                $html = ob_get_clean(); // Obtiene el contenido del búfer y lo limpia
                $data[] = array('key' => $key, 'html' => $html);
            }
            $data[] = array('key' => count($data), 'html' => $footer);
            $this->renderHTML("../views/pizzas_index.php",$data);
        }

    }
    
?>