<select class="form-control tel-0" id="Productos_<?= $num ?>__Embalaje" name="data[Venta][Productos][<?= $num ?>][emb]" required="required">
<?php
 foreach($almacenmarcadetalles as $almacenmarcadetalle){
 	echo "  '<option value=\"".$almacenmarcadetalle['Almacenmateriale']['id']."\">".$almacenmarcadetalle['Almacenmateriale']['nombre']."</option>'+   ";
 }
?>
<option value="">--Embalaje--</option>
</select>
<script type="text/javascript">
	$('#Productos_<?= $num ?>__Precio').val('<?= $precio ?>');
	$('#Productos_<?= $num ?>__Existencia').val('<?= $existencia ?>');
</script>
