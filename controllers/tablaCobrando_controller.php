
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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<table id ="tablaCobrando" class="table-hover" >
<thead style="color: red">
	<td width="200px">codigo</td>
	<td width="400px">articulo</td>
	<td width="100px">precio</td>
	<td width="100px">cantidad</td>
	<td width="100px">total</td>

</thead>
<?php
$numproductos=0;
$totalUnidadesBD=0;
//while ($r=mysql_fetch_row($q2)){
//fetch_array(MYSQLI_ASSOC)
//while ($fila = $resultado->fetch_row()) {
//while ($fila = $resultado->fetch_assoc()) {
while($fila = $resultado->fetch_array()){
    //$tipoDato=gettype($fila);
	//$codigo=$fila['campo1'];
	$codigo=$fila[0];
	//$articulo=$fila['campo2'];
	$articulo=$fila[1];
	//$precio=$fila['campo3'];
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




	<tbody>
	  	<!--<td> --><?php// echo $numeroFilas;?><!--</td>-->
        <td><?php echo $codigo;?></td>
        <td><?php echo $articulo;?></td>
		<td><?php echo $precio;?></td>
		<td><?php echo $unidadesInt;?></td>
		<td><?php echo $totalporprod;?></td>
	</tbody>


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
 