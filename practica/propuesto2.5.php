<html>
<head>
    <title>PROPUESTO 2.3</title>
</head>

<body>
    <?php
        $temporal = "Juan";
        echo gettype($temporal) . "<br>";
        $temporal = 3.45;
        echo gettype($temporal) . "<br>";
        $temporal = false;
        echo gettype($temporal) . "<br>";
        $temporal = 3;
        echo gettype($temporal) . "<br>";
        $temporal = null;
        echo gettype($temporal);
    ?>
</body>