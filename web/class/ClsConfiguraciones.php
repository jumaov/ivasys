<?php
/*
 * Autor: Marcos A. Riveros.
 * Año: 2015
 * Sistema de Compras y Pagos SCP-INTN
 */

    include '../funciones.php';
    conexionlocal();
    
    //Datos del Form Agregar
    if  (empty($_POST['txtBDD'])){$bdd='';}else{ $bdd = $_POST['txtBDD'];}
    if  (empty($_POST['txtPort'])){$port='';}else{ $port= $_POST['txtPort'];}
    if  (empty($_POST['txtServer'])){$server='';}else{ $server = $_POST['txtServer'];}
    if  (empty($_POST['txtEntorno'])){$entorno='';}else{ $entorno = $_POST['txtEntorno'];}
    if  (empty($_POST['txtVersion'])){$version='';}else{ $version = $_POST['txtVersion'];}
    
//Si es agregar
        if(isset($_POST['agregar'])){
            if(func_existeDato($version, 'configuraciones', 'version')==true){
                echo '<script type="text/javascript">
		alert("La Version ya existe. Debe Actualizar del Repositorio");
                window.location="http://dev.appwebpy.com/IVASYS/login/acceso.html";
		</script>';
                }else{
                //desactivar la version anterior    
                pg_query("update configuraciones set estado='f'")or die('Error 108: '.$query);
                //se define el Query   
                $query = "INSERT INTO configuraciones(bdd,port,server,entorno,version,estado)"
                    . "VALUES ('$bdd',$port,'$server','$entorno','$version','t');";
                //ejecucion del query
                $ejecucion = pg_query($query)or die('Error 108: '.$query);
                $query = '';
                header("Refresh:0; url=http://dev.appwebpy.com/IVASYS/login/acceso.html");
                }
            }
