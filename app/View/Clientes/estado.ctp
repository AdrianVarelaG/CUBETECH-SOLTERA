<?php
echo $this->Form->input('Cliente.direprovincia_id', array('id'=>'Clientedireprovincia_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'empty'=>'--Seleccione--', "onChange"=>"selectTagRemote('".$this->Html->url('/Clientes/municipio/'.$id)."', 'div-municipios', this.value);")); 
?>