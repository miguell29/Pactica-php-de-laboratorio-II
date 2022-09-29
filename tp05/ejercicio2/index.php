<?php
    $path='css/';
    require_once("html/encabezado.html");
    


    ?>
<section>
<form action="php/juego.php" method="post">
    
    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" placeholder="ingrese su nombre" required name="nombre">
    <input type="submit" value="JUGAR!!!">
</form>
</section>




























    <?php

    require_once("html/footer.html");
    ?>
    