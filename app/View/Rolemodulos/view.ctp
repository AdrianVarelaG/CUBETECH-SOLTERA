<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Rol modulo'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Rol modulo'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Rol modulo'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
								<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rolemodulo['Rolemodulo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rolemodulo['Role']['title'], array('controller' => 'roles', 'action' => 'view', $rolemodulo['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modulo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rolemodulo['Modulo']['denominacion'], array('controller' => 'modulos', 'action' => 'view', $rolemodulo['Modulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($rolemodulo['Rolemodulo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($rolemodulo['Rolemodulo']['modified']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $rolemodulo['Rolemodulo']['id'])); ?>
                            |
                            		<?php echo $this->Html->link(__('Volver'), array('action' => 'index')); ?>
                        </p>
					</div>
			    </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->
<?php /* ?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rolemodulo'), array('action' => 'edit', $rolemodulo['Rolemodulo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rolemodulo'), array('action' => 'delete', $rolemodulo['Rolemodulo']['id']), array(), __('Are you sure you want to delete # %s?', $rolemodulo['Rolemodulo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rolemodulos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rolemodulo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modulos'), array('controller' => 'modulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modulo'), array('controller' => 'modulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */ ?>