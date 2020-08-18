-- actualizacion producto
update producto 
set 
 descripcion ="producto5",
 costo=50,
 precio=60,
 fecha_caducidad='2020-12-11' where codigo = 5;

 -- "UPDATE usuarios SET username='$username', first_name='$first_name', last_name='$last_name', gender='$gender', password='$password', status='$status' WHERE user_id='$user_id' ";	
 
 -- actualiza clientes
  update cliente 
set 
 nombre ='nombrealgo',
 apellido_paterno='$ap_pat_cli',
 apellido_materno='$ap_mat_cli',
 domicilio='$domicilio_cli',
  localidad = '$localid_cli',
  telefono = 3456456,
  email = '$email_cli',
  credito_actual=NULL,
  estatus_credito_actual = NULL
 where id_cliente= 1;
 
 -- agregar columna
 alter table inventario add fecha_caducidad date after fecha_ingreso; 
 
 -- crear tabla con llaves
 create table historial_inventario (
	id_update bigint auto_increment,
    codigo bigint,
    new_unidades bigint,
    new_costo decimal(9,2),
    new_precio decimal(9,2),
    new_fecha_cad date,
    fecha_ingreso date,
    new_id_gasto bigint,
    primary key(id_update),
    index(codigo), foreign key(codigo) references inventario(codigo)        
 );
 
-- IF mysql 
select  if(inventario.estatus = 1, "activo", "inactivo") as estatusConvertido
from inventario;
 
 -- select dentro de select dentro del where
 select unidades
 as unidades_suficientes 
 from inventario
 where (select unidades from inventario where codigo =3 ) >= 10 and codigo =3;

-- resta de datos 1
select unidades - 10 as unidades_restadas from inventario where codigo =3;

-- resta de datos 2
select sum(order1) - sum(returned_items_total) from orders where customer_id=111;

-- mostrar el registro mas grande de una columna
select MAX(id_venta) as id_venta from ventas;

-- suma de datos
select SUM(unidadesInput) as unidadesXcod from temporal2 where codigo = 5;

-- consula para mostrar lista de articulos que se van cobrando
select 
		SUM(unidadesInput) as sumaUnidades,
		`codigo`,
		`nombre_producto`as nombreproducto,
		`precioBD` as precioXunidad,        
        (select  SUM(unidadesInput) * `precioBD`) as totalXprod 
from temporal2 
group by `codigo`,
		`nombreproducto`,
		`precioBD`;

     
 