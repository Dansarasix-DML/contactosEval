<?php
    $puzzlePieces = array(
        'piece1' => './img/1.JPG',
        'piece2' => './img/2.JPG'
    );

    // Guardar las piezas en la sesión
    if (!isset($_SESSION['puzzlePieces'])) {
        $_SESSION['puzzlePieces'] = $puzzlePieces;
    }
?>

<div id="puzzle">
    <?php foreach ($_SESSION['puzzlePieces'] as $piece => $image):?>
        <div class="puzzle-piece" id="<?php echo $piece; ?>">
            <img src="<?php echo $image; ?>" alt="<?php echo $piece; ?>">
        </div>
    <?php endforeach; ?>
</div>
