<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Ventas'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Ventas'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Edit Venta'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create(null, array('class'=>'form-horizontal',
                                                      'id' => 'VentaAddForm'    )); ?>
					<div class='row'>
							<div class='col-md-12'>
								<?php

echo $this->Form->input('id', array('class'=>'form-horizontal'));
echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Ventaempresa_id">Empresa</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('empresa_id', array('id'=>'Ventaempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Ventaempresasurcusale_id">Sucursal</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('empresasurcusale_id', array('id'=>'Ventaempresasurcusale_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Ventacliente_id">Cliente</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('cliente_id', array('empty'=>'--Seleccione--','empty'=>'--Seleccione--', 'id'=>'Ventacliente_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Ventas/cliente')."', 'div-cliente', this.value);"));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Ventainformacion">Información cliente</label>';
echo'<div class="col-md-9" id="div-cliente">';
echo $this->Form->input('informacion', array('id'=>'Ventainformacion', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'textarea', 'readonly'=>true));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Ventauser_id">Vendedor</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('user_id', array('id'=>'Ventauser_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Ventaalmacentipo_id">Almacen tipo</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('almacentipo_id', array('empty'=>'--Seleccione--','id'=>'Ventaalmacentipo_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Ventas/almacen')."', 'div-almacen', this.value);"));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Ventaalmacene_id">Almacen</label>';
echo'<div class="col-md-9" id="div-almacen">';
echo $this->Form->input('almacene_id', array('id'=>'Ventaalmacene_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Ventatipo">Tipo</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('tipo', array('options'=>array('1'=>'Venta', '2'=>'Cortesia'),  'id'=>'Ventatipo', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Ventafecha">Fecha</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('fecha', array('id'=>'Ventafecha', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Ventatotal">Total</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('total', array('id'=>'Ventatotal', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'readonly'=>true));
echo '</div>';
echo '</div>';
//pr($almacenmarcadetalles);
//pr($almacenproductos);
?>
<div id="div-productos">
<div class="row">
	<div class="col-md-12 col-sm-9 col-xs-12">
	    <div class="box box-solid box-default">
	        <div class="box-header with-border">
	            <h3 class="box-title">Productos</h3>
	            <div class="box-tools pull-right">
	                <button id="newProductoBtn" class="btn btn-box-tool" data-toggle="tooltip" title="Agregar otro producto" data-widget="chat-pane-toggle"><i class="glyphicon glyphicon-plus"></i></button>
	            </div><!-- /.box-tools -->
	        </div><!-- /.box-header -->
	        <div class="box-body">
	            <div id="productos-container">
	                <?php $c = 0; foreach($ventadetalles as $ventadetalle){ ?>
	                <div id="productoscount">
	                    <div class="form-group pro-con" id="producto_<?= $c ?>">
	                        <div class="col-md-2">
	                            <select class="form-control tel-0" id="Productos_<?= $c ?>__Pro" name="data[Venta][Productos][<?= $c ?>][pro]" required="required"  onchange="Javascript:selectTagRemote('<?= $this->Html->url('/Ventas/producto/'.$id1.'/'.$id2.'/'.$c.'') ?>', 'div-embalaje-?= $c ?>', this.value);">
								<option value="">--Producto--</option>
								<?php
								$almacenmarca_id = 0;
		                             foreach($almacenproductos as $almacenproducto){
		                             	if($ventadetalle['Ventadetalle']['almacenproducto_id']==$almacenproducto['Almacenproducto']['id']){
		                             		echo "  '<option value=\"".$almacenproducto['Almacenproducto']['id']."\" selected>".$almacenproducto['Almacenproducto']['nombre']."</option>'+   ";
		                                    $almacenmarca_id = $almacenproducto['Almacenproducto']['almacenmarca_id'];
		                                }else{
		                                	echo "  '<option value=\"".$almacenproducto['Almacenproducto']['id']."\">".$almacenproducto['Almacenproducto']['nombre']."</option>'+   ";
		                                }
		                             }
	                             ?>
								</select>
	                        </div>
	                        <div class="col-md-1">
								<input class="mayorcero form-control pro-0-ext text-box single-line" placeholder="Cantidad" id="Productos_<?= $c ?>__Cantidad" name="data[Venta][Productos][<?= $c ?>][cant]" type="text" value="<?= $ventadetalle['Ventadetalle']['cantidad'] ?>" required="required" onchange="Javascript:total_p(<?= $c ?>);"/>
	                        </div>
	                        <label class="control-label col-md-1">Existencia</label>
	                        <div class="col-md-1">
								<input class="form-control pro-0-ext text-box single-line"  id="Productos_<?= $c ?>__Existencia" name="data[Venta][Productos][<?= $c ?>][exist]" type="text" value="<?= $ventadetalle['Ventadetalle']['existencia'] ?>" required="required" readonly=true />
	                        </div>
	                        <label class="control-label col-md-1">Pre. U.</label>
	                        <div class="col-md-1">
	                            <input class="form-control pro-0-ext text-box single-line"  id="Productos_<?= $c ?>__Precio"   name="data[Venta][Productos][<?= $c ?>][pre]"  type="text" value="<?= $ventadetalle['Ventadetalle']['precio'] ?>" required="required"  readonly=true />
	                        </div>
	                        <div class="col-md-2" id="div-embalaje-<?= $c ?>">
	                        <?php
                                    //pr($almacenmarcadetalles);
	                        ?>
	                            <select class="form-control tel-0" id="Productos_<?= $c ?>__Embalaje" name="data[Venta][Productos][<?= $c ?>][emb]" required="required">
								<option value="">--Embalaje--</option>
								<?php
								foreach($almacenmarcadetalles as $almacenmarcadetalle){
                                    if($almacenmarcadetalle['Almacenmarcadetalle']['almacenmarca_id'] == $almacenmarca_id){
									 	if($ventadetalle['Ventadetalle']['embalaje']==$almacenmarcadetalle['Almacenmateriale']['id']){
									 		echo "  '<option value=\"".$almacenmarcadetalle['Almacenmateriale']['id']."\" selected>".$almacenmarcadetalle['Almacenmateriale']['nombre']."</option>'+   ";
									    }else{
	                                        echo "  '<option value=\"".$almacenmarcadetalle['Almacenmateriale']['id']."\">".$almacenmarcadetalle['Almacenmateriale']['nombre']."</option>'+   ";
									    }
                                    }
								}
								?>
								</select>
	                        </div>
	                        <label class="control-label col-md-1">Total</label>
	                        <div class="col-md-1">
	                            <input class="form-control pro-0-ext text-box single-line" id="Productos_<?= $c ?>__Total" name="data[Venta][Productos][<?= $c ?>][total]"  type="text" value="<?= $ventadetalle['Ventadetalle']['total'] ?>" required="required"  readonly=true />
	                        </div>
	                        <div class="col-md-1">
	                            <button class="btn btn-danger btn-sm" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></button>
	                        </div>
	                    </div>
	                </div>
	                <?php $c++;} ?>
	            </div>
	        </div>
	    </div>
	</div>
	</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#newProductoBtn").click(function (e) {
        var MaxInputs       = 100;
        var x = $("#productos-container #productoscount").length + 1;
        var FieldCount = x-1;
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;
            $("#productos-container").append('<div id="productoscount"><div class="form-group pro-con" id="producto_'+FieldCount+'">'+
			                                        '<div class="col-md-2">'+
			                                            '<select class="form-control tel-'+FieldCount+'" id="Productos_'+FieldCount+'__Pro" name="data[Venta][Productos]['+FieldCount+'][pro]" required="required"  onchange="Javascript:selectTagRemote(\'<?= $this->Html->url('/Ventas/producto/'.$id1.'/'.$id2.'') ?>/'+FieldCount+'\', \'div-embalaje-'+FieldCount+'\', this.value);">'+
														'<option value="">--Producto--</option>'+
														<?php
				            	                             foreach($almacenproductos as $almacenproducto){
				            	                             	echo "  '<option value=\"".$almacenproducto['Almacenproducto']['id']."\">".$almacenproducto['Almacenproducto']['nombre']."</option>'+   ";
				            	                             }
			            	                             ?>
														'</select>'+
			                                        '</div>'+
			                                        '<div class="col-md-1">'+
														'<input class="form-control pro-'+FieldCount+'-ext text-box single-line"  placeholder="Cantidad" id="Productos_'+FieldCount+'__Cantidad" name="data[Venta][Productos]['+FieldCount+'][cant]" required="required"  type="text" value="0" onchange="Javascript:total_p('+FieldCount+');" />'+
			                                        '</div>'+
			                                        '<label class="control-label col-md-1">Existencia</label>'+
			                                        '<div class="col-md-1">'+
			                                            '<input class="form-control producto-mask text-box single-line" id="Productos_'+FieldCount+'__Existencia" name="data[Venta][Productos]['+FieldCount+'][exist]"  required="required"  type="text" value="0" readonly=true />'+
			                                        '</div>'+
			                                        '<label class="control-label col-md-1">Pre. U.</label>'+
			                                        '<div class="col-md-1">'+
			                                            '<input class="form-control producto-mask text-box single-line" id="Productos_'+FieldCount+'__Precio" name="data[Venta][Productos]['+FieldCount+'][pre]"  required="required"  type="text" value="0" readonly=true />'+
			                                        '</div>'+
                                                    '<div class="col-md-2" id="div-embalaje-'+FieldCount+'">'+
							                            '<select class="form-control tel-0" id="Productos_'+FieldCount+'__Embalaje" name="data[Venta][Productos]['+FieldCount+'][emb]">'+
														'<option value="">--Embalaje--</option>'+
														'</select>'+
							                        '</div>'+
			                                        '<label class="control-label col-md-1">Total</label>'+
			                                        '<div class="col-md-1">'+
			                                            '<input class="form-control producto-mask text-box single-line" id="Productos_'+FieldCount+'__Total" name="data[Venta][Productos]['+FieldCount+'][total]"  required="required"  type="text" value="0" readonly=true />'+
			                                        '</div>'+
			                                        '<div class="col-md-1">'+
			                                            '<button class="btn btn-danger btn-sm" onclick="$(\'#producto_'+FieldCount+'\').remove(); total_p('+FieldCount+'); return false;"><span class="glyphicon glyphicon-trash"></span></button>'+
			                                        '</div>'+
			                                    '</div></div>');
            x++; //text box increment
        }
        return false;
    });
});
</script>
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
<?php
echo $this->Html->script('jquery.validate.min.js');
echo $this->Html->script('jquery-validate.bootstrap-tooltip.min.js');
echo $this->Html->script('messages_es.js');
echo $this->Html->script('Adicionales.js');
?>
