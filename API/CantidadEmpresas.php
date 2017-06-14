<?php
include("../web/funciones.php");
conexionlocal();
$sql = "select count(*) as cantidad from empresas where pro_activo='t'";
//$result = pg_query($query) or die ("Error al realizar la consulta");
 
$resulset = pg_query($sql);
 
$arr = array();
while ($obj =pg_fetch_object($resulset)) {
    $arr[] = array('cantidad' => $obj->cantidad,);
}
$datares = array( 'status'=>200, 'Registros'=>$arr );
echo '' . json_encode($datares) . '';
?>