<?php

$path ='css/';
require_once('html/encabezado.html');
?>
<section>
    <?php 
    date_default_timezone_set('America/Argentina/Buenos_Aires');
        $ubicacion = 'txt';
        $archivo = '/empleados.txt';
        $recurso = fopen($ubicacion.$archivo,'r');
        while (!feof($recurso)) {
            $linea = fgets($recurso);
            $linea = trim($linea);
            if ($linea != '') {
                $linea = explode(';',$linea);
                echo '<article><p class="nombre">'.$linea[0].' - '.$linea[1].', '.$linea[2].'</p>';
                $fecha = date_create($linea[3]);
                $dia = date_format($fecha,'d');
                $mes = date_format($fecha,'m');
                $añoActual = date('Y');
                
                echo '<p>Fecha de nacimiento:'.$dia.' de '.date_format($fecha,'F').' del '.date_format($fecha,'Y').'</p>';
                $diferencia = strtotime($dia.'-'.$mes.'-'.$añoActual) - strtotime(date('d-m-Y'));
                $diferencia= round($diferencia/(3600*24),0) ;
                if ($diferencia == 0) {
                    echo '<p class = "cumple">FELIZ CUMPLEAÑOS</p>';
                }elseif ($diferencia < 0) {
                    $diferencia +=365;
                    echo '<p>Dias restantes para el cumpleaños :'.$diferencia.'</p>';
                }else {
                    echo '<p>Dias restantes para el cumpleaños :'.$diferencia.'</p>';
                }
                echo '</article>';
            }
        }
        fclose($recurso);
    ?>
</section>

<?php
require_once('html/pie.html');
?>

<p class="nombre"></p>

