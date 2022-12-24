<?php 
session_start();
    $ruta = '../css';
    require("../html/header.html");

if (!empty($_SESSION['usuario'])) {
    session_destroy();
    header('refresh:0;url=../index.php');
}else {
    echo '<article><h1 >No inicio sesion</h1></article>';
        header("refresh:3;url=../index.php");
}
require("../html/footer.html");


?>