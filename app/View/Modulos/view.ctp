<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Modulos'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Modulos'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Modulos'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
								<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($modulo['Modulo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($modulo['Modulo']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($modulo['Modulo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($modulo['Modulo']['modified']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $modulo['Modulo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Modulo'), array('action' => 'edit', $modulo['Modulo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Modulo'), array('action' => 'delete', $modulo['Modulo']['id']), array(), __('Are you sure you want to delete # %s?', $modulo['Modulo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Modulos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modulo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rolemodulos'), array('controller' => 'rolemodulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rolemodulo'), array('controller' => 'rolemodulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Rolemodulos'); ?></h3>
	<?php if (!empty($modulo['Rolemodulo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('Modulo Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($modulo['Rolemodulo'] as $rolemodulo): ?>
		<tr>
			<td><?php echo $rolemodulo['id']; ?></td>
			<td><?php echo $rolemodulo['role_id']; ?></td>
			<td><?php echo $rolemodulo['modulo_id']; ?></td>
			<td><?php echo $rolemodulo['created']; ?></td>
			<td><?php echo $rolemodulo['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rolemodulos', 'action' => 'view', $rolemodulo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rolemodulos', 'action' => 'edit', $rolemodulo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rolemodulos', 'action' => 'delete', $rolemodulo['id']), array(), __('Are you sure you want to delete # %s?', $rolemodulo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Rolemodulo'), array('controller' => 'rolemodulos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<?php */ ?>