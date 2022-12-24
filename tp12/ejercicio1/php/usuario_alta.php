<?php

session_start();
    $ruta = '../css';
    require("../html/header.html");
    require('header.php');
    if (!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 'Administrador') {
?>
<section id="main_aside">
    <aside>
        <?php
            require_once('menu.php');
        ?>
    </aside>
<main>
    <section>
        <article>
            <form action="usuario_alta_ok.php" method="post" enctype="multipart/form-data">
                <legend>Alta usuario</legend>     
                <section>
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Usuario" required maxlength="45">
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass" placeholder="Contraseña" required maxlength="45">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" id="tipo">
                        <option value="Administrador">Administrador</option>
                        <option value="Común">Común</option>
                    </select>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto">
                    <section id="boton">
                        <input type="submit" name="enviar" value="Confirmar">
                    </section>
                </section>
            </form>
        </article>
    </section>
</main>

<?php
    }else {
        echo '<article><h1 >Inicie sesion como ADMINISTRADOR para ver el contenido</h1></article>';
        header("refresh:3;url=../index.php");
    }
    require("../html/footer.html");
?>