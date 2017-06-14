<?php
include("../web/funciones.php");
conexionlocal();
$sql = "select pro_cod,dec_compras from declaraciones where dec_estado='t';";
//$result = pg_query($query) or die ("Error al realizar la consulta");
 
$resulset = pg_query($sql);
 
$arr = array();
while ($obj =pg_fetch_object($resulset)) {
    $arr[] = array('pro_cod' => $obj->pro_cod,
                   'dec_compras' => ($obj->dec_compras),
        );
}
$datares = array( 'status'=>200, 'Registros'=>$arr );
echo '' . json_encode($datares) . '';
?>