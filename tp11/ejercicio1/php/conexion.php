<?php


function conectar(){

    $servidor = 'localhost';
    $usuario = 'root';
    $clave = '';
    $db = 'labo2';

    $conexion = mysqli_connect($servidor,$usuario,$clave,$db); //Nos conectamos a la base de datos y controlamos que no existan errores
    if (!$conexion) {
        echo '<p>Error al conectar</p>';
    }else {
        return($conexion);
    }
}


function desconectar($conexion){
    if ($conexion) {
        $estado = mysqli_close($conexion);
        if ($estado) {
        }else {
            echo '<p>Error al intentar desconectar</p>';
        }
    }else {
        echo '<p>No se puede desconectar, no existe una coneccion</p>';
    }
}