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
                        <h3 class="box-title"><?php echo __('Roles'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
								
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($role['Role']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($role['Role']['alias']); ?>
			&nbsp;
		</dd>			</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $role['Role']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Role'), array('action' => 'edit', $role['Role']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Role'), array('action' => 'delete', $role['Role']['id']), array(), __('Are you sure you want to delete # %s?', $role['Role']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rolemodulos'), array('controller' => 'rolemodulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rolemodulo'), array('controller' => 'rolemodulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Rolemodulos'); ?></h3>
	<?php if (!empty($role['Rolemodulo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('Modulo Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($role['Rolemodulo'] as $rolemodulo): ?>
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
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($role['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('Resto Id'); ?></th>
		<th><?php echo __('Restosurcusale Id'); ?></th>
		<th><?php echo __('Nombres Apellidos'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($role['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['role_id']; ?></td>
			<td><?php echo $user['resto_id']; ?></td>
			<td><?php echo $user['restosurcusale_id']; ?></td>
			<td><?php echo $user['nombres_apellidos']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['website']; ?></td>
			<td><?php echo $user['bio']; ?></td>
			<td><?php echo $user['status']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<?php */ ?>