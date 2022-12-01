<?php

session_start();
    $ruta = '../css';
    require("../html/header.html");
    if (!empty($_SESSION['usuario'])) {
        require("conexion.php");
        require('header.php');
       
?>

<section id="main_aside">
    <aside>
        <?php
            require_once('menu.php');
        ?>
    </aside>
    <main>
        <section id="buscador"> 
            <form action="" method="get">
                <input type="search" name="buscar" placeholder="Buscar...">
                <input type="submit" value="Buscar">
            </form>
        </section>
        <section id="libros">
            <?php
                $conexion = conectar();
            if (!empty($_GET['buscar'])) {
                $buscar = $_GET['buscar'];
                $resultado = mysqli_query($conexion,"SELECT * FROM libro WHERE titulo LIKE '%$buscar%'OR autor LIKE '%$buscar%'OR genero LIKE '%$buscar%'");
            }else {
                $resultado = mysqli_query($conexion, "SELECT * FROM libro");
            }

                while ($fila = mysqli_fetch_array($resultado)) {
                    echo '<article>';
                    if ($fila['portada'] !='') {
                        $foto = $fila['portada'];
                    } else {
                        $foto = 'libro_default.png';
                    }
                    echo "<figure><img src='../img/portadas/".$foto."' alt='portada de libro'>";
                    echo '<figcaption>'.$fila['titulo'].'</figcaption></figure>';
                    echo '<section>';
                    echo '<p>'.$fila['autor'].'</p>';
                    echo '<p>'.$fila['genero'].'</p>';
                    echo '<p>Páginas: '.$fila['paginas'].'</p>';
                    $id = $fila['id_libro'];
                    echo '<p class="enlace_carrito"><a href="carrito.php?id='.$id.'">Agregar al carrito</a></p>';
                    echo '</section>';
                    echo '</article>';                
                }
                desconectar($conexion);
            ?>
        </section>
    </main>
</section>
<?php
    }else {
        echo '<article><h1 >Inicie sesion para ver el contenido</h1></article>';
        header("refresh:3;url=../index.php");
    }
    require("../html/footer.html");
?>
