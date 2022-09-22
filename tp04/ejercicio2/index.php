<?php

$path ='css/';
require_once('html/encabezado.html');
require_once('php/funciones.php');
?>
<section>
    <form action="php/calculo.php" method="post">
    <section>
        <label for="monto">Monto Disponible:</label>
        <input type="number" required id="monto" name="monto" placeholder="Ingrese el valor en pesos">
    </section>
    <section>
        <label for="moneda">cripto:</label>
        <select name="moneda" id="moneda">
            <option value="btc" selected>Bitcoin</option>
            <option value="eth">Ethereum</option>
            <option value="sol">Solana</option>
            <option value="bnb">BNB</option>
            <option value="usdt">USDT</option>
        </select>
        <input type="submit" value="Comprar">
    </section>
    </form>
</section>

<?php
require_once('html/pie.html');
?>