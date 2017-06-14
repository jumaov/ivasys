<?php
include("../funciones.php");
conexionlocal();
$sql = "select pro_cod, dec_facturacion from declaraciones where dec_estado='t'";
       
//$result = pg_query($query) or die ("Error al realizar la consulta");
 
$resulset = pg_query($sql);
 
$arr = array();
while ($obj =pg_fetch_object($resulset)) {
    $arr[] = array('pro_cod' => $obj->pro_cod,
                   'dec_facturacion' => ($obj->dec_facturacion),
        );
}
$datares = array( 'status'=>200, 'Registros'=>$arr );
echo '' . json_encode($datares) . '';
?>