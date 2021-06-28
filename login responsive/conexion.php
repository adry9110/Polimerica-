<?php
$conexion = new mysqli("localhost", "root","", "bdpolimerica");
if(!$conexion)
{
    echo 'Error al conectar a la base de datos';
}
else{
    'conectado a la base de datos';
}
?>