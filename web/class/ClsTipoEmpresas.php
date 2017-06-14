<?php
/*
 * Autor: Marcos A. Riveros.
 * Año: 2017
 * Sistema de IVA
 */
session_start();
$codusuario=  $_SESSION["codigo_usuario"];

    include '../funciones.php';
    conexionlocal();
    
    //Datos del Form Agregar
    if  (empty($_POST['txtNombreA'])){$nombreA='';}else{ $nombreA = $_POST['txtNombreA'];}
    if  (empty($_POST['txtDescripcionA'])){$descripcionA='';}else{ $descripcionA= $_POST['txtDescripcionA'];}
    
    
    //Datos del Form Modificar
    if  (empty($_POST['txtCodigo'])){$codigoModif=0;}else{$codigoModif=$_POST['txtCodigo'];}
    if  (empty($_POST['txtDescripcionM'])){$descripcionM='';}else{ $descripcionM= $_POST['txtDescripcionM'];}
    if  (empty($_POST['txtEstadoM'])){$estadoM='f';}else{ $estadoM= 't';}
    
    //DAtos para el Eliminado Logico
    if  (empty($_POST['txtCodigoE'])){$codigoElim=0;}else{$codigoElim=$_POST['txtCodigoE'];}
    
    
        //Si es agregar
        if(isset($_POST['agregar'])){
            if(func_existeDato($descripcionA, 'tipo_empresa', 'tip_des')==true){
                echo '<script type="text/javascript">
		alert("El Tipo de empresa ya existe. Ingrese otro Tipo");
                window.location="http://dev.appwebpy.com/IVASYS/web/tipo_empresa/ABMtipo.php";
		</script>';
                }else{              
                //se define el Query   
                $query = "INSERT INTO tipo_empresa(tip_des,tip_estado)"
                    . "VALUES ('$descripcionM','t');";
                //ejecucion del query
                $ejecucion = pg_query($query)or die('Error al realizar la carga');
                $query = '';
                header("Refresh:0; url=http://dev.appwebpy.com/IVASYS/web/tipo_empresa/ABMtipo.php");
                }
            }
        //si es Modificar    
        if(isset($_POST['modificar'])){
            
            pg_query("update tipo_empresa set "
                    . "tip_des= '$descripcionM',"
                    . "tip_estado='$estadoM' "
                    . "WHERE tip_cod=$codigoModif");
            $query = '';
            header("Refresh:0; url=http://dev.appwebpy.com/IVASYS/web/tipo_empresa/ABMtipo.php");
        }
        //Si es Eliminar
        if(isset($_POST['borrar'])){
            pg_query("update tipo_empresa set tip_estado='f' WHERE tip_cod=$codigoElim");
            header("Refresh:0; url=http://dev.appwebpy.com/IVASYS/web/tipo_empresa/ABMtipo.php");
	}
