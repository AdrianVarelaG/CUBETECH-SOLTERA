<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Almacen productos'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Almacen productos'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Edit Almacen productos'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Almacenproducto', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
								<?php
			
echo $this->Form->input('id', array('class'=>'form-horizontal'));	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenproductoempresa_id">Empresa</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresa_id', array('id'=>'Almacenproductoempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenproductonombre">Nombre</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('nombre', array('id'=>'Almacenproductonombre', 'div'=>false, 'label'=>false, 'readonly'=>true, 'class'=>'form-control', 'onBlur'=>'validar_nombre_almacenproductos();'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenproductodescripcion">Descripción</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('descripcion', array('id'=>'Almacenproductodescripcion', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenproductoalmacenmarca_id">Marca</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('almacenmarca_id', array('empty'=>'--Seleccione--', 'id'=>'Almacenproductoalmacenmarca_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenproductofechaalta">Fecha alta</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('fechaalta', array('id'=>'Almacenproductofechaalta', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenproductoprecio">Precio</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('precio', array('id'=>'Almacenproductoprecio', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
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
            <?php $c = 0;foreach($almacenproductodetalles as $almacenproductodetalle){ ?>
                <div id="materialescount">
                    <div class="form-group pro-con" id="producto_<?= $c ?>">
                        <label class="control-label col-md-1">Materiale</label>
                        <div class="col-md-3">
                            <select class="form-control tel-<?= $c ?>" id="Productos_<?= $c ?>__Pro" name="data[Almacenmarca][Materiales][<?= $c ?>][pro]" required="required">
							<option value="">--Seleccione--</option>
							<?php
	                             foreach($almacenmateriales as $marca){
	                             	if($almacenproductodetalle['Almacenproductodetalle']['almacenmateriale_id']==$marca['Almacenmateriale']['id']){
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
							<input class="form-control pro-<?= $c ?>-ext text-box single-line"  onKeyPress="return solonumeros_con_punto(event);"  id="Productos_<?= $c ?>__Cantidad" name="data[Almacenmarca][Materiales][<?= $c ?>][cant]" type="text"   value="<?= $almacenproductodetalle['Almacenproductodetalle']['cantidad'] ?>" required="required" />
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-danger btn-sm" onclick=" $('#producto_<?= $c ?>').remove();return false;"><span class="glyphicon glyphicon-trash"></span></button>
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
				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Almacenproducto.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Almacenproducto.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List Almacenproductos'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenmarcas'), array('controller' => 'almacenmarcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenmarca'), array('controller' => 'almacenmarcas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenproductodetalles'), array('controller' => 'almacenproductodetalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenproductodetalle'), array('controller' => 'almacenproductodetalles', 'action' => 'add')); ?> </li>
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
				            	                             foreach($almacenmateriales as $marca){
				            	                             	echo "  '<option value=\"".$marca['Almacenmateriale']['id']."\">".$marca['Almacenmateriale']['nombre']."</option>'+   ";
				            	                             }
			            	                            ?>
														'</select>'+
			                                        '</div>'+
			                                        '<label class="control-label col-md-1">Cantidad</label>'+
			                                        '<div class="col-md-2">'+
														'<input class="form-control pro-'+FieldCount+'-ext text-box single-line"  onKeyPress="return solonumeros_con_punto(event);"  id="Productos_'+FieldCount+'__Cantidad" name="data[Almacenmarca][Materiales]['+FieldCount+'][cant]" required="required"  type="text" value="0" />'+
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