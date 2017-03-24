<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Almacen materiales'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Almacen materiales'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Add Almacen materiales'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Almacenmateriale', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
<?php
	echo'<div class="form-group">';	
	echo'<label class="control-label col-md-2" for="Almacenmaterialeempresa_id">Empresa</label>';		
	echo'<div class="col-md-9">';			
	echo $this->Form->input('empresa_id', array('id'=>'Almacenmaterialeempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
	echo '</div>';	
	echo '</div>';
		
	echo'<div class="form-group">';	
	echo'<label class="control-label col-md-2" for="Almacenmaterialenombre">Nombre</label>';		
	echo'<div class="col-md-9">';			
	echo $this->Form->input('nombre', array('id'=>'Almacenmaterialenombre', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'onBlur'=>'validar_nombre_almacenmaterial();'));		
	echo '</div>';	
	echo '</div>';
		
	echo'<div class="form-group">';	
	echo'<label class="control-label col-md-2" for="Almacenmaterialetipo">Tipo</label>';		
	echo'<div class="col-md-9">';			
	echo $this->Form->input('tipo', array('empty'=>'--Seleccione--', 'options'=>array('1'=>'INSUMO', '2'=>'EMBALAJE'),  'id'=>'Almacenmaterialetipo', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
	echo '</div>';	
	echo '</div>';
?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
	                                <div class="col-md-12">
	                                    <?php echo $this->Html->link(__('Volver'), array('action' => 'index')); ?>	                                    
	                                    <input value="Guardar" class="btn btn-primary pull-right" type="submit">
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
				<li><?php echo $this->Html->link(__('List Almacenmateriales'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php */ ?>