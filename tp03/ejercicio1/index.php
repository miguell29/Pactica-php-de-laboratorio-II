<?php 
require_once('html/encabezado.html');

$contraseña = '';

$long = mt_rand(8,16);  //CANTIDAD DE CARACTERES DEL PASS ALEATORIO


for ($i=0; $i < $long ; $i++) { 
    $codigoAscii= mt_rand(48,122);

    //WHILE PARA QUE CUANDO NO SEA UN CARACTER PERMITIDO VUELVA A SELECCIONAR OTRO NUMERO ALEATORIO
    while (($codigoAscii > 57 &&  $codigoAscii < 65) || ($codigoAscii > 90 && $codigoAscii < 97)) { 
        $codigoAscii= mt_rand(48,122);
    }
    // SE ALMACENA EL CARACTER EN LA VARIABLE CONTRASEÑA
    $contraseña .= chr($codigoAscii);
    }
?>
<section>
    <form>
        <legend>Cantidad de caracteres</legend>
        <section class="inputs">
            <section><label for="min">Minimo</label><input type="text" id="min"></section>
            <section><label for="max">Maximo</label><input type="text" id="max"></section>
            <input type="submit" value="Generar">
            <p>Contraseña: <?php echo $contraseña;?></p>
        </section>
    </form>
</section>
<?php 
require_once('html/pie.html');
?>