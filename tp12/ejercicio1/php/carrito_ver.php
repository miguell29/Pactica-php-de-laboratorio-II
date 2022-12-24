<?php

session_start();
    $ruta = '../css';
    require("../html/header.html");
    if (!empty($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
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
        <section id="libros">
            <?php
            if (!empty($_SESSION['carrito'])) {
               foreach ($_SESSION['carrito'] as $key => $value) {
                
                   echo '<article>';
                   if ($value['portada'] !='') {
                       $foto = $value['portada'];
                   } else {
                       $foto = 'libro_default.png';
                   }
                   echo "<figure><img src='../img/portadas/".$foto."' alt='portada de libro'>";
                   echo '<figcaption>'.$value['titulo'].'</figcaption></figure>';
                   echo '<section>';
                   echo '<p>'.$value['autor'].'</p>';
                   echo '<p>'.$value['genero'].'</p>';
                   echo '<p>Páginas: '.$value['paginas'].'</p>';
                   echo '</section>';
                   echo '</article>';                
               }
            }else {
                echo '<article><h1 >Aun no se agregaron elemtos al carrito</h1></article>';
                header("refresh:3;url=libro_listado.php");
            }
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