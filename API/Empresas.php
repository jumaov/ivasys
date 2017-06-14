<?php
include("../web/funciones.php");
conexionlocal();
$sql = "select * from empresas where pro_activo='t';";
//$result = pg_query($query) or die ("Error al realizar la consulta");
 
$resulset = pg_query($sql);
 
$arr = array();
while ($obj =pg_fetch_object($resulset)) {
    $arr[] = array('pro_cod' => $obj->pro_cod,
                   'pro_razon' => utf8_encode($obj->pro_razon),
                   'pro_direccion' => utf8_encode($obj->pro_direccion),
                   'pro_activo' => $obj->pro_activo,
        );
}
$datares = array( 'status'=>200, 'Registros'=>$arr );
echo '' . json_encode($datares) . '';
?>