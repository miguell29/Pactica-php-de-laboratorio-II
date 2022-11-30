<?php 
 $ruta = '../css';
 require("../html/header.html");
 require('header.php');
 require_once('conexion.php');

 $conexion = conectar();
 
 if ($conexion && !empty($_GET['id'])) {
     $id = $_GET['id'];
     $consulta ='SELECT * FROM usuario WHERE id_usuario = \''.$id.'\'';
     $resultado = mysqli_query($conexion,$consulta);
     desconectar($conexion);
     
     if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_array($resultado);
        echo '<article class ="menu_tmp"><h1>Eliminar Usuario</h1>';
        echo '<p>Esta seguro que desea eliminar al usuario <b>'.$fila['usuario'].'</b>?</p>';
        echo '<p class="botones"><a href="eliminar_ok.php?id='.$id.'">Aceptar</a></p>';
        echo '<p class="botones"><a href="usuario_listado.php">Cancelar</a></p></article>';
     }
 }else {
    echo '<h1 id = "borrar" >Error: No se pudo eliminar el registro</h1>';
    header("refresh:3;url=usuario_listado.php");
 }
?>
