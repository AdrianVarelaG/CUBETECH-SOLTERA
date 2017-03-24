<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Almacen marcas'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Almacen marcas'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Edit Almacen marcas'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Almacenmarca', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
<?php

    echo'<div class="form-group">'; 
    echo'<label class="control-label col-md-2" for="Almacenmarcaempresa_id">Empresa</label>';       
    echo'<div class="col-md-9">';           
    echo $this->Form->input('empresa_id', array('id'=>'Almacenmarcaempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));        
    echo '</div>';  
    echo '</div>';

	echo $this->Form->input('id', array('class'=>'form-horizontal'));	
	echo'<div class="form-group">';	
	echo'<label class="control-label col-md-2" for="Almacenmarcanombre">Nombre</label>';		
	echo'<div class="col-md-9">';			
	echo $this->Form->input('nombre', array('id'=>'Almacenmarcanombre', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'onBlur'=>'validar_nombre_almacenmarcas();', 'readonly'=>true));		
	echo '</div>';	
	echo '</div>';
		
	echo'<div class="form-group">';	
	echo'<label class="control-label col-md-2" for="Almacenmarcafechaalta">Fecha alta</label>';		
	echo'<div class="col-md-9">';			
	echo $this->Form->input('fechaalta', array('id'=>'Almacenmarcafechaalta', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
	echo '</div>';	
	echo '</div>';
?>
<div class="row">
<label class="control-label col-md-2" for="Compranum_factura">Materiales</label>
<div class="col-md-9 col-sm-9 col-xs-12">
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Materiales</h3>
            <div class="box-tools pull-right">
                <button id="newMaterialBtn" class="btn btn-box-tool" data-toggle="tooltip" title="Agregar otro Materiales" data-widget="chat-pane-toggle"><i class="glyphicon glyphicon-plus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div id="materiales-container">
            <?php $c = 0;foreach($almacenmarcadetalles as $almacenmarcadetalle){ ?>
                <div id="materialescount">
                    <div class="form-group pro-con" id="producto_<?= $c ?>">
                        <label class="control-label col-md-1">Materiale</label>
                        <div class="col-md-3">
                            <select class="form-control tel-<?= $c ?>" id="Productos_<?= $c ?>__Pro" name="data[Almacenmarca][Materiales][<?= $c ?>][pro]" required="required">
							<option value="">--Seleccione--</option>
							<?php
	                             foreach($marcas as $marca){
	                             	if($almacenmarcadetalle['Almacenmarcadetalle']['almacenmateriale_id']==$marca['Almacenmateriale']['id']){
		                             	echo "  '<option value=\"".$marca['Almacenmateriale']['id']."\" selected>".$marca['Almacenmateriale']['nombre']."</option>'+   ";
		                             }else{
		                             	echo "  '<option value=\"".$marca['Almacenmateriale']['id']."\">".$marca['Almacenmateriale']['nombre']."</option>'+   ";
		                             }
	                             }
                             ?>
							</select>
                        </div>
                        <label class="control-label col-md-1">Cantidad</label>
                        <div class="col-md-2">
							<input class="form-control pro-<?= $c ?>-ext text-box single-line"  id="Productos_<?= $c ?>__Cantidad" name="data[Almacenmarca][Materiales][<?= $c ?>][cant]" type="text"   value="<?= $almacenmarcadetalle['Almacenmarcadetalle']['cantidad'] ?>" required="required" />
							<input class="form-control pro-<?= $c ?>-ext text-box single-line"  id="Productos_<?= $c ?>__value"    name="data[Almacenmarca][Materiales][<?= $c ?>][valu]" type="hidden" value="<?= $c ?>" required="required" />
                        </div>
                        <label class="control-label col-md-1">Default</label>
                        <div class="col-md-2">
                            <?php
                                   if($almacenmarcadetalle['Almacenmarcadetalle']['default']==1){
                                            $checked = 'checked="checked"';
                                   }else{
                                   	        $checked = '';
                                   }
                            ?>
                            <input class=""  id="Productos_<?= $c ?>__Default"  <?= $checked ?> name="data[Almacenmarca][Materiales][0][pre]"  type="radio" value="<?= $c ?>" />
                        </div>
                        <div class="col-md-1">
                            <?php if($c==0){ ?>
                                            <button class="btn btn-danger btn-sm" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></button>
                            <?php }else{ ?>
                                            <button class="btn btn-danger btn-sm" onclick="$('#producto_<?= $c ?>').remove(); return false;"><span class="glyphicon glyphicon-trash"></span></button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php $c++;} ?>
            </div>
        </div>
    </div>
</div>
</div>	
							</div>
							<div class="col-md-12">
								<div class="form-group">
	                                <div class="col-md-12">
	                                    <?php echo $this->Html->link(__('Volver'), array('action' => 'index')); ?>	                                    <input value="Guardar" class="btn btn-primary pull-right" type="submit">
	                                </div>
	                            </div>
                            </div>
					</div></form>                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<?php /* ?>	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Almacenmarca.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Almacenmarca.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List Almacenmarcas'), array('action' => 'index')); ?></li>
			</ul>
	</div>
<?php */ ?>
<script type="text/javascript">
$(document).ready(function() {
    $("#newMaterialBtn").click(function (e) {
        var MaxInputs       = 100;
        var x = $("#materiales-container #materialescount").length + 1;
        var FieldCount = x-1;
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;
            $("#materiales-container").append('<div id="materialescount"><div class="form-group pro-con" id="producto_'+FieldCount+'">'+
			                                        '<label class="control-label col-md-1">Materiale</label>'+
			                                        '<div class="col-md-3">'+
			                                            '<select class="form-control tel-'+FieldCount+'" id="Productos_'+FieldCount+'__Pro" name="data[Almacenmarca][Materiales]['+FieldCount+'][pro]" required="required">'+
														'<option value="">--Seleccione--</option>'+
														<?php
				            	                             foreach($marcas as $marca){
				            	                             	echo "  '<option value=\"".$marca['Almacenmateriale']['id']."\">".$marca['Almacenmateriale']['nombre']."</option>'+   ";
				            	                             }
			            	                            ?>
														'</select>'+
			                                        '</div>'+
			                                        '<label class="control-label col-md-1">Cantidad</label>'+
			                                        '<div class="col-md-2">'+
														'<input class="form-control pro-'+FieldCount+'-ext text-box single-line"  id="Productos_'+FieldCount+'__Cantidad" name="data[Almacenmarca][Materiales]['+FieldCount+'][cant]" required="required"  type="text" value="0" />'+
			                                        '</div>'+
			                                        '<label class="control-label col-md-1">Default</label>'+
			                                        '<div class="col-md-2">'+
			                                            '<input class=""  id="Productos_'+FieldCount+'__Default"  name="data[Almacenmarca][Materiales][0][pre]"  type="radio" value="'+FieldCount+'" />'+
			                                            '<input class=""  id="Productos_'+FieldCount+'__Value"    name="data[Almacenmarca][Materiales]['+FieldCount+'][valu]" type="hidden" value="'+FieldCount+'"  />'+
			                                        '</div>'+
			                                        '<div class="col-md-1">'+
			                                            '<button class="btn btn-danger btn-sm" onclick="$(\'#producto_'+FieldCount+'\').remove();  return false;"><span class="glyphicon glyphicon-trash"></span></button>'+
			                                        '</div>'+
			                                    '</div></div>');
            x++; //text box increment
        }
        return false;
    });
});
</script>