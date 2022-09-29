


<?php
    $path='../css/';
    require_once("../html/encabezado.html");
//NUEVAS FUNCIONALIDADES
$nombre;
$datosFinales;
if (!empty($_POST['nombre'])) {
    //LIMPIANDO LOS DATOS
    $nombre = $_POST['nombre'] = trim($_POST['nombre'],'}');
    $nombre = $_POST['nombre'] = trim($_POST['nombre']);    
    //UBICACION DEL ARCHIVO DE TEXTO
    $ubicacion = '../txt/';
    $archivo = 'puntaje.txt';
    if (!file_exists($ubicacion)) {
        mkdir($ubicacion);
    }    

//FUNCIONES ANTERIORES
    /*****REPARTIENDO CARTAS******/
    $primera = mt_rand(1,13);
    $segunda = mt_rand(1,13);
    $tercera = mt_rand(1,13);


    /*****cALCULANDO EL RESULTADO******/
    if ($primera == 11 || $primera == 12 || $primera == 13 ) {
        $primera = 10;
    }
    if ($segunda == 11 || $segunda == 12 || $segunda == 13) {
        $segunda = 10;
    }
    if ($tercera == 11 || $tercera == 12 || $tercera == 13) {
        $tercera = 10;
    }

    $resultado = $primera + $segunda + $tercera;



    /*****CAMBIANDO EL VALOR DE LAS CARTAS 1,11,12,13 PARA MOSTRAR POR PANTALLA******/
    switch ($primera) {  //PRIMERA CARTA
        case 1:
            $primera = 'A';
            break;
        case 11:
            $primera = 'J';
            break;
        case 12:
            $primera = 'Q';
            break;
        case 13:
            $primera = 'K';
            break;
    }

    switch ($segunda) {  //SEGUNDA CARTA
        case 1:
            $segunda = 'A';
            break;
        case 11:
            $segunda = 'J';
            break;
        case 12:
            $segunda = 'Q';
            break;
        case 13:
            $segunda = 'K';
            break;
    }

    switch ($tercera) {  //TERCERA CARTA
        case 1:
            $tercera = 'A';
            break;
        case 11:
            $tercera = 'J';
            break;
        case 12:
            $tercera = 'Q';
            break;
        case 13:
            $tercera = 'K';
            break;
    }

    /*****MOSTRAR MENSAJE FINAL******/
    $mensaje = '';
    if ($resultado == 21) {
        $mensaje = 'GANASTE!!!'; 
    } else {
        $mensaje = 'obtuviste '.$resultado.' puntos';
    }
?>
    <section class="contenido-principal">
        <section class="mesa">
            <article class="carta">
                <p><?php echo $primera;?></p>
            </article>
            <article class="carta">
                <p><?php echo $segunda;?></p>
            </article>
            <article class="carta">
                <p><?php echo $tercera;?></p>
            </article>
        </section>
        <p><?php echo $mensaje;?></p>
    </section>

<?php
    $datosFinales[]=$nombre;
    $datosFinales[]=(string)$resultado;
    var_dump($datosFinales);
    $datosTxt=implode(";", $datosFinales);
    $file = fopen($ubicacion.$archivo,'a');//se abre el archivo
    fputs($file,$datosTxt.PHP_EOL);
    fclose($file);//SE cierra el archivo

    }else {
        echo'<p class = "error">OCURRIO UN ERROR : NO SE ENCONTRARON LOS DATOS</P>';
        header ('refresh:3; url=../index.php');
    }
    require_once("../html/footer.html");
?>


