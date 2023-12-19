<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<!-- <input type="text" name="dia" value="<?php echo $day; ?>"> -->
<select name="mes">
    <?php
        foreach ($meses as $key => $value) {
            $selected = ($key == $month) ? "selected" : "";
            echo "<option value='$value' $selected>$value</option>";
            $month_name = $meses[$month];
        }
    ?>
</select>
<input type="text" name="ano" value="<?php echo $year; ?>">
<br/><br/>
<label for="color_actual">Color Día Actual:</label>
<input type="color" name="color_actual" value="<?php echo $color_actual; ?>">
<label for="color_local">Color Local:</label>
<input type="color" name="color_local" value="<?php echo $color_local; ?>">
<label for="color_comunidad">Color Comunidad:</label>
<input type="color" name="color_comunidad" value="<?php echo $color_comunidad; ?>">
<label for="color_nacional">Color Nacional:</label>
<input type="color" name="color_nacional" value="<?php echo $color_nacional; ?>">
<label for="color_domingo">Color Domingo:</label>
<input type="color" name="color_domingo" value="<?php echo $color_domingo; ?>">
<br/><br/>
<input type="submit" name="submit" value="Enviar">
<span class="error"><?php echo $day_Err; ?></span>
<span class="error"><?php echo $month_Err; ?></span>
<span class="error"><?php echo $year_Err; ?></span>
</form>