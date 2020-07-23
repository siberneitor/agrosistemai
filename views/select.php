<!--Modal para CRUD-->
<?php
include 'header.html';
?>

<label id ="idlabel"></label>



<select class="form-control input-sm" id="selectPrueba" name="selectPrueba">





</select>
<script>
    $(document).ready(function(){
        alert('frijoles ');
        $(' #idlabel').text('perrito');

        $('#selectPrueba').prepend("<option value='1' >Josh_reder</option>");
    })
</script>