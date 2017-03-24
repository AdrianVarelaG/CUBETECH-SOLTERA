<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Almacen usuarios'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Almacen usuarios'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Add Almacen usuarios'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Almacenuser', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
								<?php

echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenuserempresa_id">Empresa</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresa_id', array('id'=>'Almacenuserempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenuserempresasurcusale_id">Sucursal</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresasurcusale_id', array('id'=>'Almacenuserempresasurcusale_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenuseralmacentipo_id">Almacen tipo</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('almacentipo_id', array('empty'=>'--Seleccione--', 'id'=>'Almacenuseralmacentipo_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Almacenusers/almacen')."', 'div-almacen', this.value);"));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenuseralmacene_id">Almacen</label>';		
echo'<div class="col-md-9" id="div-almacen">';			
echo $this->Form->input('almacene_id', array('id'=>'Almacenuseralmacene_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenuseruser_id">Usuario</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('user_id', array('empty'=>'--Seleccione--', 'id'=>'Almacenuseruser_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
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
				<li><?php echo $this->Html->link(__('List Almacenusers'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Almacentipos'), array('controller' => 'almacentipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacentipo'), array('controller' => 'almacentipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenes'), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacene'), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php */ ?>