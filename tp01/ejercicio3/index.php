<?php
    require_once('html/encabezado.html');

    /*** MOSTRAR RECIBO DE SUELDO ***/ 


// Constantes
    define('APORTE_JUBILATORIO',13);
    define('OBRA_SOCIAL',3.5);
    define('TITULO',10);

// Variables de entrada
    $nombre = 'Miguel Juarez';
    $sueldoBasico =mt_rand(70000,90000);  //sueldo basico


// Calculos

    $ingresoTitulo = $sueldoBasico * TITULO/100;
    $sueldoBruto = $sueldoBasico + $ingresoTitulo;
    $descuentoJubilacion = $sueldoBruto * APORTE_JUBILATORIO/100;
    $descuentoObraSocial = $sueldoBruto * OBRA_SOCIAL/100;
    $sueldoNeto = $sueldoBruto - $descuentoJubilacion - $descuentoObraSocial;

?>


<!-- SE MUESTRAN LOS DATOS POR PANTALLA -->

<table>
    <caption><?PHP echo 'Empleado/a: '.$nombre;?></caption>
    <thead>
        <tr>
            <th scope="col" >Concepto</th><th scope="col">Ingresos</th><th scope="col">Descuentos</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">Sueldo basico</td>
            <td><?php echo '$'.number_format($sueldoBasico,2,',','.');?></td>
            <td></td>
        </tr>
        <tr>
            <td scope="row">Titulo</td>
            <td><?php echo '$'.number_format($ingresoTitulo,2,',','.');?></td>
            <td></td>
        </tr>
        <tr>
            <td scope="row">Aporte Jubilatorio</td>
            <td></td>
            <td><?php echo '$'.number_format($descuentoJubilacion,2,',','.');?></td>
        </tr>
        <tr>
            <td scope="row">Obra social</td>
            <td></td>
            <td><?php echo '$'.number_format($descuentoObraSocial,2,',','.');?></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan=3><?php echo 'Sueldo Neto $'.number_format($sueldoNeto,2,',','.')?></td>
        </tr>
    </tfoot>
</table>


<?php
  require_once('html/pie.html');
?>