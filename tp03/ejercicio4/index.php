<?php 
require_once('html/encabezado.html');
require_once('php/piezas.php');

/***** GENERAR EL TABLERO ALEATORIO ACTUAL SEGUN LA CONSIGNA ******/

$tableroActual=[];
for ($i=0; $i < 64; $i++) { 
    $casillero = array_rand($piezasDisponibles);
    $tableroActual[] = $piezasDisponibles[$casillero];
    unset($piezasDisponibles[$casillero]);    
}
$posicion = 0; // POSICION DEL CASILLERO QUE VA DE 0 A 65
?>

<section>
    <table>
        <tbody>
            <?php
            //GENERAMOS LA TABLA DE AJEDREZ
                for ($i=0; $i < 8; $i++) { 
                    echo '<tr>
                    ';
                    for ($j=0; $j < 8; $j++) { 
                        if($tableroActual[$posicion] == 'vacio'){
                            if(($i+$j) % 2){
                                echo '<td><img src="img/vacio_n.jpg"></td>
                                ';
                            } 
                            else {
                                echo '<td><img src="img/vacio_b.jpg"></td>
                                ';
                            }
                        }else {
                            echo '<td><img src="img/'.$tableroActual[$posicion].'.jpg"></td>
                            ';
                        }
                        $posicion++;
                    }
                    echo '
                    </tr>';      
                }
            ?>
        </tbody>
    </table>
</section>

<?php 
require_once('html/pie.html');
?>