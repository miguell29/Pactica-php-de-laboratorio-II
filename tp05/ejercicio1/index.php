<?php

$path ='css/';
require_once('html/encabezado.html');
?>
<section>
    <form action="php/logueo.php" method="post" autocomplete="off">
    <section>
        <p>Inicie Sesión</p>
        <label for="deposito"></label>
        <input type="text" required id="usuario" name="usuario" placeholder="Usuario">
    </section>
    <section>
        <label for="contra"></label>
        <input type="password" name="contra" id="contra" placeholder="Contraseña" required>
    </section>
        <input type="submit" value="Iniciar Sesion">
    </section>
    </form>
</section>

<?php
require_once('html/pie.html');
?>