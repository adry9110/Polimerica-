<?php
    require ('conexion.php'); 
    
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $telefono = $_REQUEST['telefono'];
    $direccion = $_REQUEST['direccion'];
    $correo = $_REQUEST['correo'];
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];
  
    
    
$insertar = "INSERT INTO operario(nom_ope, ape_ope, telefono, direccion, correo, tipo_ope, ing_clave) VALUES ('$nombre', '$apellidos', '$telefono', '$direccion', '$correo', '$usuario', '$clave')";
    // borrar el producto con el codigo que seleccionamos en la pàgina anterior
echo $insertar;

$resultado = $conexion->query($insertar);
if(!$resultado){
    echo'Error al registrarse';
}else{
    'Usuario registrado exitosamente';
}

?>