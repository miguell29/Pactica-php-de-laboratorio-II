<?php

session_start();
    $ruta = '../css';
    require("../html/header.html");
    require('header.php');
    require_once('conexion.php');
    if (!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 'Administrador') {
        $conexion = conectar();
        if ($conexion && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $consulta = 'SELECT * FROM libro WHERE id_libro = '.$id;
            $resultado = mysqli_query($conexion,$consulta);
            if(mysqli_num_rows($resultado) > 0){
                $fila = mysqli_fetch_assoc($resultado);
            }
        }
        desconectar($conexion);
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
        <form action="modificar_libro_ok.php" method="post" enctype="multipart/form-data">
                <legend>Modificar Libro</legend>     
                <section>
                    <label for="usuario">Título:</label>
                    <input type="text" name="titulo" id="usuario" placeholder="Título" value="<?php echo $fila['titulo']?>" required >
                    <label for="pass">autor:</label>
                    <input type="text" name="autor" id="pass" placeholder="Autor" required value="<?php echo $fila['autor']?>">
                    <label for="tipo">Genero:</label>
                    <select name="genero" id="tipo">
                        <?php
    $conexion = conectar();
    $consulta = 'SELECT DISTINCT genero FROM libro ORDER BY genero';
    $resultado = mysqli_query($conexion, $consulta);
    desconectar($conexion);
    if ($resultado) {
        while ($libro = mysqli_fetch_assoc($resultado)) {
            if ($libro['genero'] != $fila['genero']) {
                echo '<option value="' . $libro['genero'] . '">' . $libro['genero'] . '</option>';
            }else {
                echo '<option value="' . $libro['genero'] . '"  selected >' . $libro['genero'] . '</option>';
            }
        }
    }
                        ?>
                    </select>
                    <label for="paginas">Cantidad de Páginas:</label>
                    <input type="number" name="paginas" id="paginas" placeholder="cantidad de paginas" required  value="<?php echo $fila['paginas']?>">
                    <label for="fecha">Fecha de Publicación:</label>
                    <input type="date" name="fecha_publicacion" id="fecha"  required value="<?php echo $fila['fecha_publicacion']?>">

                    <label for="foto">portada</label>
                    <input type="file" name="portada" id="foto" accept="image/*">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <section id="boton">
                        <input type="submit" name="enviar" value="actualizar">
                        <input type="submit" name="enviar" value="cancelar">
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
