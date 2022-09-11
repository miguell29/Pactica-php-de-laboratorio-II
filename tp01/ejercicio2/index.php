<?php
    require_once('html/encabezado.html');

    /*** MOSTRAR FACTURA A DE CARGAR NAFTA ***/ 


// Variables de entrada
    $cargar = mt_rand(10,50);  //litros de nafta a cargar
    $porcentajeDescuento = 10;
    $porcentajeIva = 21;
    $precio = 125.90;   //precio de la nafta

// Variables  auxiliares
    $precioTotal = $cargar*$precio;  //precio total sin ninguna modificacion


// Calculos
    $descuento = $precioTotal * $porcentajeDescuento/100;
    $totalSinIva = $precioTotal - $descuento;
    $iva = $totalSinIva * ($porcentajeIva/100);
    $total = $totalSinIva + $iva;
?>

<!-- SE MUESTRAN LOS DATOS POR PANTALLA -->

<table>
    <caption>Factura A</caption>
    <thead>
        <tr>
            <th scope="col" >Cant./Precio unit.</th><th scope="col">IMPORTE</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">Nafta super XXI <?PHP echo $cargar;?> x <?php echo $precio;?></td>
            <td><?php echo number_format ($precioTotal,2, ',', '.');?></td>
        </tr>
        <tr>
            <td scope="row"><?php echo 'Descuento '.$porcentajeDescuento.'%';?></td>
            <td><?php echo '-'.number_format ($descuento,2, ',', '.');?></td>
        </tr>
        <tr>
            <td scope="row">Total sin iva</td>
            <td><?php echo number_format ($totalSinIva,2, ',', '.');?></td>
        </tr>
        <tr>
            <td scope="row"><?php echo 'IVA '.$porcentajeIva.'%'?></td>
            <td><?php echo number_format ($iva,2, ',', '.');?></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td scope="row">Total</td>
            <td><?php echo number_format ($total,2, ',', '.');?></td>
        </tr>
    </tfoot>
</table>


<?php
  require_once('html/pie.html');
?>