<?php
    $path='css/';
    require_once("html/encabezado.html");
?>
<section>
<form action="php/consulta.php" method="post">
    
    <label for="legajo">Legajo: </label>
    <input type="text" id="legajo" placeholder="ingrese su legajo" required name="legajo">
    <input type="submit" value="CONSULTAR">
</form>
</section>
    <?php

    require_once("html/footer.html");
    ?>
    