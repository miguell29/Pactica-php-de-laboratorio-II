
<?php
session_start();
$ruta = '../css';
require("../html/header.html");
require('header.php');

if (!empty($_SESSION['usuario'])) { //CONTROLAMOS QUE EL INICIO DE SESION

    if ($_POST['enviar'] == 'actualizar') {
        
        require_once('conexion.php');
        $conexion = conectar();
    
        if ($conexion && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $usuario = $_POST['usuario'];
            $consulta = 'UPDATE usuario SET ';
            foreach ($_POST as $key => $value) {
                if (!empty($value) && $key != 'id' && $key != 'pass' && $key != 'enviar') {
                    $consulta .= $key.' = \''.$value.'\', ';
                }
            }
            // VALIDACION DE PASS
            if (!empty($_POST['pass'])) {
                $pass = sha1($_POST['pass']);
                $consulta .= 'pass = \''.$pass.'\', ';
            }
    
            // VALIDACION DE FOTO
            if (!empty($_FILES['foto']['size'])) {
                $extension = explode('.',$_FILES['foto']['name']);
                $extension = end($extension);
                $foto = $usuario.'.'.$extension;
                move_uploaded_file($_FILES['foto']['tmp_name'],'../img/usuarios/'.$foto);
            }else {
                $foto = '';
                $consultarFoto ='SELECT foto FROM usuario WHERE id_usuario = '.$id;
                $resultado = mysqli_query($conexion,$consultarFoto);
                $fila = mysqli_fetch_array($resultado);
                if ($fila['foto'] != '') {
                    unlink('../img/usuarios/'.$fila['foto']);
                }
            }
            
            //TERMINANDO LA CONSULTA
            $consulta .= 'foto = \''.$foto.'\', ';
            $consulta .= 'WHERE id_usuario = '.$id.';';
            $consulta = str_replace(', WHERE','  WHERE', $consulta);
            $resultado = mysqli_query($conexion,$consulta);
            if ($resultado) {
            echo '<article><h1 id = "borrar" >Se actualizaron los datos correctamente</h1></article>';
            header("refresh:3;url=usuario_listado.php");
            }else {
                echo '<h1>OCURRIO UN ERROR EN LA CONSULTA</h1>';
            }
        }
        desconectar($conexion);
    }else {
        header("refresh:0;url=usuario_listado.php");
    }
}else {
    echo '<article><h1 >Inicie sesion para ver el contenido</h1></article>';
    header("refresh:3;url=../index.php");
}
require("../html/footer.html");

?>