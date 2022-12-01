<?php

session_start();
    $ruta = '../css';
    require("../html/header.html");
    require('header.php');
    if (!empty($_SESSION['usuario']) && !empty($_GET['id'])) {
        $id =$_GET['id'];
        require("conexion.php");
        $conexion = conectar();
        $consulta = 'SELECT * FROM libro WHERE id_libro='.$id;
        $resultado = mysqli_query($conexion,$consulta);
        desconectar($conexion);
        $datos = mysqli_fetch_assoc($resultado);
// almacena dentro de session el array carrito que contiene un array con todos los datos por cada libro
        $_SESSION['carrito'][$id] =$datos;
        echo '<article><h1>'.$_SESSION['carrito'][$id]['titulo'].'</h1><h2>Se agrego correrctamente al carrito</h2></article>';
        header("refresh:3;url=libro_listado.php");        
    }else {
            echo '<article><h1>Inicie sesion para ver el contenido</h1></article>';
            header("refresh:3;url=../index.php");
    }
    require("../html/footer.html");
?>
