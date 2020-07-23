<?php
	//include 'conexion.php';
	 include '../database/conexioni.php';
	//echo'si llega a buscacod_controller';

	$rcod=$_POST['codigo'];
	$unidades = $_POST['Unidades'];



	//print_r($a.'<p>'.$b.'<p>'.$c);
	//echo $a.'<p>'.$b.'<p>'.$c;
	 //$qselect=mysql_query("select *from producto where codigo='$rcod'")or die(mysql_error());
    $seleccionarCodigo=	"select *from producto where codigo='$rcod'";
	$qselect=$mysqli->query($seleccionarCodigo);

	 //var_dump($qselect);
	 
	 //verifico si se ingreso un dato en la caja de texto "codigo"
	 //$numcols=mysql_num_rows($qselect);
	 $numcols=$qselect->num_rows;

	 //var_dump('el resultado es'.$numcols.'y aqui termina el resultado');

	 if ($numcols==0){
	// if ($qselect==0){

		 //var_dump('entra al IF');
	}else{

	 //$rq=mysql_fetch_row($qselect);
	 $rq=$qselect->fetch_row();

 
	 $primer=$rq[1];	 
	 $segun=$rq[2];	 
	 $tercer=$rq[4];

	 $precioXunidades = $tercer * $unidades;
	 
	//echo $primer.'/'.$segun.'/'.$tercer.'/'.$numcols;
	echo $primer.'/'.$segun.'/'.$tercer.'/'.$unidades,'/'.$precioXunidades;



	//$rrr=mysql_query("insert into temporal values ('$primer','$segun','$tercer')")or die(mysql_error());
	$rrr=$mysqli->query("insert into temporal values (NULL,'$primer','$segun','$tercer','$unidades')");




		// var_dump('pasas2');
	//$q2=mysql_query("select distinct *from producto")or die(mysql_error());
		 $q2=$mysqli->query("select distinct *from producto");
	
	}

?>
