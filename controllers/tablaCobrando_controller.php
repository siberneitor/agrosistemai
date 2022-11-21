
<?php
include '../database/conexioni.php';

date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");

$query="select 
		SUM(unidadesInput) as sumaUnidades,
		`codigo`,
		`nombre_producto`as nombreproducto,
		`precioBD` as precioXunidad,        
        (select  SUM(unidadesInput) * `precioBD`) as totalXprod 
from temporal2 
group by `codigo`,
		`nombreproducto`,
		`precioBD`";

$resultado=$mysqli->query($query);

?>

<table id ="tablaCobrando" class="table table-striped" width="100%" >
    <thead style="color: #007bff; font-weight:bold;">
<!--    <td width="200px">codigo</td>-->
<!--    <td width="600px">articulo</td>-->
<!--    <td width="100px">precio</td>-->
<!--    <td width="100px">cantidad</td>-->
<!--    <td width="100px">total</td>-->
<td width="">codigo</td>
<td width="">articulo</td>
<td width="">precio</td>
<td width="">cantidad</td>
<td width="">total</td>
<td width="">Quitar</td>

    </thead>
    <?php
    $numproductos=0;
    $totalUnidadesBD=0;
    while($fila = $resultado->fetch_assoc()){

        $codigo=$fila['codigo'];
        $articulo=$fila['nombreproducto'];
        $precioXunidad=$fila['precioXunidad'];
        $sumaUnidades=$fila['sumaUnidades'];
        $totalXprod=$fila['totalXprod'];

        ?>

        <tbody>
            <td><?php echo $codigo;?></td>
            <td><?php echo $articulo;?></td>
            <td><?php echo $precioXunidad;?></td>
            <td><?php echo $sumaUnidades;?></td>
            <td><?php echo $totalXprod;?></td>
            <td><div class='text-center'><div class='btn-group'><button class='btn btn-danger btn-sm btnQuitar'><i class='material-icons'>delete</i></button></div></div>
            </td>
        </tbody>

        <?php
    }
    ?>

</table>

