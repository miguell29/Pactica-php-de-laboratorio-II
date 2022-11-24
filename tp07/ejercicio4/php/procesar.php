<?php
$path ='../css/';
require_once('../html/encabezado.html');

if (!empty($_POST['usuario']) && !empty($_POST['contra']) && !empty($_FILES['foto']['size']) && !empty($_POST['tipo'])){
    $tipo = $_FILES['foto']['type'];
    if ($tipo == 'image/png' || $tipo == 'image/jpeg') {
        
        //LIMPIANDO LOS DATOS
            $datos[]= trim($_POST['usuario']);
            $datos[]=trim($_POST['contra']);
            $datos[]=trim($_POST['tipo']);
            
        //TRANDFORMADO LOS DATOS
            $datosTxt = implode(';', $datos);
        //UBICACION DEL ARCHIVO DE TEXTO
            $ubicacion = '../txt';
            $nombre = '/usuarios.txt';
            $archivo = fopen($ubicacion.$nombre,'a');//se abre el archivo
            fputs($archivo,$datosTxt.PHP_EOL);
            fclose($archivo);//SE cierra el archivo
        
        //MOVIENDO LA IMAGEN
        
            $origen = $_FILES['foto']['tmp_name'];
            $destino = '../fotosUsuarios/';
            $ext = explode('.',$_FILES['foto']['name']);
            $resultado = move_uploaded_file($origen, $destino.$datos[0].'.'.$ext[1]);


            echo'<h1>Registro Exitoso</h1>';
            header ('refresh:5; url=../index.php');

    }else{
        echo'<p class = "error">EL TIPO DE ARCHIVO SUBIDO NO ES COMPATIBLE (INGRESE UN ARCHIVO TIPO PNG O JPEG)</P>';
        header ('refresh:5; url=../index.php');
    }

}else {
    echo'<p class = "error">OCURRIO UN ERROR : NO SE ENCONTRARON LOS DATOS</P>';
    header ('refresh:3; url=../index.php');
}
require_once('../html/pie.html');
?>
