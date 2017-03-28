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
					<?php echo $this->Form->create('Venta', array('class'=>'form-horizontal', 'url'=>'pagar2')); ?>
					<div class='row'>
							<div class='col-md-12'>
								<?php
			

echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Ventaid">Id</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('id', array('id'=>'Ventaid', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'text', 'readonly'=>true));		
echo '</div>';	
echo '</div>';
	


echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Ventainformacion">Información cliente</label>';		
echo'<div class="col-md-9" id="div-cliente">';			
echo $this->Form->input('informacion', array('id'=>'Ventainformacion', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'textarea', 'readonly'=>true));		
echo '</div>';	
echo '</div>';


echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Ventafecha_pagado">Fecha pagado</label>';		
echo'<div class="col-md-9" id="div-cliente">';			
echo $this->Form->input('fecha_pagado', array('id'=>'Ventafecha_pagado', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'date2'));		
echo '</div>';	
echo '</div>';
	


?>

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
