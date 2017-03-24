<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Estado Ventas'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Estado Ventas'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Estado Venta'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Venta', array('class'=>'form-horizontal')); ?>
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
								echo $this->Form->input('cliente_id', array( 'id'=>'Ventacliente_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Ventas/cliente')."', 'div-cliente', this.value);"));		
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
								echo $this->Form->input('almacentipo_id', array('id'=>'Ventaalmacentipo_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Ventas/almacen')."', 'div-almacen', this.value);"));		
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
								echo $this->Form->input('tipo', array('options'=>array('1'=>'Venta', '2'=>'Cortesia'),  'id'=>'Ventatipo', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'disabled'=>true));		
								echo '</div>';	
								echo '</div>';

								echo'<div class="form-group">';	
								echo'<label class="control-label col-md-2" for="Ventafecha">Fecha</label>';		
								echo'<div class="col-md-9">';			
								echo $this->Form->input('fecha', array('id'=>'Ventafecha', 'div'=>false, 'label'=>false, 'type'=>'text', 'readonly'=>true, 'class'=>'form-control'));		
								echo '</div>';	
								echo '</div>'; 
								$empresa_id          = $this->Session->read('empresa_id'); 			 
						        $empresasurcusale_id = $this->Session->read('empresasurcusale_id'); 			 
						        $rol_id              = $this->Session->read('ROL'); 			 
						        $user_id             = $this->Session->read('USUARIO_ID');
								if($this->request->data["Venta"]["tipo"]==1){
										   $options = array('1'=>'Registrado', '3'=>'Entregado');
								}else{
									if($rol_id==3){
                                           $options = array('2'=>'Pendiente Autorizar', '1'=>'Registrado');
									}else{
									       $options = array('2'=>'Pendiente Autorizar');	
									}
								}
								echo'<div class="form-group">';	
								echo'<label class="control-label col-md-2" for="Ventaestado">Estado</label>';		
								echo'<div class="col-md-9">';			
								echo $this->Form->input('estado', array('options'=>$options,  'id'=>'Ventaestado', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
								echo '</div>';	
								echo '</div>';
									
								echo'<div class="form-group">';	
								echo'<label class="control-label col-md-2" for="Ventatotal">Total</label>';		
								echo'<div class="col-md-9">';			
								echo $this->Form->input('total', array('id'=>'Ventatotal', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'readonly'=>true));		
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
