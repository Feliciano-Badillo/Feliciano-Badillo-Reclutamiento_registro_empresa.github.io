<?php
require_once "conexion.php";


$correo=$_POST["correo"];
$contrasena=$_POST["contrasena"];


$query=mysqli_query($conexion,"SELECT * from administrador where correo='$correo' and contrasena='$contrasena'");
$resultado=mysqli_num_rows($query);

if($resultado>0){
	header('location: indexAdmin.html');


}else{
		echo '<script>
	alert("Correo o Contraseña incorrecta");
	window.history.go(-1);
		</script>';
	exit;

	}

mysqli_close($conexion);
?>