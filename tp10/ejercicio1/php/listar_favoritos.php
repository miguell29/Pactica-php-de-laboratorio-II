<?php

session_start();
    $ruta = '../css';
    require("../html/header.html");
    if (!empty($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
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
            if (!empty($_COOKIE[$usuario])) {
                $genero = $_COOKIE[$usuario];
                $conexion = conectar();
                $resultado = mysqli_query($conexion, "SELECT * FROM libro WHERE genero = '$genero'");
    
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
            }else {
                echo '<article><h1 >Seleccione su genero favorito en preferencias</h1></article>';
                header("refresh:3;url=preferencias.php");
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