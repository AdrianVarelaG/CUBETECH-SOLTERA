<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Almacenes'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Almacenes'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Edit Almacen'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Almacene', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
								<?php
			
echo $this->Form->input('id', array('class'=>'form-horizontal'));	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almaceneempresa_id">Empresa</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresa_id', array('id'=>'Almaceneempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almaceneempresasurcusale_id">Sucursal</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresasurcusale_id', array('id'=>'Almaceneempresasurcusale_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';

echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenealmacentipo_id">Almacen tipo</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('almacentipo_id', array('id'=>'Almacenealmacentipo_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenenombre">Nombre</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('nombre', array('id'=>'Almacenenombre', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'onBlur'=>'validar_nombre_almacen();', 'readonly'=>true));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenedireccion">Dirección</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('direccion', array('id'=>'Almacenedireccion', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almaceneforaneo"></label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('foraneo', array('options'=>array('1'=>' Si ', '2'=>' No '),  'type'=>'radio','id'=>'Almaceneforaneo', 'div'=>false, 'label'=>false, 'class'=>''));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Almacenemaquila"></label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('maquila', array('options'=>array('1'=>' Si ', '2'=>' No '),  'type'=>'radio','id'=>'Almacenemaquila', 'div'=>false, 'label'=>false, 'class'=>''));		
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
				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Almacene.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Almacene.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List Almacenes'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresasurcusales'), array('controller' => 'empresasurcusales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresasurcusale'), array('controller' => 'empresasurcusales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php */ ?>