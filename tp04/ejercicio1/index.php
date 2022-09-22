<?php
require_once('html/encabezado.html');
require_once('php/funciones.php');


$numeros =  [];
$numerosInvertidos = [];

//ASIGNANDO VALORES ALEATORIOS 
for ($i=0; $i < 10; $i++) { 
    for ($j=0; $j < 3; $j++) { // EN CADA POSICION DEL ARRAY $NUMEROS SE CREA OTRO ARRAY QUE CONTENGA 3 NUMEROS
        if ($j == 0) {
            $numeros[$i][$j] = mt_rand(1,9);//EL PRIMER NUMERO DE LOS TRES NO DEBE SER 0
        }else {
            $numeros[$i][$j] = mt_rand(0,9);
        }
    }
}
for ($i=0; $i < 10; $i++) { 
    $numerosInvertidos[$i] = invertirArray($numeros[$i]);//SE INVIERTEN LOS ARRAYS QUE CONTIENEN TRES NUMEROS Y QUE ESTAN DENTRO DE EL ARRAY $NUMEROS, SE USA LA FUNCION IMPORTADA DEL ARCHIVO FUNCIONES.PHP
}
?>
<section>
    <table>
        <caption>Soremún</caption>
        <thead><tr><th>Número</th><th>Invertido</th></tr></thead>
        <tbody>
            <?php
            for ($i=0; $i < 10; $i++) {
                echo '<tr><td>';
                foreach ($numeros[$i] as $value) {//SE MUESTRAN LOS NUMEROS ORIGINALES
                    echo $value;
                }
                echo '</td><td>';
                foreach ($numerosInvertidos[$i] as $value) {//SE MUESTRAN LOS NUMEROS INVERTIDOS
                    echo $value;
                }
                echo '</td></tr>
                ';
            }
            ?>
</tbody>
    </table>
</section>

<?php
require_once('html/pie.html');
?>