<?php
include("../funciones.php");
conexionlocal();
$sql = "select count(*) as cantidad_declaraciones from declaraciones where dec_estado='t';";
//$result = pg_query($query) or die ("Error al realizar la consulta");
 
$resulset = pg_query($sql);
 
$arr = array();
while ($obj =pg_fetch_object($resulset)) {
    $arr[] = array('cantidad_declaraciones' => $obj->cantidad_declaraciones,
                   
        );
}
$datares = array( 'status'=>200, 'Registros'=>$arr );
echo '' . json_encode($datares) . '';
?>