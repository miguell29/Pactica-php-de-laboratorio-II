<?php


$ruta = '../css';
require("../html/header.html");
require('header.php');
session_start();
if (!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 'Administrador') {


    require_once('conexion.php');



    $conexion = conectar();
    if ($conexion && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $consulta = 'DELETE FROM libro WHERE id_libro = ' . $id;
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<article><h1 id = "borrar" >Se elimino el registro Correctamente</h1></article>';
            header("refresh:3;url=libro_listado.php");
        } else {
            echo '<h1 id = "borrar" >Error: No se pudo eliminar el registro 123</h1>';
            header("refresh:3;url=libro_listado.php");
        }
    } else {
        echo '<h1 id = "borrar" >Error: No se pudo eliminar el registro</h1>';
        header("refresh:3;url=libro_listado.php");
    }
    desconectar($conexion);
}else {
    echo '<article><h1 >Inicie sesion como ADMINISTRADOR para ver el contenido</h1></article>';
         header("refresh:3;url=../index.php");
 }
 require("../html/footer.html");
 ?>