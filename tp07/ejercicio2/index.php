<?php

$path ='css/';
require_once('html/encabezado.html');
?>
<section>
    <article>
        <table>
            <caption>Archivo log de inicio de sesion</caption>
            
            <thead>
                <tr>
                    <th>Usuario</th><th>Fecha</th><th>Hora</th>
                </tr>
            </thead>

            <tbody>
            <?php 
                $ubicacion = '../ejercicio1/txt';
                $archivo = '/log.txt';
                $recurso = fopen($ubicacion.$archivo,'r');
                while (!feof($recurso)) {
                    $linea = fgets($recurso);
                    $linea = trim($linea);
                    if ($linea != '') {
                        $linea = explode(';',$linea);
                        echo '<tr>';
                        foreach ($linea as $key => $value) {
                            echo '<td>'.$value.'</td>';
                        }
                        echo '</tr>';
                    }
                }
                fclose($recurso);
                ?>
            </tbody>
        </table>
    </article>
</section>

<?php
require_once('html/pie.html');
?>