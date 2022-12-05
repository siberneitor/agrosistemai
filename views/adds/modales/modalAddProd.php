<!--Modal para CRUD-->
<?php
//include '../../../controllers/AJAX/valoresSelect.php';
//include '/agrosistemai/controllers/AJAX/valoresSelect.php';
include($_SERVER['DOCUMENT_ROOT']."/agrosistemai/controllers/AJAX/valoresSelect.php");
//include '../adds/modales/modalAddMarca.php';
include '../../controllers/AJAX/valoresSelect.php';

?>

<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formUsuarios">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="codigo" class="col-form-label">Codigo:</label>
                                <input type="text" class="form-control" id="codigo" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="descripcion" class="col-form-label">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">

                            <label for="marca" class="col-form-label">Marca:</label>

                            <select class="form-control input-sm" id="marca" name="marca">
                                <?php
                                while ($fila = $resultMarca->fetch_assoc()){
                                    $idCateg= $fila["id_marca"];
                                    $descCateg= $fila["nombre_marca"];
                                    echo '<option value="'.$idCateg.'">'.$descCateg.'</option>';
                                }
                                ?>
                            </select>

                            <input type = "text" id ="idMarca"  hidden>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="categoria" class="col-form-label">Categoria</label>
                                <input type="text" class="form-control" id="categoria">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="proveedor" class="col-form-label">proveedor:</label>
<!--                                <input type="text" class="form-control" id="proveedor">-->
                                <select class="form-control input-sm" id="proveedor" name="proveedor">
                                    <?php
                                    while ($fila = $result->fetch_assoc()){
                                        $idProv= $fila["id_proov"];
                                        $descProv= $fila["nombre"];
                                        echo '<option value="'.$idProv.'">'.$descProv.'</option>';
                                    }
                                    ?>
                                </select>

                                <input type = "text" id ="idProov"  hidden>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fecha_caducidad" class="col-form-label">fecha_cad</label>
                                <input type="date" class="form-control" id="fecha_caducidad" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="costo" class="col-form-label">Costo</label>
                                    <input type="text" class="form-control" id="costo" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="precio" class="col-form-label">Precio</label>
                                    <input type="text" class="form-control" id="precio" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="unidades" class="col-form-label">Unidades Actuales:</label>
                                <input type="text" class="form-control" id="unidades" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="unidNew" class="col-form-label">Unidades Nuevas:</label>
                                <input type="text" class="form-control" id="unidNew" value = 0>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

