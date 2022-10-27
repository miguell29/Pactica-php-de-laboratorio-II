<?php
$path ='../css/';
require_once('../html/encabezado.html');

$listado = false;//CONTROL DE USUARIO CORRECTO
$datosCorrectos;// variable que guardara los datos del usuario que ingreso
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
                $datosCorrectos=explode(';',$linea);// guardando los datos del usuario en la variable
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

    //NUEVA FUNCIONALIDAD TP7_1
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $nombreLog = '/log.txt';
    $archivoLog = fopen($ubicacion.$nombreLog,'a');
    $datosLog[] = $datosCorrectos[0];
    $datosLog[] = date('Y-m-d');
    $datosLog[] = date("H:i:s");
    $datosLog = implode(';',$datosLog);
    fputs($archivoLog,$datosLog.PHP_EOL);
    fclose($archivoLog);
    // FIN DE LA NUEVA FUNCIONALIDAD TP7_1

}else {
    echo'<p class = "error">Datos Incorrectos</P>';
    header ('refresh:3; url=../index.php');
}
require_once('../html/pie.html');
?>
