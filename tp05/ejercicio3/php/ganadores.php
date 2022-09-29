<?php
    $path='../css/';
    require_once("../html/encabezado.html");
    $ubicacion='../txt/';
    $nombArchivo ='puntaje.txt';
    echo '<h2>Ganadores de Black Jack</h2>';
    $archivo=fopen($ubicacion.$nombArchivo,'r');
    while (!feof($archivo)) {
        $linea=fgets($archivo);
        if ($linea!='') {
            $datosArray=explode(';',$linea);
            if ($datosArray[1] == '21') {
                echo'<p class="ganador">'.$datosArray[0].'</p>
                ';
            }
        }
    }
    fclose($archivo);
    require_once("../html/footer.html");
?>
    
