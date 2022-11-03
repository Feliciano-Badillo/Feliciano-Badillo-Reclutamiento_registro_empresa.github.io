<?php

class Empresas{

    private $razon_social;
    private $siglas;
    private $ceo;
    private $giro;
    private $tamano;
    private $celular;
    private $estatus;
    private $fecha_hora;
    private $catalogo_puestos;
    
    public function inicializarUsuario($razon_social,$siglas,$ceo,$giro,$tamano,$celular,$estatus,$fecha_hora,$catalogo_puestos){
        $this->razon_social=$razon_social;
        $this->siglas=$siglas;
        $this->ceo=$ceo;
        $this->giro=$giro;
        $this->tamano=$tamano;
        $this->celular=$celular;
        $this->estatus=$estatus;
        $this->fecha_hora=$fecha_hora;
        $this->catalogo_puestos=$catalogo_puestos;

    }  
    public function conectarBD(){
        $con=mysqli_connect ("localhost","root","","recluta")or die("PROBLEMAS CON LA CONEXION DE BD");
            return $con;                      
    }
    public function cerrarBD(){
         mysqli_close($this->conectarBD());
    }
    public function listaEmpresa(){ 
        $registros=mysqli_query($this->conectarBD(),"select * from empresas")or die (mysqli_error($this->conectarBD()));
            echo '<table id="tabla" class="table">';
            echo '<tr class="thead-dark">';
            echo '<th>Id</th>';
            echo '<th>Razón Social</th>';
            echo '<th>Siglas</th>';
            echo '<th>Ceo</th>';
            echo '<th>Giro</th>';
            echo '<th>Tamaño</th>';
            echo '<th>Celular</th>';
            echo '<th>Estatus</th>';
            echo '<th>Fecha y Hora</th>';
            echo '<th>Catalogos</th>';

            echo '</tr>';
            while ($reg=mysqli_fetch_array($registros)){
?>
            <tr>
            <td scope="row"><?php echo $reg['id_empresa'] ?> </td>
            <td><?php echo $reg['razon_social'] ?> </td>
            <td><?php echo $reg['siglas']?> </td>
            <td><?php echo $reg['ceo']?> </td>
            <td><?php echo $reg['giro']?> </td>  
            <td><?php echo $reg['tamano']?> </td>
            <td><?php echo $reg['celular']?> </td>
            <td><?php echo $reg['estatus']?> </td>
            <td><?php echo $reg['fecha_hora']?> </td>
            <td><?php echo $reg['catalogo_puestos']?> </td>
        </tr>
            <?php
            }
            echo '</table>';                            
    }
    public function modificarEmpresa($id_empresa){
        $this->id_empresa=$id_empresa;
        $registro=mysqli_query($this->conectarBD(),"select * from empresas where id_empresa='$id_empresa'") or die("Problemas en el select:".mysqli_error($this->conectarBD()));
        if ($reg=mysqli_fetch_array($registro)){
            echo '<form class="formulario" action="actualizarEmpresa.php" method="post">
                    
                    <div class="formu">
                    <label for="name">Id:</label>
                    <div class="formu1">
                        <i class="fa fa-list-ol"></i>
                        <input placeholder="Id" type="number" name="id_empresa_nueva" value="'.$reg[0].'" readonly>
                    </div>
                    <div class="formu">
                    <label for="name">Razán Social:</label>
                    <div class="formu1">
                        <i class="fa fa-user fa-2"></i>
                        <input placeholder="Ingresa tu Razón Social" type="text" name="razon_social_nuevo" required value="'.$reg[1].'">
                    </div>
                </div>
                <div class="formu">
                    <label for="ap">Siglas:</label>
                    <div class="formu1">
                        <i class="fa fa-address-book"></i>
                        <input placeholder="Ingresa las siglas nuevo" type="text" name="siglas_nuevo" required value="'.$reg[2].'">
                    </div>		
                </div>
                <div class="formu">
                    <label for="ap">Ceo:</label>
                    <div class="formu1">
                        <i class="fa fa-address-book-o"></i>
                        <input placeholder="Ingresa el CEO" type="text" name="ceo_nuevo" required value="'.$reg[3].'">
                    </div>
                </div>
                <div class="formu">
                    <label for="ap">Giro:</label>
                    <div class="formu1">
                        <i class="fa fa-address-book-o"></i>
                        <input placeholder="Ingresa el Giro" type="text" name="giro_nuevo" required value="'.$reg[4].'">
                    </div>
                </div>
                <div class="formu">
                    <label for="mail">Tamaño:</label>
                    <div class="formu1">
                        <i class="fa fa-envelope fa-2"></i>
                        <select name="tamano_nuevo" id="tamano_nuevo" placeholder="Ingresar el tamano de tu empresa" required value="'.$reg[5].'">
                            <option value="Pequeña">Empresa pequeña</option>
                            <option value="Mediana">Empresa mediana</option>
                            <option value="Grande">Emperesa grande</option>
                        </select>
                    </div>
                </div>
                <div class="formu">
                    <label for="contr">Celular:</label>
                    <div class="formu1">
                        <i class="fa fa-unlock-alt"></i>
                        <input placeholder="Ingresa tu celular" type="number" name="celular_nuevo" required value="'.$reg[6].'">
                    </div>
                </div>
                <div class="formu">
                    <label for="contr">Estatus:</label>
                    <div class="formu1">
                        <i class="fa fa-unlock-alt"></i>
                        <input placeholder="Ingresa el estatus" type="number" name="estatus_nuevo" required value="'.$reg[7].'">
                    </div>
                </div>
                <div class="formu">
                    <label for="contr">Fecha y Hora:</label>
                    <div class="formu1">
                        <i class="fa fa-unlock-alt"></i>
                        <input placeholder="Ingrese la fecha" type="datetime-local" name="fecha_hora_nuevo" required value="'.$reg[8].'">
                    </div>
                </div>
                <div class="formu">
                    <label for="contr">Catálogos de puesto:</label>
                    <div class="formu1">
                        <i class="fa fa-unlock-alt"></i>
                        <input placeholder="Ingresa el catalogo" type="text" name="catalogo_puestos_nuevo" required value="'.$reg[9].'">
                    </div>
                </div>
                <div class="formu">
                    <input type="hidden" name="clave_nuevo_empresa" value="'.$id_empresa.'">
                    <button  class="btn btn-dark" id="registrar" type="submit">Modificar</button>
                </div>
                </form>';
        }else{
            echo '<h2>No hay Empresas registrado con esta clave.</h2><br>
            <a href="listaEmpresas.php" class="btn btn-dark" role="button">Volver</a>';
        }
    }
    public function actualizarEmpresa($id_empresa_nueva,$razon_social_nuevo,$siglas_nuevo,$ceo_nuevo,$giro_nuevo,$tamano_nuevo,$celular_nuevo,$estatus_nuevo,$fecha_hora_nuevo,$catalogo_puestos_nuevo,$clave_nuevo_empresa){
        $this->id_empresa_nueva=$id_empresa_nueva;
        $this->razon_social_nuevo=$razon_social_nuevo;
        $this->siglas_nuevo=$siglas_nuevo;
        $this->ceo_nuevo=$ceo_nuevo;
        $this->giro_nuevo=$giro_nuevo;
        $this->tamano_nuevo=$tamano_nuevo;
        $this->celular_nuevo=$celular_nuevo;
        $this->estatus_nuevo=$estatus_nuevo;
        $this->fecha_hora_nuevo=$fecha_hora_nuevo;
        $this->catalogo_puestos_nuevo=$catalogo_puestos_nuevo;

        $registro=mysqli_query($this->conectarBD(),"update empresas set id_empresa='$id_empresa_nueva',razon_social='$razon_social_nuevo', siglas='$siglas_nuevo', ceo='$ceo_nuevo',giro='$giro_nuevo',tamano='$tamano_nuevo',celular='$celular_nuevo',estatus='$estatus_nuevo',fecha_hora='$fecha_hora_nuevo',catalogo_puestos='$catalogo_puestos_nuevo' where id_empresa='$clave_nuevo_empresa'") or die(mysqli_error($this->conectarBD()));
        echo'<script type="text/javascript">
        alert("La empresa se ha modificado correctamente");
        window.location.href="listaEmpresas.php";
        </script>';
    }
    public function borrarEmpresa($id_admin){
        $registro=mysqli_query($this->conectarBD(),"select id_empresa,razon_social,siglas,ceo,giro,tamano,celular,estatus,fecha_hora,catalogo_puestos from empresas where id_empresa ='$_REQUEST[id_empresa]'") or die(mysqli_error($this->conectarBD()));  
        if ($reg=mysqli_fetch_array($registro)){
            echo "<br><h3>La empresa: </b><br></h3><br>";
            echo "<h3>Razon social:".$reg['razon_social']."</h3><br>";
            echo "<h3>Siglas: ".$reg['siglas']."</h3><br>";
            echo "<h3>CEO:".$reg['ceo']."</h3><br>";
            echo "<h3>Giro:".$reg['giro']."</h3><br>";
            echo "<h3>Tamaño:".$reg['tamano']."</h3><br>";
            $registro=mysqli_query($this->conectarBD(),"delete from empresas where id_empresa ='$_REQUEST[id_empresa]'") or die(mysqli_error($this->conectarBD()));          
            echo'<script type="text/javascript">
            alert("La empresa ha sido eliminado correctamente");
            window.location.href="listaEmpresas.php";
            </script>';        
        }else
            echo'<script type="text/javascript">
            alert("No existe la empresa con esa clave");
            window.location.href="listaEmpresas.php";
            </script>';  
    }
}

?>