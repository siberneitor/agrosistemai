<?php 
	require_once "../php/conexion.php";
	$conexion=conexion();
	
	

	$sql="SELECT * from producto"; 
						
				$result=mysqli_query($conexion,$sql);

 ?>
<br><br>

	
	
		<label>Buscador</label>
		<select id="buscadorvivo" class="form-control col-xs-8" autofocus>
			
			<?php
				while($ver=mysqli_fetch_row($result)): 
			 ?>
				<option value="<?php echo $ver[1] ?>">
					<?php echo $ver[1]." ".$ver[2] ?>
				</option>

			<?php endwhile; ?>

		</select>
	



	<script type="text/javascript">
		$(document).ready(function(){
			//$('#buscadorvivo').focus();
			$('#buscadorvivo').select2();

			
			//$('#buscadorvivo').click();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'php/crearsession.php',
					success:function(r){
						
						//alert ('has seleccionado'+r);
						$(document).load('../agro/funcionesJSpropias.js');
						buscarcod(r);
						$('#btnclose').click();

					}
				});
			});
			
		});
	</script>