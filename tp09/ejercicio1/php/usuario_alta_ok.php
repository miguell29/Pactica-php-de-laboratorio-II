<?php


if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['tipo'])){
    require_once('conexion.php');
    
    $usuario = $_POST['usuario'];
    $pass = sha1($_POST['pass']);
    $tipo = $_POST['tipo'];
    if (!empty($_FILES['foto']['size'])) {
        $extension = explode('.',$_FILES['foto']['name']);
        $extension = end($extension);
        $foto = $usuario.'.'.$extension;
    }else {
        $foto = '';
    }

    $conexion = conectar();
    if ($conexion) {
        $consulta = 'INSERT INTO usuario (usuario, pass, tipo , foto)
        VALUES (\''.$usuario.'\', \''.$pass.'\', \''.$tipo.'\', \''.$foto.'\')';
        $consultar = mysqli_query($conexion,$consulta);
        if ($consultar) {
            if (!empty($_FILES['foto']['size'])) {
                move_uploaded_file($_FILES['foto']['tmp_name'],'../img/usuarios/'.$foto);
            }
        }

    }
    desconectar($conexion);
    require_once('../html/header.html');
    echo '<p>Se subieron los datos correctamente</p>';
    header("refresh:3;url=usuario_listado.php");
    require_once('../html/footer.html');
}else {
    require_once('../html/header.html');
    echo '<p>Faltan Datos</p>';
    header("refresh:3;url=usuario_alta.php");
    require_once('../html/footer.html');
}