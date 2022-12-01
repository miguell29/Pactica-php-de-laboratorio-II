<?php 
date_default_timezone_set('America/Argentina/Tucuman');
setlocale(LC_ALL,'spanish');
$fecha = strftime('%A %d de %B de %Y');
echo '<header><p>'.ucfirst($fecha).'</p></header>';
?>