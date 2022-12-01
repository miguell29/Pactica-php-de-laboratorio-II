<?php 
date_default_timezone_set('America/Argentina/Tucuman');
setlocale(LC_ALL,'spanish');
$fecha = strftime('%A %d de %B de %Y');
echo '<header><p>'.ucfirst($fecha).'</p><figure><a href="carrito_ver.php"><img src="../img/carrito.png" alt=""></a></figure></header>';
?>

