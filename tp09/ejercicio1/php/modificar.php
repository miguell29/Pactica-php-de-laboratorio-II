<?php
    $ruta = '../css';
    require("../html/header.html");
    require('header.php');
    require_once('conexion.php');
    $conexion = conectar();
    if ($conexion && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $consulta = 'SELECT * FROM usuario WHERE id_usuario = '.$id;
        $resultado = mysqli_query($conexion,$consulta);
        if(mysqli_num_rows($resultado) > 0){
            $fila = mysqli_fetch_array($resultado);
        }
    }
    desconectar($conexion);
?>

<main>
    <section>
        <article>
            <form action="modificar_ok.php" method="post" enctype="multipart/form-data">
                <legend>Actualizar Datos</legend>     
                <section>
                    <input type="hidden" value="<?php echo$id?>" name="id">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" value="<?php echo $fila['usuario']?>" id="usuario" placeholder="Usuario" required maxlength="45">
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass" placeholder="Contraseña" maxlength="45">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" id="tipo">
                        <?php if ($fila['tipo']=='Administrador') {
                            echo'<option  value="Administrador" selected>Administrador</option>
                            <option value="Común">Común</option>';
                        }else {
                            echo'<option value="Administrador">Administrador</option>
                            <option  value="Común" selected>Común</option>';
                        }?>
                    </select>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto">
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
    require("../html/footer.html");
?>