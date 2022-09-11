


<?php
    require_once("html/encabezado.html");


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
    require_once("html/footer.html");
?>


