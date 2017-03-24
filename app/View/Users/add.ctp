<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Users'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Users'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Add User'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('User', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
								<?php
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Userusername">username</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('username', array('id'=>'Userusername', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Userpassword">password</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('password', array('id'=>'Userpassword', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Userrole_id">Rol</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('role_id', array('id'=>'Userrole_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Userrempresa_id">Empresa</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresa_id', array('id'=>'Userrempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Userempresasurcusale_id">Empresa surcusale</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('empresasurcusale_id', array('id'=>'Userempresasurcusale_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Usernombres_apellidos">Nombres apellidos</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('nombres_apellidos', array('id'=>'Usernombres_apellidos', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Useremail">Email</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('email', array('id'=>'Useremail', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';

echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Userbio">Bio</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('bio', array('id'=>'Userbio', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
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
				<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restos'), array('controller' => 'restos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resto'), array('controller' => 'restos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restosurcusales'), array('controller' => 'restosurcusales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restosurcusale'), array('controller' => 'restosurcusales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php */ ?>