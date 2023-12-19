<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function descargaFichero($dir, $file) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($dir . $file));
        readfile($dir . $file);
        unlink($dir . $file); 
    }

    function generarTicket($pedido){
        $dir = "../files/";
        $total = 0;
        date_default_timezone_set("Europe/Lisbon");
        $fechaHoraActual = date('Y-m-d_H-i-s');
        $file = "ticket_" . $fechaHoraActual . ".txt";
        $handle = fopen(($dir . $file),"w");

        if ($handle === false) {
            die("No se pudo abrir el archivo");
        }

        $text = "--- Pedidio realizado el ".date('d/m/Y \a \l\a\s H:i:s')." ---\n";
        $text .= "· Descripción - Unidades - Precio - Total\n";

        foreach ($pedido as $producto) {
            $tipo = ($producto["tipo"] == "pizza") ? 
            "pizzas" : (($producto["tipo"] == "bebida") ? 
            "bebidas" : "postres");
            $nombre = PRODUCTOS[$tipo][$producto["id"]]["nombre"];
            $precio = ($producto["tipo"] == "pizza") ? 
            PRODUCTOS[$tipo][$producto["id"]]["precio"][$producto["tamano"]] : 
            PRODUCTOS[$tipo][$producto["id"]]["precio"];
            $cantidad = $producto["cantidad"];
            $total += $precio*$cantidad;
            $text .= "· ".$nombre." - ".$cantidad." - ".$precio." € - ".$precio*$cantidad." €\n";
        }
        $text .= "--- EL TOTAL A PAGAR ES: ".$total."€ ---";
        fwrite($handle, $text);
        fclose($handle);
        descargaFichero($dir, $file);
        session_write_close();
    }

    function generarComanda($pedido) {
        $dir = "../files/";
        $total = 0;
        date_default_timezone_set("Europe/Lisbon");
        $fechaHoraActual = date('Y-m-d_H-i-s');
        $file = "comanda_" . $fechaHoraActual . "_pendiente.txt";
        $handle = fopen(($dir . $file),"w");

        if ($handle === false) {
            die("No se pudo abrir el archivo");
        }

        $text = "--- Comanda realizada el ".date('d/m/Y \a \l\a\s H:i:s')." ---\n";
        $text .= "· Descripción - Unidades - Precio - Total\n";

        foreach ($pedido as $producto) {
            $tipo = $producto["tipo"];
            if ($tipo == "pizza") {
                $nombre = PRODUCTOS["pizzas"][$producto["id"]]["nombre"];
                $precio = PRODUCTOS["pizzas"][$producto["id"]]["precio"][$producto["tamano"]];
                $cantidad = $producto["cantidad"];
                $total += $precio*$cantidad;
                $text .= "· ".$nombre." - ".$cantidad." - ".$precio." € - ".$precio*$cantidad." €\n";
            }
        }
        $text .= "---";
        fwrite($handle, $text);
        fclose($handle);
        session_write_close();
        
    }

?>