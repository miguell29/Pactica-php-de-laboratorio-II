<?php 

if ($_SESSION['foto'] == '') {
    $imgUsuario = 'usuario_default.png';
}else {
    $imgUsuario = $_SESSION['foto'];
}
?>
<nav>
    <section>
        <img src="../img/usuarios/<?php echo $imgUsuario?>" alt="foto de perfil">
        <p><?php echo $_SESSION['usuario'];?></p>
        <a href="cerrar_sesion.php">cerrar sesión</a>
    </section>
    <hr>
    <?php 
        if ($_SESSION['tipo'] == 'Administrador') {
            ?>
    <h3>Usuarios</h3>
    <ul>
        <a href="usuario_alta.php"><li>Alta usuario</li></a>
        <a href="usuario_listado.php"><li>Listado usuarios</li></a>
    </ul>
    <?php 
        }
    ?>
    <h3>Libros</h3>
    <ul>
        <a href="libro_listado.php"><li>Listado libros</li></a>
    </ul>
    <ul>
        <a href="preferencias.php"><li>Preferencias</li></a>
    </ul>
    <ul>
        <a href="listar_favoritos.php"><li>Listar favoritos</li></a>
    </ul>
</nav>