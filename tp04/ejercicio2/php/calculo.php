<?php

$path ='../css/';
require_once('../html/encabezado.html');
require_once('../php/funciones.php');

if (!empty($_POST['monto']) && !empty($_POST['moneda'])) {
    $cambio = cotizacionCripto($_POST['moneda']);
    $resultado = $_POST['monto']/$cambio;

    echo '<nav><h1>Cueva Digital</h1></nav>
    <section>
        <p class="compra">Compra:</p>
        <p class ="monto">Monto Disponible: $'.number_format($_POST['monto'],2,',','.').'</p>
        <p class = "resultado">'.$_POST['moneda'].' Adquirido: '.number_format($resultado,10,',','.').'</p>
    </section>';
}else {
    echo'<p class = "error">OCURRIO UN ERROR : NO SE ENCONTRARON LOS DATOS</P>';
}
require_once('../html/pie.html');
?>