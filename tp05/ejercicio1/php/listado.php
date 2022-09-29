<?php
    $path ='../css/';
    require_once('../html/encabezado.html');
?>
    <h1>Datos Correctos</h1>
<?php
    $user=$_GET['user'];
    $contra=$_GET['contra'];
    echo '<p class = "datos">Usuario: '.$user.'</p>
    <p class = "datos">Contraseña: '.$contra.'</p>';
    require_once('../html/pie.html');

?>