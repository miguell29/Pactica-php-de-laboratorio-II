<?php

const IMPUESTO_PAIS = 30;
const IMPUESTO_GANANCIAS = 35;

$dolares_compra = mt_rand(100,300);
$cotizacion_oficial = 142;
echo '<p>Estas comprando USD '.number_format($dolares_compra,2,',','.').'</p>';
echo '<p>Cotizacion oficial: '.number_format($cotizacion_oficial,2,',','.').'</p>';



$subTotal = $dolares_compra * $cotizacion_oficial;
$total = $subTotal;
echo '<p>Subtotal (sin impuestos): '.number_format($subTotal,2,',','.').'</p>';



$impuesto_pais =$subTotal * (IMPUESTO_PAIS / 100);;
echo '<p>Impuesto PAIS: $'.number_format($impuesto_pais,2,',','.').'</p>';



$total += $impuesto_pais;
$ganancias = $subTotal * (IMPUESTO_GANANCIAS / 100);
echo '<p>Percepcion ganancias: $'.number_format($ganancias,2,',','.').'</p>';



$total += $ganancias;
echo '<p><b>Total (con impuestos): $'.number_format($total,2,',','.').'</b></p>';
?>