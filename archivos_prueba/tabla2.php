<?php
include 'conexion.php';

$q2=mysql_query("select distinct *from temporal")or die(mysql_error());
//$q3=mysql_query("select *from tabla1 where campo1=$a")or die(mysql_error());
//$q4=mysql_query("select campo1 from tabla1")or die(mysql_error());
//$num=mysql_num_rows($q1);
//$num2=mysql_num_rows($q3);
//$num3=mysql_num_rows($q4);
while ($r=mysql_fetch_row($q2)){
	//$d=0;

	$uno=$r[0];
	/*
	if($uno==$a){
		//echo 'si es igual a 4';
		$d=$num2;
	}else{
		*/
		$q4=mysql_query("select campo1 from temporal where campo1='$uno'")or die(mysql_error());
			$num3=mysql_num_rows($q4);
				//$d=$num3;

	

	

	//echo $uno.'&nbsp;'.'&nbsp;'.'&nbsp;'.$a.'<br>';
	echo $uno.'&nbsp;'.'&nbsp;'.'&nbsp;'.$r[1].'&nbsp;'.'&nbsp;'.'&nbsp;'.$r[2].'&nbsp;'.'&nbsp;'.'&nbsp;'.$num3.'<br>';
	

}


?> 
 