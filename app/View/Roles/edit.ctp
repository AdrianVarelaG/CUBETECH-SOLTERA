<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Roles'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Roles'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Edit Role'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Role', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
								<?php
			
echo $this->Form->input('id', array('class'=>'form-horizontal'));	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Roletitle">Title</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('title', array('id'=>'Roletitle', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
echo '</div>';	
echo '</div>';
	
echo'<div class="form-group">';	
echo'<label class="control-label col-md-2" for="Rolealias">Alias</label>';		
echo'<div class="col-md-9">';			
echo $this->Form->input('alias', array('id'=>'Rolealias', 'div'=>false, 'label'=>false, 'class'=>'form-control'));		
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
				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Role.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Role.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Rolemodulos'), array('controller' => 'rolemodulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rolemodulo'), array('controller' => 'rolemodulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php */ ?>