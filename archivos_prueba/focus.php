<html>
	<head>
		<script src="jquery-3.2.1.min.js">
	</script>
	</head>
	
	<body>
		<form>
			<input type="text" name="txt1" id="idtxt1">
			<input type="text" name="txt2" id="idtxt2">
			<input type="text" name="txt3" id="idtxt3" autofocus>
			<button>enfocar</button>
		</form>
		
	</body>
	<script>
		$(document).ready(function(){
			alert('esto es javascript');
			$('#idtxt2').val("frijoles");
			//$('#idtxt3').focus();
		})
	</script>
</html>