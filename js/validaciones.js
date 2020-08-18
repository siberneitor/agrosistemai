

function validarInputNum ($input){

	validacion = true;
	mensaje="";
	//console.log('principio de funcion, validacion  = true');

	if ($input == '') {

		validacion=false;
		mensaje = 'falta ingresar un dato';
		//console.log('validacion input vacio  = primer false');
	}else if($input == 0){
		validacion=false;
		mensaje = 'el valor ingresado no puede ser cero';
		//console.log('validacion input igual a cero  = segundo false');
	}
//|| /^[1-9]\d$/.test($input)==false
		//verificar que sea numerico
	 else if(isNaN($input)==true ){
		validacion=false;
		mensaje = 'solo se permite ingresar numeros';
		//console.log('validacion no es numero  = tercer false');
	}
	let ARRAY = [validacion,mensaje]
	return ARRAY;
}