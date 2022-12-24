<?php

session_start();
    $ruta = '../css';
    require("../html/header.html");
    require('header.php');
    if (!empty($_SESSION['usuario'])) {
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
            <form action="preferencias_ok.php" method="post">
                <legend>preferencias</legend>     
                <section>
                    <label for="tipo">Elija el genero de su preferencia:</label>
                    <select name="genero" id="tipo">
                        <option value="Finanzas">Finanzas</option>
                        <option value="Autoayuda">Autoayuda</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Poesía">Poesía</option>
                        <option value="Psicología">Psicología</option>
                    </select>
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
        echo '<article><h1 >Inicie sesion para ver el contenido</h1></article>';
        header("refresh:3;url=../index.php");
    }
    require("../html/footer.html");
?>