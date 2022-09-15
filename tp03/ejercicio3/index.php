<?php 
require_once('html/encabezado.html');
require_once('php/juegos.php');


/*CREAR UN ARRAY con el nombre  DE C/U DE LOS <JUEGOS  para calcular la ganacia individual y la cantidad vendida*/
$gananciaIndividual=[];
$cantidad=[];
foreach ($juegos as $key => $value) {
    $gananciaIndividual[$key] = 0;
    $cantidad[$key] = 0;
}


// COMPRAR 1000 JUEGOS Y DISTRIBUIR LOS DESCUENTOS
for ($i=0; $i < 1000; $i++) { 
    $preciofinal;
    $comprarJuego = array_rand($juegos);
    if ($i <10) {
        $preciofinal = $juegos[$comprarJuego] *0.1;
    }elseif ($i <200) {
        $preciofinal = $juegos[$comprarJuego] * 0.3;
    }elseif ($i < 500) {
        $preciofinal = $juegos[$comprarJuego] * 0.5;
    }else {
        $preciofinal = $juegos[$comprarJuego] * 0.6;
    }
    // ALMACENAR LAS GANANCIAS INDIVIDUALES y registrar las ventas individuales
    $gananciaIndividual[$comprarJuego] = $gananciaIndividual[$comprarJuego] + $preciofinal;
    $cantidad[$comprarJuego]++;
}
    /*****GANANCIA TOTAL *****/
    $gananciaTotal = array_sum($gananciaIndividual);
?>

<section>
    <h2>Total Recaudado: $<?php echo number_format($gananciaTotal,2,',','.');?></h2>
    <h1>Resumen de Ventas:</h1>
</section>

<section class="tabla">
    <table>
        <thead>
            <tr>
                <th>Juegos</th>
                <th>Cantidad</th>
                <th>Recaudacion</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($gananciaIndividual as $key => $value) {
                    echo '<tr>
                    <td>'.$key.'</td>
                    <td>'.$cantidad[$key].'</td>
                    <td>$'.number_format($value,2,',','.').'</td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</section>

<?php 
require_once('html/pie.html');
?>