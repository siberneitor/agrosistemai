<?php
include 'conexion.php';

	$first=$_POST['variable'];
	$first2=$_POST['perro'];

	

	//print_r($a.'<p>'.$b.'<p>'.$c);
	//echo $a.'<p>'.$b.'<p>'.$c;




	$rrr=mysql_query("select distinct *from temporal")or die(mysql_error());

	$numproductos=0;
	
	while($r=mysql_fetch_row($rrr)){
		

$uno=$r[0];
	$dos=$r[1];
	$tres=$r[2];
	/*
	if($uno==$a){
		//echo 'si es igual a 4';
		$d=$num2;
	}else{
		*/
		$q4=mysql_query("select campo1 from temporal where campo1='$uno'")or die(mysql_error());
			$num3=mysql_num_rows($q4);
				//$d=$num3;

?>
	<td><?php echo $uno;?></td>

		<td><?php echo $dos;?></td>
		
		<td><?php echo $tres;?></td>
		
		<td><?php echo $num3;?></td>
		<td><?php $numproductos = $numproductos + $num3;
	//echo $numproductos;?></td>
		
		?>
		<p>
		

		
		 ?>
<?php



//------------------------------------------------------------------------------------
$FECHA = date("Y-m-j");
 $HORA=date("H:i:s");
 //$nombrearchivo=$FECHA.$HORA;
//$id=0;
//$id=$id+$numproductos;

	$file = fopen("files/25.txt", "a");

fwrite($file, $uno .'|'. $dos.'|'.$tres.'|'.$num3.'|'. PHP_EOL);

//-----------------------------------------------------------------------------------



	}

fwrite($file, $FECHA."|".$HORA. PHP_EOL);
fwrite($file,$numproductos.'|'.$first. PHP_EOL);
fwrite($file,$first2. PHP_EOL);


fclose($file);
/*
	$rrr2=mysql_query("delete from temporal")or die(mysql_error());
	 echo $rrr2;
*/
//$m2=$m3+$dos;
	



echo'<p>';
echo $numproductos; 


?>