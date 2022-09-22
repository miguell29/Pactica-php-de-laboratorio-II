<?php

$path ='../css/';
require_once('../html/encabezado.html');
require_once('../php/funciones.php');
$deposito;
$plazo;
$interes;
if (!empty($_POST['deposito']) && !empty($_POST['plazo'])) {
    $deposito = (int)$_POST['deposito'];
    $plazo = (int)$_POST['plazo'];
    $interes = clacularInteres($deposito,$plazo);
    $total = $deposito + $interes;

    echo '<nav><h1>Casa de Cambio</h1></nav>
    <section>
        <p class="simulacion">Simulacion de plazo fijo</p>
        <p class ="verde">Deposito Inicial: $'.number_format($deposito,2,',','.').'</p>
        <p class = "salmon">Plazo: '.$plazo.'</p>
        <p class ="verde">Interes Ganado: $'.number_format($interes,2,',','.').'</p>
        <p class ="salmon">Monto total a cobrar: $'.number_format($total,2,',','.').'</p>
    </section>';
}else {
    echo'<p class = "error">OCURRIO UN ERROR : NO SE ENCONTRARON LOS DATOS</P>';
}
require_once('../html/pie.html');
?>