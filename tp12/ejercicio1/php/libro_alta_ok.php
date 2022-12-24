<?php

if (!empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['genero']) && !empty($_POST['paginas']) && !empty($_POST['fecha'])){
    require_once('conexion.php');
    
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $paginas = $_POST['paginas'];
    $fecha = $_POST['fecha'];
    if (!empty($_FILES['portada']['size'])) {
        $portada = $titulo.'.jpg';
    }else {
        $portada = '';
    }


    $conexion = conectar();
    if ($conexion) {
        $consulta = 'INSERT INTO libro (titulo, autor, genero , paginas, fecha_publicacion, portada)
        VALUES (\''.$titulo.'\', \''.$autor.'\', \''.$genero.'\', \''.$paginas.'\', \''.$fecha.'\', \''.$portada.'\')';
        $consultar = mysqli_query($conexion,$consulta);
        if ($consultar) {
            if (!empty($_FILES['portada']['size'])) {
                move_uploaded_file($_FILES['portada']['tmp_name'],'../img/portadas/'.$portada);
            }
        }

    }
    desconectar($conexion);
    require_once('../html/header.html');
    echo '<p>Se subieron los datos correctamente</p>';
    header("refresh:3;url=libro_listado.php");
    require_once('../html/footer.html');
}else {
    require_once('../html/header.html');
    echo '<p>Faltan Datos</p>';
    header("refresh:3;url=libro_alta.php");
    require_once('../html/footer.html');
}