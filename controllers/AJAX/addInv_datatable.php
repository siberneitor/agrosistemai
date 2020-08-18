<?php
include '../../database/conexioni.php';

//var_dump('entra a AJAX DATATABLE');

$opcion = $_POST['opcion'];

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

switch($opcion){
    case 1:
        $condicion = "";
        $query =$query.$condicion;

        $resultado= $mysqli->query($query);
        $data= $resultado -> fetch_all(MYSQLI_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

        break;

    case 2:



        $condicion = " where inventario.unidades < 4 and inventario.estatus = 1";
        $query =$query.$condicion;

        $resultado= $mysqli->query($query);
        $data= $resultado -> fetch_all(MYSQLI_ASSOC);
        $numRows = $resultado->num_rows;

        //if($numRows ==0){
        if($numRows){
            print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

        }else {
            echo  $data =0;
        }







        break;
}

?>



