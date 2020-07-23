<?php
	include 'conexion.php';
	date_default_timezone_set('UTC');
	date_default_timezone_set("America/Mexico_City");

	//variables *total* , *cambio* y *numero de cliente*
	$varcobro=$_POST['cobro'];
	$varcambio=$_POST['cambiot'];
	$varnumcliente=$_POST['numcli'];
		
	//selecciona los registros que son distintos en la tabla temporal 
	$rrr=mysql_query("select distinct *from temporal")or die(mysql_error());

	$numproductos=0;

	//--------------------------------------------------------------
	$FECHA = date("j-m-Y");
	$HORA=date("H:i:s");
	$HORA2=date("H-i-s");
	//-------------------------------------------------------------
		
	//comienza a escribirse los datos de la tienda

	//se asigna el nombre del archivo .txt
	$file = fopen("files/".$HORA2.".txt", "w");

	fwrite($file, "agroinsumos llano grande" . PHP_EOL);
	fwrite($file, "20 de noviembre #23 colonia centro" . PHP_EOL);
	fwrite($file, "huitzuco guerreo" . PHP_EOL);
	fwrite($file, "tel: 7271028618" . PHP_EOL);
	fwrite($file, "NO. ticket :" . PHP_EOL);
	fwrite($file, "no. cliente:".$varnumcliente. PHP_EOL);
	fwrite($file, $FECHA."   ".$HORA. PHP_EOL);
	fwrite($file, "" . PHP_EOL);
	fwrite($file, "cantidad"."      "."codigo"."       "."articulo"."         "."precio"."    "."total".PHP_EOL);
	fclose($file);

	//selecciona los datos de cada columna de la tabla temporal en cada vuelta
	while($r=mysql_fetch_row($rrr)){
		$uno=$r[0];
		$dos=$r[1];
		$tres=$r[2];
		
		//selecciona el codigo de producto que sea igual al codigo ingresado en el txtcodigo
		$q4=mysql_query("select campo1 from temporal where campo1='$uno'")or die(mysql_error());
		
		//cuenta el numero de filas que tengan el codigo buscado en el query anterior
		$num3=mysql_num_rows($q4);

		//suma campo 2 para obtener total de venta
		$RR=mysql_query("SELECT SUM(campo3) as total from temporal")or die(mysql_error());
		
		//query para mostrar la busqueda hecha en el query anterior			
		$row = mysql_fetch_array($RR, MYSQL_ASSOC);
		$totaltotal= $row["total"];
					
		//se va sumando el numero de productos cada ves que se ingresa un nuevo codigo
		$numproductos = $numproductos + $num3;

		//se multiplica el costo del producto por el numero de productos con el mismo codigo que hay en la tabla temporal
		$totalporprod= $tres * $num3;

?>        

        <!-- se comienza a crear la tabla -->
		<td><?php echo $uno;?></td>
		<td><?php echo $dos;?></td>
		<td><?php echo $tres;?></td>
		<td><?php echo $num3;?></td>
		<td><?php echo $totalporprod;?></td>
			
		
		<p>
		
	
<?php

		//se escriben los datos de la tabla temporal en el txt
		$file = fopen("files/".$HORA2.".txt", "a");
		fwrite($file,''.$num3 .'         '. $uno.'      '.$dos.'            '.$tres.'        '.$totalporprod. PHP_EOL);
	}

	//se escriben los datos del pago de la compra en el txt
	fwrite($file,"". PHP_EOL);
	fwrite($file,"                  TOTAL :"."        ".$totaltotal. PHP_EOL);
	fwrite($file,"efectivo :".$varcobro. PHP_EOL);
	fwrite($file,"Cambio :".$varcambio. PHP_EOL);
	fwrite($file,"Cantidad de productos :".$numproductos.$first. PHP_EOL);
	fwrite($file,$first2. PHP_EOL);
	fclose($file);
	
	echo'<p>';

	//se meustra el tota lde productos
	echo $numproductos; 

?>