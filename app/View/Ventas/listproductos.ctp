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
	                <div id="productoscount">
	                    <div class="form-group pro-con" id="producto_0">
	                        <div class="col-md-2">
	                            <select class="form-control tel-0" id="Productos_0__Pro" name="data[Venta][Productos][0][pro]" required="required"  onchange="Javascript:selectTagRemote('<?= $this->Html->url('/Ventas/producto/'.$id1.'/'.$id2.'/0') ?>', 'div-embalaje-0', this.value);">
								<option value="">--Producto--</option>
								<?php

		                             foreach($almacenproductos as $almacenproducto){
		                             	echo "  '<option value=\"".$almacenproducto['Almacenproducto']['id']."\">".$almacenproducto['Almacenproducto']['nombre']."</option>'+   ";
		                             }
	                             ?>
								</select>
	                        </div>
	                        <div class="col-md-1">
								<input class="mayorcero form-control pro-0-ext text-box single-line" placeholder="Cantidad" id="Productos_0__Cantidad" name="data[Venta][Productos][0][cant]" type="text" value="0"  onchange="Javascript:total_p(0);"/>
								<span></span>
	                        </div>
	                        <label class="control-label col-md-1">Existencia</label>
	                        <div class="col-md-1">
								<input class="form-control pro-0-ext text-box single-line"  id="Productos_0__Existencia" name="data[Venta][Productos][0][exist]" type="text" value="0" required="required" readonly=true />
	                        </div>
	                        <label class="control-label col-md-1">Pre. U.</label>
	                        <div class="col-md-1">
	                            <input class="form-control pro-0-ext text-box single-line"  id="Productos_0__Precio"   name="data[Venta][Productos][0][pre]"  type="text" value="0" required="required"  readonly=true />
	                        </div>
	                        <div class="col-md-2" id="div-embalaje-0">
	                            <select class="form-control tel-0" id="Productos_0__Embalaje" name="data[Venta][Productos][0][emb]" >
								<option value="">--Embalaje--</option>
								</select>
	                        </div>
	                        <label class="control-label col-md-1">Total</label>
	                        <div class="col-md-1">
	                            <input class="form-control pro-0-ext text-box single-line" id="Productos_0__Total" name="data[Venta][Productos][0][total]"  type="text" value="0" required="required"  readonly=true />
	                        </div>
	                        <div class="col-md-1">
	                            <button class="btn btn-danger btn-sm" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></button>
	                        </div>
	                    </div>
	                </div>
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
														'<input class="mayorcero form-control pro-'+FieldCount+'-ext text-box single-line"  placeholder="Cantidad" id="Productos_'+FieldCount+'__Cantidad" name="data[Venta][Productos]['+FieldCount+'][cant]" required="required"  type="text" value="0" onchange="Javascript:total_p('+FieldCount+');" />'+
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
