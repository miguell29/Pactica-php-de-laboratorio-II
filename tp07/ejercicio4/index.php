<?php

$path ='css/';
require_once('html/encabezado.html');
?>
<section>
    <form action="php/procesar.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <section>
        <p>Alta de Usuario</p>
        <label for="deposito"></label>
        <input "type="text required id="usuario" name="usuario" placeholder="Usuario">
    </section>
    <section>
        <label for="contra"></label>
        <input type="password" name="contra" id="contra" placeholder="Contraseña" required>
    </section>
    
    <section>
        <label for="tipo"></label>
        <select name="tipo" id="tipo">
            <option value="administrador">Administrador</option>
            <option value="comun">Común</option>
        </select>
    </section>
    <section>
        <label for="foto">Foto Perfil</label>
        <input type="file" name="foto" id="foto" accept="image/*" required>
    </section>
    <section>
        <input type="submit" value="Enviar">
    </section>
    </form>
</section>

<?php
require_once('html/pie.html');
?>