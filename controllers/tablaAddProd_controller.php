<?php
//include 'conexion.php';
include 'conexioni.php';


//$qselect=mysql_query("select *from producto")or die(mysql_error());
$qselect="select *from producto ORDER BY id_producto desc";
//$query = "SELECT * from tabla1";
$resultado=$mysqli->query($qselect);

?>
<table border="1" class="table" >
	  <thead>
    <tr>
    	
      <th scope="col">codigo</th>
      <th scope="col">articulo</th>
      <th scope="col">costo</th>
      <th scope="col">precio</th>
      <th scope="col">proveedor</th>
      <th scope="col">caducidad</th>
    </tr>
  </thead>

<?php
//while($rselect=mysql_fetch_row($qselect)){
while($rselect=$resultado->fetch_assoc()){
?>
	 
	<tr>		
	<td><?php echo $rselect["codigo"]; ?></td>
	<td><?php echo $rselect["descripcion"]; ?></td>
	<td><?php echo $rselect["costo"]; ?></td>
	<td><?php echo $rselect["precio"]; ?></td>
	<td><?php echo $rselect["proveedor"]; ?></td>
	<td><?php echo $rselect["fecha_caducidad"]; ?></td>
</tr>
 

<?php
}
$resultado->free();
?>
</table>
