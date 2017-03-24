<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Municipios'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Municipios'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Add Municipios'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Dirmunicipio', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
<?php
	echo'<div class="form-group">';	
	echo'<label class="control-label col-md-2" for="Dirmunicipiodirepai_id">Pais</label>';		
	echo'<div class="col-md-9">';			
	echo $this->Form->input('direpai_id', array('empty'=>'--Seleccione--', 'id'=>'Dirmunicipiodirepai_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Dirmunicipios/estado')."', 'div-estados', this.value);")); 	
	echo '</div>';
	echo '</div>';
		
	echo'<div class="form-group">';	
	echo'<label class="control-label col-md-2" for="Dirmunicipiodireprovincia_id">Estado</label>';		
	echo'<div class="col-md-9" id="div-estados">';			
	echo $this->Form->input('direprovincia_id', array('empty'=>'--Seleccione--', 'id'=>'Dirmunicipiodireprovincia_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
	echo '</div>';	
	echo '</div>';
		
	echo'<div class="form-group">';	
	echo'<label class="control-label col-md-2" for="Dirmunicipiodenominacion">Denominación</label>';		
	echo'<div class="col-md-9">';			
	echo $this->Form->input('denominacion', array('id'=>'Dirmunicipiodenominacion', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
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
				<li><?php echo $this->Html->link(__('List Dirmunicipios'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Direpais'), array('controller' => 'direpais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direpai'), array('controller' => 'direpais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Direprovincias'), array('controller' => 'direprovincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direprovincia'), array('controller' => 'direprovincias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php */ ?>