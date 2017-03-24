<?php 
echo $this->Form->input('Venta.almacene_id', array('empty'=>'--Seleccione--', 'id'=>'Ventaalmacene_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Ventas/listproductos/'.$id)."', 'div-productos', this.value);")); 
?>
<?php 
//echo $this->Form->input('Venta.almacene_id', array('empty'=>'--Seleccione--', 'id'=>'Ventaalmacene_id', 'div'=>false, 'label'=>false, 'class'=>'form-control')); 
?>