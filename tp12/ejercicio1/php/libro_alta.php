<?php
/* Se conpio el formulario de alta de usuario (para que funcionen los mismos estilos) y se modifico para que sea el de alta libro*/
session_start();
    $ruta = '../css';
    require("../html/header.html");
    require('header.php');
    if (!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 'Administrador') {
        require('conexion.php')
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
            <form action="libro_alta_ok.php" method="post" enctype="multipart/form-data">
                <legend>Alta de libro</legend>     
                <section>
                    <label for="usuario">Título:</label>
                    <input type="text" name="titulo" id="usuario" placeholder="Título" required >
                    <label for="pass">autor:</label>
                    <input type="text" name="autor" id="pass" placeholder="Autor" required >
                    <label for="tipo">Genero:</label>
                    <select name="genero" id="tipo">
                        <?php
    $conexion = conectar();
    $consulta = 'SELECT DISTINCT genero FROM libro ORDER BY genero';
    $resultado = mysqli_query($conexion, $consulta);
    desconectar($conexion);
    if ($resultado) {
        while ($libro = mysqli_fetch_assoc($resultado)) {
            echo '<option value="' . $libro['genero'] . '">' . $libro['genero'] . '</option>';
        }
    }
                        ?>
                    </select>
                    <label for="paginas">Cantidad de Páginas:</label>
                    <input type="number" name="paginas" id="paginas" placeholder="cantidad de paginas" required >
                    <label for="fecha">Fecha de Publicación:</label>
                    <input type="date" name="fecha" id="fecha"  required >

                    <label for="foto">portada</label>
                    <input type="file" name="portada" id="foto" accept="image/*">
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