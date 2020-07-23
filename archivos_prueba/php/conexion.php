

<?php 
		function conexion(){
			$servidor="localhost";
			$usuario="root";
			$password="root";
			$bd="sistemaventas";

			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

			return $conexion;
		}

 ?>