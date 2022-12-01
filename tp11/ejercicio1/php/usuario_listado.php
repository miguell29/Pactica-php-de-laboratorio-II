<?php

session_start();

    $ruta = '../css';
    require("../html/header.html");
    require('header.php');
    require("conexion.php");
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
            <section class="menu_tmp">
                <a class="enlace_boton" href="usuario_alta.php">Alta usuario</a>
            </section>
            <table>
                <caption>Listado de usuarios</caption>
                <tr>
                    <th>Foto</th>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>

                <?php
                    $conexion = conectar();
                    if ($conexion) {
                        $consulta = 'SELECT * FROM usuario';
                        $consultar = mysqli_query($conexion,$consulta);
                        desconectar($conexion);
                        $numFilas = mysqli_num_rows($consultar);
                        if ($numFilas > 0 ) {
                            while ($fila = mysqli_fetch_array($consultar)) {
                                echo '<tr><td>';
                                if ($fila['foto'] == '') {
                                    echo '<img src="../img/usuarios/usuario_default.png" alt="imagen de perfil">';
                                }else {
                                    echo '<img src="../img/usuarios/'.$fila['foto'].'" alt="imagen de perfil">';
                                }
                                echo '</td>';
                                echo '<td>'.$fila['usuario'].'</td>
                                <td>'.$fila['tipo'].'</td>
                                <td><a href="modificar.php?id='.$fila['id_usuario'].'"><img class="icono" src="../img/modificar.png" alt="editar datos del usuario"></a></td>
                                <td><a href="eliminar.php?id='.$fila['id_usuario'].'"><img  class="icono" src="../img/eliminar.png" alt="eliminar usuario"></a></td></tr>';
                            }   
                        }
                    }

                ?>
            </table>
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
