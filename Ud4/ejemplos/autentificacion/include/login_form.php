<form method="post" action="login.php">
    <label>Usuario: <input type="text" name="usuario" value="<?php echo $user ?>"></label>
    <label>Contraseña: <input type="password" name="passwd" value="<?php echo $pass ?>"></label>
    <label><input type="submit" name="enviar" value="Enviar"></label>
</form>