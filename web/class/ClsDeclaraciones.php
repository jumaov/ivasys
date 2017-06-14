<?php
/*
 * Autor: Marcos A. Riveros.
 * Año: 2015
 * Sistema de Compras y Pagos SCP-INTN
 */
session_start();
$codusuario=  $_SESSION["codigo_usuario"];

    include '../funciones.php';
    conexionlocal();
    
    //Datos del Form Agregar
    if (empty($_POST['txtEmpresaA'])){$empresaA='';}else{ $empresaA= $_POST['txtEmpresaA'];}
    if (empty($_POST['txtFacturacionA'])){$facturacionA='';}else{ $facturacionA= $_POST['txtFacturacionA'];}
    if (empty($_POST['txtCompraA'])){$compraA='';}else{ $compraA= $_POST['txtCompraA'];}
    $montoImponible=$facturacionA-$compraA;
    //DAtos para el Eliminado Logico
    if  (empty($_POST['txtCodigoE'])){$codigoElim=0;}else{$codigoElim=$_POST['txtCodigoE'];}
    
    
        //Si es agregar
        if(isset($_POST['agregar'])){
            if(func_existeFecha($empresaA, 'declaraciones', 'pro_cod')==true){
                echo '<script type="text/javascript">
		alert("La Declaración ya existe. Ingrese otra Declaración");
                window.location="http://dev.appwebpy.com/IVASYS/web/declaraciones/ABMdeclaraciones.php";
		</script>';
                }else{              
                //se define el Query
                if ($montoImponible > 0){
                    $query = "INSERT INTO declaraciones(dec_facturacion, dec_compras, dec_monto_imponible, dec_calculoiva, 
                    dec_monto_a_favor, dec_fecha, dec_estado, pro_cod)
                    VALUES ($facturacionA, $compraA, $montoImponible, ($montoImponible*10)/100, 0, 
                    now(), 't',$empresaA);";
                    $ejecucion = pg_query($query)or die('Error 108: '.$query);
                    $query = '';
                }else
                {
                     $query = "INSERT INTO declaraciones(dec_facturacion, dec_compras, dec_monto_imponible, dec_calculoiva, 
                    dec_monto_a_favor, dec_fecha, dec_estado, pro_cod)
                    VALUES ($facturacionA, $compraA, 0, 0, ($montoImponible * -1), 
                    now(), 't',$empresaA);";
                    $ejecucion = pg_query($query)or die('Error al realizar la carga');
                    $query = '';
                }
                
                
                //ejecucion del query
               
                header("Refresh:0; url=http://dev.appwebpy.com/IVASYS/web/benchmark.php");
                }
            }
        //Si es Eliminar
        if(isset($_POST['borrar'])){
            pg_query("delete from declaraciones WHERE dec_cod=$codigoElim");
            header("Refresh:0; url=http://dev.appwebpy.com/IVASYS/web/declaraciones/ABMdeclaraciones.php");
	}
