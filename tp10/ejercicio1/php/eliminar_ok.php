<?php 
require_once('conexion.php');

$conexion = conectar();
if ($conexion && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = 'DELETE FROM usuario WHERE id_usuario = '.$id;
    $resultado = mysqli_query($conexion,$consulta);
    if ($resultado) {
        $ruta = '../css';
        require("../html/header.html");
        require('header.php');
        echo '<article><h1 id = "borrar" >Se elimino el registro Correctamente</h1></article>';
        header("refresh:3;url=usuario_listado.php");
    }else {
        echo '<h1 id = "borrar" >Error: No se pudo eliminar el registro 123</h1>';
        header("refresh:3;url=usuario_listado.php");
    }
}else {
    echo '<h1 id = "borrar" >Error: No se pudo eliminar el registro</h1>';
    header("refresh:3;url=usuario_listado.php");
}
desconectar($conexion);

?>