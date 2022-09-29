<?php
$path ='../css/';
require_once('../html/encabezado.html');

$listado = false;//CONTROL DE USUARIO CORRECTO
$datosCorrectos;
if (!empty($_POST['usuario']) && !empty($_POST['contra'])) {
//LIMPIANDO LOS DATOS
    $_POST['usuario'] = trim($_POST['usuario'],'}');
    $_POST['usuario'] = trim($_POST['usuario']);
    $_POST['contra'] =trim($_POST['contra'],'}');
    $_POST['contra'] =trim($_POST['contra']);
//TRANDFORMADO LOS DATOS
    $datosTxt = implode(';', $_POST);
//UBICACION DEL ARCHIVO DE TEXTO
    $ubicacion = '../txt';
    $nombre = '/usuarios.txt';
    $archivo = fopen($ubicacion.$nombre,'r');//se abre el archivo

    while (!feof($archivo)) {
        $linea=fgets($archivo);
        $linea=trim($linea);
        if ($linea!='') {
            if ($linea == $datosTxt) {//COMPARA CADA LINEA DEL ARCHIVO CON LOS DATOS INGRESADOS
                $listado = true;
                $datosCorrectos=explode(';',$linea);
            }
        }
    }

    fclose($archivo);//SE cierra el archivo

}else {
    echo'<p class = "error">OCURRIO UN ERROR : NO SE ENCONTRARON LOS DATOS</P>';
    header ('refresh:3; url=../index.php');
}


if($listado){
    header('refresh:0; url=listado.php?user='.$datosCorrectos[0].'&contra='.$datosCorrectos[1]);
}else {
    echo'<p class = "error">Datos Incorrectos</P>';
    header ('refresh:3; url=../index.php');
}
require_once('../html/pie.html');
?>
