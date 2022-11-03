<?php
require 'conexion.php';
$razon_social = $_POST['razon_social'];
$siglas = $_POST['siglas'];
$ceo = $_POST['ceo'];
$giro = $_POST['giro'];
$tamano = $_POST['tamano'];
$celular = $_POST['celular'];
$estatus = $_POST['estatus'];
$fecha_hora = $_POST['fecha_hora'];
$catalogo_puestos = $_POST['catalogo_puestos'];

$insertar = "INSERT INTO empresas (razon_social,siglas,ceo,giro,tamano,celular,estatus,fecha_hora,catalogo_puestos) 
        VALUES ('$razon_social','$siglas','$ceo','$giro','$tamano','$celular','$estatus','$fecha_hora','$catalogo_puestos') ";

$query = mysqli_query($conexion, $insertar);

if($query){
    echo "<script> alert('La empresa ha sido registrada correcto');
          location.href = 'listaEmpresas.php';
          </script>";
}else{
    echo "<script> alert('Registro fallido');
    location.href = 'registroEmpresa.html';
    </script>";
}