


<?php
    $path='../css/';
    require_once("../html/encabezado.html");
$legajovalido=false;
$datosFinales;
if (!empty($_POST['legajo'])) {
    //LIMPIANDO LOS DATOS
    $legajo = $_POST['legajo'] = trim($_POST['legajo'],'}');
    $legajo = $_POST['legajo'] = trim($_POST['legajo']);    
    $ubicacion='../txt/';
    $nombArchivo ='sueldos.txt';
    
    $archivo=fopen($ubicacion.$nombArchivo,'r');
    while (!feof($archivo)) {
        $linea=fgets($archivo);
        if ($linea!='') {
            $datosArray=explode(';',$linea);
            if ($datosArray[0] == $legajo) {
                echo '<p>Legajo: '.$legajo.'</p>';
                echo'<p>Apellido y Nombre: '.$datosArray[1].' '.$datosArray[2].'</p>
                <p>sueldo a cobrar: $'.$datosArray[3].'</p>';
                $legajovalido=true;
            }
        }
    }
    fclose($archivo);
    if(!$legajovalido){
        echo '<p>legajo: '.$legajo.' no encontrado</p>';
    }
    }else {
        echo'<p class = "error">OCURRIO UN ERROR : NO SE ENCONTRARON LOS DATOS</P>';
        header ('refresh:3; url=../index.php');
    }
    
    require_once("../html/footer.html");
?>




