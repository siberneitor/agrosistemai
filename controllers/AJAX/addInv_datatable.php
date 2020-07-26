<?php
include '../../database/conexioni.php';

        //var_dump('entra a producto controller');

$opcion = $_POST['opcion'];

switch($opcion){
    case 1:
        $query= "select inventario.codigo,
	 producto.descripcion,
     inventario.unidades,
	 inventario.costo,
	 inventario.precio,
     proveedores.nombre as proveedor,
     inventario.fecha_ingreso,
	 inventario.fecha_caducidad,      
	 (select  if(inventario.estatus = 1, \"activo\", \"inactivo\")) as estatus
     from inventario
	join producto on producto.codigo = inventario.codigo
 join proveedores on producto.id_proov = proveedores.id_proov
";
        $resultado= $mysqli->query($query);
        $data= $resultado -> fetch_all(MYSQLI_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

        break;

    case 2:
        //$query= "select codigo, descripcion,costo,precio,proveedor,fecha_caducidad from producto";
        /*
        $query= "select inventario.codigo,
	 producto.descripcion,
     inventario.unidades,
	 inventario.costo,
	 inventario.precio,
     proveedores.nombre as proveedor,
     inventario.fecha_ingreso,
	 inventario.fecha_caducidad,
	  inventario.estatus		
     from inventario
	join producto on producto.codigo = inventario.codigo
 join proveedores on producto.id_proov = proveedores.id_proov
";
        */


        $query = " select inventario.codigo,
	 producto.descripcion,
     inventario.unidades,
	 inventario.costo,
	 inventario.precio,
     proveedores.nombre as proveedor,
     inventario.fecha_ingreso,
	 inventario.fecha_caducidad,      
	 (select  if(inventario.estatus = 1, \"activo\", \"inactivo\")) as estatus
     from inventario
	join producto on producto.codigo = inventario.codigo
 join proveedores on producto.id_proov = proveedores.id_proov";

        $resultado= $mysqli->query($query);
        $data= $resultado -> fetch_all(MYSQLI_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

        break;
}

?>



