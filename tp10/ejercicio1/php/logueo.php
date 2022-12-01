<?php
session_start();
if (!empty($_POST['usuario']) && !empty($_POST['pass'])) {
    require_once ('conexion.php');
    $usuario = $_POST['usuario'];
    $pass = sha1($_POST['pass']);
    $conexion = conectar();

    if ($conexion) {
        $consulta = 'SELECT usuario, pass, foto 
        FROM usuario 
        WHERE usuario = \''.$usuario.'\' AND pass = \''.$pass.'\'';

        $consultar = mysqli_query($conexion,$consulta);
        desconectar($conexion);
        $filas = mysqli_num_rows($consultar);
        if ($filas == 1) {
            $fila = mysqli_fetch_array($consultar);
            $_SESSION['usuario'] = $usuario;
            $_SESSION['foto'] = $fila['foto'];
            header("refresh:0;url=libro_listado.php");
        }else {
            echo '<p>usuario y clave incorrecta</p>';
            header("refresh:3;url=../index.php");
        }
    }
    
}

?>