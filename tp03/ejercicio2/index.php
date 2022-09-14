<?php 
require_once('html/encabezado.html');

    // NUMEROS DE NUESTRO CARTON
    $carton = [2,3,5,6,7,8,10,11,14,15,16,17,19,20,24];
    //SORTEAMOS LOS NUMEROS Y ALMACENAMOS LOS VALORES EN $numGanadores
    $numGanadores =[];
    for ($i=0; $i < 15; $i++) { 
        do {
            $num = mt_rand(1,25);
            $repetido = false;
            if (in_array($num,$numGanadores)) {
                $repetido = true;
            }
        } while ($repetido);
        $numGanadores[] = $num;
    }
    //AHORA COMPARAMOS LOS NUMEROS SORTEADOS CON LOS NUMEROS DE NUESTRO CARTON Y CONTAMOS LOS ACIERTOS
    $aciertos = 0;
    foreach ($numGanadores as $value) {
        if (in_array($value,$carton)) {
            $aciertos++;
        }   
    }
    //MENSAJE final PARA EL GANADOR DEL POZO
    $mensaje;
    if ($aciertos == 15) {
        $mensaje = '!!!!!FELICIDADES GANASTE EL POZO!!!!!';
    }else {
        $mensaje = 'obtuviste '.$aciertos.' aciertos';
    }
    //  DATOS PARA GENERAR EL CARTON
    $sorteo = mt_rand(0,99999);
    $fecha = date("j/n/Y");
    $numCarton = mt_rand(0,99999);
?>

<section class="carton">
    <section class="carton-logo">
        <article>
            <img src="img/logo.png" alt="logo de telekino">
        </article>
        <article class ="info">
            <section >
                <p>SORTEO N°</p>
                <p>FECHA</p>
            </section>
            <section>
                <p class="info-dato"><?php echo $sorteo?></p>
                <p class="info-dato"><?php echo $fecha?></p>
            </section>
        </article>
    </section>
    <section class="carton-contenido">
         <article class="carton-contenido-premios">
            <p class="premios">PREMIOS!</p>
            <p>CON TU NUMERO DE CARTON</p>
            <p id = "num-carton"><?php echo $numCarton?></p>
            <p>ACORDATE DE CONTROLAR!</p>
        </article>
        
        <article class="carton-contenido-numeros">
                <?php 
                foreach ($carton as $value) {
                    echo '<p class = "carton-contenido-numero">'.$value.'</p>';
                }?>
        </article>
            </section>
    </section>

<section class="sorteo">
    <h2>Los numeros ganadores son :</h2>
    <article class = "sorteo-numeros">
        <?php 
        foreach ($numGanadores as $value) {
        echo '<p class = "sorteo-numero">'.$value.'</p>';
        }?>
    </article>

    <article class = "mensaje"><?php echo'<p>'.$mensaje.'</p>';?></article>
</section>
<?php 
require_once('html/pie.html');
?>