<?php
    $ruta = '../css';
    require("../html/header.html");
    require("conexion.php");
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    setlocale(LC_ALL,'spanish');
    $fechaActual = strftime('%A %d de %B de %Y');
?>
<header>
    <p><?php echo ucfirst($fechaActual) ?></p>
</header>
<section id="main_aside">
    <aside>
        <?php
            require_once('menu.php');
        ?>
    </aside>
    <main>
        <section id="libros">
            <?php
                $conexion = conectar();
                $resultado = mysqli_query($conexion, "SELECT * FROM libro");

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
                    echo '</section>';
                    echo '</article>';                
                }
                desconectar($conexion);
            ?>
        </section>
    </main>
</section>
<?php
    require("../html/footer.html");
?>