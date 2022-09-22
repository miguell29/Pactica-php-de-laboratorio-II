<?php
$path ='../css/';
require_once('../html/encabezado.html');


if (!empty($_POST['usuario']) && !empty($_POST['contra'])) {
    $user =$_POST['usuario'];
    $contra =$_POST['contra'];
    

    echo '<p class = "datos">Usuario: '.$user.'</p>
    <p class = "datos">Contraseña: '.$contra.'</p>';
}else {
    echo'<p class = "error">OCURRIO UN ERROR : NO SE ENCONTRARON LOS DATOS</P>';
}


require_once('../html/pie.html');
?>




<p></p>
<p></p>