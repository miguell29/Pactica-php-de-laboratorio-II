


<?php
    require_once("html/encabezado.html");
    const INICIO="AE ";
    /*****SE ELIJE UN NUMERO (1-999) Y LETRAS ALEATORIAS (F-Z)******/
    $numero = mt_rand(1,999);
    $final = chr(mt_rand(ord('F'),ord('Z'))).chr(mt_rand(ord('F'),ord('Z')));

    if ($numero <10) {
        $numero = '00'.$numero;
    } else if($numero < 100){
        $numero = '0'.$numero;
    }
?>


    
    <section class="contenido-principal">
        <h2>Patente Generada :</h2>
        <p><?php echo INICIO.$numero.' '.$final?></p>
    </section>


<?php
    require_once("html/footer.html");
?>


