<?php

include '../../controllers/variables.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
    <script src="/js/balance.js"></script>
</head>
<body>
<div class ="content">
<p></p>
    <form class ="form-inline">
        <label class = "text-secondary"><h5>rango de fechas: </h5></label>

        <div class ="col-3">
            <label for ="fInicioBalance" class ="form-check-label">fecha inicial</label>
            <div class ="form-control">
            <input type = "date"  id ="fInicioBalance" class ="form-control"  value="<?php echo $fechaActual ?>">
            </div>
        </div>
        <div class ="col-3">
            <label for ="fFInalBalance" class = "form-check-label">fecha final</label>
            <div class ="form-control">
            <input type = "date"  id ="fFInalBalance" class ="form-control"  value="<?php echo $fechaActual ?>">
                </div>
        </div>
        <div class ="col-3">


                <button class ="btn btn-outline-success" id ="btnBuscarBalance" >fitrar</button>

        </div>


</form>

<hr>
<div id ="divBalance"></div>


</body>
</div>
</html>