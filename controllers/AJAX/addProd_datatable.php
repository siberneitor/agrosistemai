<?php
include '../../database/conexioni.php';

$opcion = $_POST['opcion'];

$query="select producto.codigo,
producto.descripcion,
inventario.costo,
inventario.precio,
proveedores.nombre proveedor,
inventario.fecha_caducidad,
inventario.unidades
from inventario
 join producto ON producto.codigo = inventario.codigo
 join proveedores ON producto.id_proov = proveedores.id_proov 
";

switch($opcion) {
    case 1:
        //var_dump('entra a opcion1');

        $resultado = $mysqli->query($query) or die($mysqli->error);
        $data = $resultado->fetch_all(MYSQLI_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

        break;

    case 2 :

       // var_dump('entra a cases 2');
        $query = "
select producto.codigo,
                    producto.descripcion,
                    inventario.costo,
                    inventario.precio,                    
                    inventario.fecha_caducidad,
                    inventario.unidades,
                    proveedores.nombre proveedor
                    FROM inventario
right join producto ON inventario.codigo = producto.codigo
 join proveedores ON producto.id_proov = proveedores.id_proov
where inventario.costo is null";

       // $condicion = " where ISNULL(producto.costo);";
        //$query = $query . $condicion;

        $resultado = $mysqli->query($query) or die ($mysqli->error);
        $data = $resultado->fetch_all(MYSQLI_ASSOC);
        $numRows = $resultado->num_rows;

//if($numRows ==0){
        if ($numRows) {
            print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

        } else {
            echo $data = 0;
        }

        break;
}

?>



