<?php
require_once ('conexion.php');
if (!empty($_POST['usuario']) && !empty($_POST['pass'])) {
    //hacer cuestiones
    $usuario = $_POST['usuario'];
    $pass = sha1($_POST['pass']);
    $conexion = conectar();

    if ($conexion) {
        $consulta = 'SELECT usuario, pass 
        FROM usuario 
        WHERE usuario = \''.$usuario.'\' AND pass = \''.$pass.'\'';

        $consultar = mysqli_query($conexion,$consulta);
        $filas = mysqli_num_rows($consultar);
        if ($filas == 1) {
            echo '<p>usuario y clave correcta</p>';
            header("refresh:0;url=usuario_listado.php");
        }else {
            echo '<p>usuario y clave incorrecta</p>';
            header("refresh:3;url=../index.php");
        }
    }
    desconectar($conexion);
    
}

?>