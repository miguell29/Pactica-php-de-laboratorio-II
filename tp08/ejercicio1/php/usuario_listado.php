<?php
    $ruta = '../css';
    require("../html/header.html");
    require("conexion.php");
?>

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
                </tr>

                <?php
                    $conexion = conectar();
                    if ($conexion) {
                        $consulta = 'SELECT * FROM usuario';
                        $consultar = mysqli_query($conexion,$consulta);
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
                                <td>'.$fila['tipo'].'</td></tr>';
                            }   
                        }
                    }

                ?>
            </table>
        </article>
    </section>
</main>

<?php
    require("../html/footer.html");
?>
