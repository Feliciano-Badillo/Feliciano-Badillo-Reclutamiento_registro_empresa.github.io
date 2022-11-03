<?php
require 'conexion.php';
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$insertar = "INSERT INTO administrador (nombre,correo,contrasena) VALUES ('$nombre','$correo','$contrasena') ";

$query = mysqli_query($conexion, $insertar);

if($query){
    echo "<script> alert('Registro correcto');
          location.href = 'indexAdmin.html';
          </script>";
}else{
    echo "<script> alert('Registro fallido');
    location.href = 'registroAdmin.html';
    </script>";
}