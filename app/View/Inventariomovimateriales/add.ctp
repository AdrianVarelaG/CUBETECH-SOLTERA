<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Inventario movimientos materiales'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Inventario movimientos materiales'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Add Inventario movimientos materiales'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Inventariomovimateriale', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
								<?php
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimaterialeempresa_id">Empresa</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresa_id', array('id'=>'Inventariomovimaterialeempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimaterialeempresasurcusale_id">Sucursal</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresasurcusale_id', array('id'=>'Inventariomovimaterialeempresasurcusale_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimaterialealmacentipo_id">Almancen tipo</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('almacentipo_id', array('empty'=>'--Seleccione--', 'id'=>'Inventariomovimaterialealmacentipo_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Inventariomovimateriales/almacen')."', 'div-almacen', this.value);"));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimaterialealmacene_id">Almacen</label>';		
echo'<div class="col-md-9" id="div-almacen">';			
echo $this->Form->input('almacene_id', array('id'=>'Inventariomovimaterialealmacene_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimaterialealmacenmateriale_id">Material</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('almacenmateriale_id', array('empty'=>'--Seleccione--', 'id'=>'Inventariomovimaterialealmacenmateriale_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimaterialetipo">Tipo movimiento</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('tipo', array('options'=>array('1'=>'Entrada', '2'=>'Salida'), 'id'=>'Inventariomovimaterialetipo', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimaterialecantidad">Cantidad</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('cantidad', array('id'=>'Inventariomovimaterialecantidad', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'numbersinpunto'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimaterialefechaalta">Fecha alta</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('fechaalta', array('id'=>'Inventariomovimaterialefechaalta', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Inventariomovimaterialeusermovi_id">Usuario movimiento</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('usermovi_id', array('id'=>'Inventariomovimaterialeusermovi_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
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
				<li><?php echo $this->Html->link(__('List Inventariomovimateriales'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresasurcusales'), array('controller' => 'empresasurcusales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresasurcusale'), array('controller' => 'empresasurcusales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacentipos'), array('controller' => 'almacentipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacentipo'), array('controller' => 'almacentipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenes'), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacene'), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenmateriales'), array('controller' => 'almacenmateriales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenmateriale'), array('controller' => 'almacenmateriales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usermovis'), array('controller' => 'usermovis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usermovi'), array('controller' => 'usermovis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventariomovimientos'), array('controller' => 'inventariomovimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventariomovimiento'), array('controller' => 'inventariomovimientos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php */ ?>