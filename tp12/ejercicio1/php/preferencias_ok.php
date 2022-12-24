<?php 
session_start();

if (!empty($_SESSION['usuario']) && !empty($_POST['genero'])) {
    $usuario = $_SESSION['usuario'];
    $genero = $_POST['genero'];
    $tiempo = time()+ 90*24*60*60;
    setcookie($usuario,$genero,$tiempo,'/');
    header('refresh:0;url=listar_favoritos.php');
}
?>