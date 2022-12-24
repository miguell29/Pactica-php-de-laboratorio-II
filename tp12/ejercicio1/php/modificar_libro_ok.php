
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
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $genero = $_POST['genero'];
            $paginas = $_POST['paginas'];
            $fecha = $_POST['fecha_publicacion'];
            $consulta = 'UPDATE libro SET ';
            foreach ($_POST as $key => $value) {
                if (!empty($value) && $key != 'id' && $key != 'enviar') {
                    $consulta .= $key.' = \''.$value.'\', ';
                }
            }
            // VALIDACION DE FOTO
            if (!empty($_FILES['portada']['size'])) {
                $portada = $titulo.'.jpg';
                move_uploaded_file($_FILES['portada']['tmp_name'],'../img/portadas/'.$portada);
            }else {
                $portada = "";
                $consultarFoto ='SELECT portada FROM libro WHERE id_libro = '.$id;
                $resultado = mysqli_query($conexion,$consultarFoto);
                $fila = mysqli_fetch_assoc($resultado);
                if ($fila['portada'] != '') {
                    unlink('../img/portadas/'.$fila['portada']);
                }
            }
            
            //TERMINANDO LA CONSULTA
            $consulta .= 'portada = \''.$portada.'\', ';
            $consulta .= 'WHERE id_libro = '.$id.';';
            $consulta = str_replace(', WHERE',' WHERE', $consulta);
            $resultado = mysqli_query($conexion,$consulta);
            echo $consulta;
            if ($resultado) {
                var_dump($resultado);
            echo '<article><h1 id = "borrar" >Se actualizaron los datos correctamente</h1></article>';
            header("refresh:3;url=libro_listado.php");
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