
<?php

//include 'conexion.php';
include '../database/conexioni.php';

date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");


//$q2=mysql_query("select distinct *from temporal")or die(mysql_error());
//$query="select distinct *from temporal";

$query="select `campo1`,`campo2`,`campo3` from temporal group by `campo1`,`campo2`,`campo3` desc";

$resultado=$mysqli->query($query);

//$q3=mysql_query("select *from tabla1 where campo1=$a")or die(mysql_error());
//$q4=mysql_query("select campo1 from tabla1")or die(mysql_error());
//$num=mysql_num_rows($q1);
//$num2=mysql_num_rows($q3);
//$numeroFilas=mysql_num_rows($q4);

?>

<table border="1" class="table-hover">
<tr>
	<td>cantidad</td>
	<td>codigo</td>
	<td>articulo</td>
	<td>precio</td>
	<td>total</td>

</tr>
<?php
$numproductos=0;
$totalUnidadesBD=0;
//while ($r=mysql_fetch_row($q2)){
while ($fila = $resultado->fetch_row()) {
	$codigo=$fila[0];
	$articulo=$fila[1];
	$precio=$fila[2];
	//$unidades=$fila[4];
   // var_dump($codigo);

	/*
	if($codigo==$a){
		//echo 'si es igual a 4';
		$d=$num2;
	}else{
		*/
		//$q4=mysql_query("select campo1 from temporal where campo1='$codigo'")or die(mysql_error());
        $query2="select campo1 from temporal where campo1='$codigo'";
        $resultado2=$mysqli->query($query2);

        //contar numero de unidades por cada codigo
    $UNIDADES='';
     $query3="select SUM(unidades) as UNIDADES from temporal where campo1 =$codigo";

     $resultado3=$mysqli->query($query3);
     $asociarColumna =$resultado3->fetch_assoc();
    $resultadoUnidades = $asociarColumna['UNIDADES'];
    $unidadesInt=(int)$resultadoUnidades;
    //var_dump($unidadesInt);

    //$totalUnidadesBD = $totalUnidadesBD + $unidadesBD;



        //$numeroFilas=mysql_num_rows($q4);
        $numeroFilas=$resultado2->num_rows;

				//$d=$numeroFilas;

			 //$numproductos = $numproductos + $numeroFilas;
			 $numproductos = $numproductos + $unidadesInt;
			 //$totalporprod= $precio * $numeroFilas;
			 $totalporprod= $precio * $unidadesInt;
	?>




	<tr>
	  	<!--<td> --><?php// echo $numeroFilas;?><!--</td>-->
        <td><?php echo $unidadesInt;?></td>
        <td><?php echo $codigo;?></td>
		<td><?php echo $articulo;?></td>
		<td><?php echo $precio;?></td>
		<td><?php echo $totalporprod;?></td>
	</tr>


	<!--
	echo $codigo.'&nbsp;'.'&nbsp;'.'&nbsp;'.$r[1].'&nbsp;'.'&nbsp;'.'&nbsp;'.$r[2].'&nbsp;'.'&nbsp;'.'&nbsp;'.$numeroFilas.'<br>';
	-->

	<?php
	
		}
	
	?>

	</table>

<?php 
//echo 'total articulos'.' '.$numproductos;


?>
 