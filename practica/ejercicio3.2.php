<html>
<head>
    <title>EJERCICIO 3.2</title>
</head>

<body>
    <?php
        $codigo = 2;
        switch ($codigo) {
            case 0: 
                echo "El valor es 0";
                break;
            case 1:
                echo "El valor es 1";
                break;
            case 2:
                echo "El valor es 2";
                break;
            case 3:
                echo "El valor es 3";
                break;
            default:
                echo "El valor es " . $codigo;
                break;
        }
    ?>
</body>