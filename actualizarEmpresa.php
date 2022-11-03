<?php

  include "empresas.php";
  $emp1 = new Empresas();
  $emp1->conectarBD();
  $emp1-> actualizarEmpresa($_REQUEST['id_empresa_nueva'],$_REQUEST['razon_social_nuevo'],$_REQUEST['siglas_nuevo'],$_REQUEST['ceo_nuevo'],$_REQUEST['giro_nuevo'],$_REQUEST['tamano_nuevo'],$_REQUEST['celular_nuevo'],$_REQUEST['estatus_nuevo'],$_REQUEST['fecha_hora_nuevo'],$_REQUEST['catalogo_puestos_nuevo'],$_REQUEST['clave_nuevo_empresa']);
  $emp1->cerrarBD();
  
?>