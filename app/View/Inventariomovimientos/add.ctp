<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Inventario movimientos'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Inventario movimientos'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Add Inventario movimientos'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Inventariomovimiento', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
								<?php
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimientoempresa_id">Empresa</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresa_id', array('id'=>'Inventariomovimientoempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimientoempresasurcusale_id">Sucursal</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresasurcusale_id', array('id'=>'Inventariomovimientoempresasurcusale_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimientoalmacentipo_id">Almacen tipo</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('almacentipo_id', array('empty'=>'--Seleccione--','id'=>'Inventariomovimientoalmacentipo_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Inventariomovimientos/almacen')."', 'div-almacen', this.value);"));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimientoalmacene_id">Almacen</label>';		
echo'<div class="col-md-9" id="div-almacen">';			
echo $this->Form->input('almacene_id', array('id'=>'Inventariomovimientoalmacene_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimientoalmacenproducto_id">Producto</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('almacenproducto_id', array('empty'=>'--Seleccione--','id'=>'Inventariomovimientoalmacenproducto_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
$empresa_id          = $this->Session->read('empresa_id'); 			 
$empresasurcusale_id = $this->Session->read('empresasurcusale_id'); 			 
$rol_id              = $this->Session->read('ROL'); 			 
$user_id             = $this->Session->read('USUARIO_ID');
      if($rol_id==3){
			echo'<div class="form-group">';	
			echo'<label class="control-label col-md-2" for="Inventariomovimientotipo">Tipo</label>';		
			echo'<div class="col-md-9">';			
			echo $this->Form->input('tipo', array('options'=>array('1'=>'ENTRADA', '2'=>'SALIDA', '3'=>'TRANSFERENCIA'), 'id'=>'Inventariomovimientotipo', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"activar_almacenfuente();"));		
			echo '</div>';	
			echo '</div>';
}else if($rol_id==5){
			echo'<div class="form-group">';	
			echo'<label class="control-label col-md-2" for="Inventariomovimientotipo">Tipo</label>';		
			echo'<div class="col-md-9">';			
			echo $this->Form->input('tipo', array('options'=>array('1'=>'ENTRADA', '2'=>'SALIDA', '3'=>'TRANSFERENCIA'), 'id'=>'Inventariomovimientotipo', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"activar_almacenfuente();"));		
			echo '</div>';	
			echo '</div>';

}else if($rol_id==4){
			echo'<div class="form-group">';	
			echo'<label class="control-label col-md-2" for="Inventariomovimientotipo">Tipo</label>';		
			echo'<div class="col-md-9">';			
			echo $this->Form->input('tipo', array('options'=>array('1'=>'ENTRADA', '2'=>'SALIDA', '3'=>'TRANSFERENCIA'), 'id'=>'Inventariomovimientotipo', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"activar_almacenfuente();"));		
			echo '</div>';	
			echo '</div>';

}else{
			echo'<div class="form-group">';	
			echo'<label class="control-label col-md-2" for="Inventariomovimientotipo">Tipo</label>';		
			echo'<div class="col-md-9">';			
			echo $this->Form->input('tipo', array('options'=>array('1'=>'ENTRADA'), 'id'=>'Inventariomovimientotipo', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
			echo '</div>';	
			echo '</div>';
}
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimientocantidad">Cantidad</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('cantidad', array('id'=>'Inventariomovimientocantidad', 'div'=>false, 'label'=>false, 'class'=>'form-control' , 'type'=>'numbersinpunto'));		
echo '</div>';	
echo '</div>';



echo'<div id="tipo_fuente" style="display:none;">';		
	echo'<div class="form-group">';	
	echo'<label class="control-label col-md-2" for="Inventariomovimientoalmacentipofunte_id">Almacen tipo destino</label>';		
	echo'<div class="col-md-9">';			
	echo $this->Form->input('almacentipofunte_id', array('empty'=>'--Seleccione--','id'=>'Inventariomovimientoalmacentipofunte_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Inventariomovimientos/almacenfuente')."', 'div-almacenfuente', this.value);"));		
	echo '</div>';	
	echo '</div>';
	echo'<div class="form-group">';	
	echo'<label class="control-label col-md-2" for="Inventariomovimientoalmacenefunte_id">Almacen destino</label>';		
	echo'<div class="col-md-9" id="div-almacenfuente">';			
	echo $this->Form->input('almacenefunte_id', array('empty'=>'--Seleccione--','id'=>'Inventariomovimientoalmacenefunte_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
	echo '</div>';	
	echo '</div>';
echo '</div>';	

	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimientofechaalta">Fecha alta</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('fechaalta', array('id'=>'Inventariomovimientofechaalta', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimientoreferencia">Referencia</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('referencia', array('id'=>'Inventariomovimientoreferencia', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';


echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimientoordenventa_id">Orden venta</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('ordenventa_id', array('value'=>'0', 'type'=>'text', 'readonly'=>true, 'id'=>'Inventariomovimientoordenventa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';

echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimientouserventa_id">User venta</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('userventa_id', array('value'=>'0', 'type'=>'text', 'readonly'=>true, 'id'=>'Inventariomovimientouserventa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';


	?>
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
				<li><?php echo $this->Html->link(__('List Inventariomovimientos'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresasurcusales'), array('controller' => 'empresasurcusales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresasurcusale'), array('controller' => 'empresasurcusales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacentipos'), array('controller' => 'almacentipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacentipo'), array('controller' => 'almacentipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenes'), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacene'), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenproductos'), array('controller' => 'almacenproductos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenproducto'), array('controller' => 'almacenproductos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacentipofuntes'), array('controller' => 'almacentipofuntes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacentipofunte'), array('controller' => 'almacentipofuntes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenefuntes'), array('controller' => 'almacenefuntes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenefunte'), array('controller' => 'almacenefuntes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventariomovimateriales'), array('controller' => 'inventariomovimateriales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventariomovimateriale'), array('controller' => 'inventariomovimateriales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php */ ?>