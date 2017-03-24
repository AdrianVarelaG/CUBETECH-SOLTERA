<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Pais'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Pais'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Pais'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
		<dt><?php echo __('Denominación'); ?></dt>
		<dd>
			<?php echo h($direpai['Direpai']['denominacion']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $direpai['Direpai']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Direpai'), array('action' => 'edit', $direpai['Direpai']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Direpai'), array('action' => 'delete', $direpai['Direpai']['id']), array(), __('Are you sure you want to delete # %s?', $direpai['Direpai']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Direpais'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direpai'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Direprovincias'), array('controller' => 'direprovincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direprovincia'), array('controller' => 'direprovincias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Direprovincias'); ?></h3>
	<?php if (!empty($direpai['Direprovincia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Direpai Id'); ?></th>
		<th><?php echo __('Denominacion'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($direpai['Direprovincia'] as $direprovincia): ?>
		<tr>
			<td><?php echo $direprovincia['id']; ?></td>
			<td><?php echo $direprovincia['direpai_id']; ?></td>
			<td><?php echo $direprovincia['denominacion']; ?></td>
			<td><?php echo $direprovincia['created']; ?></td>
			<td><?php echo $direprovincia['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'direprovincias', 'action' => 'view', $direprovincia['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'direprovincias', 'action' => 'edit', $direprovincia['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'direprovincias', 'action' => 'delete', $direprovincia['id']), array(), __('Are you sure you want to delete # %s?', $direprovincia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Direprovincia'), array('controller' => 'direprovincias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Empresas'); ?></h3>
	<?php if (!empty($direpai['Empresa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cuit'); ?></th>
		<th><?php echo __('Razon Social'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Direpai Id'); ?></th>
		<th><?php echo __('Direprovincia Id'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($direpai['Empresa'] as $empresa): ?>
		<tr>
			<td><?php echo $empresa['id']; ?></td>
			<td><?php echo $empresa['cuit']; ?></td>
			<td><?php echo $empresa['razon_social']; ?></td>
			<td><?php echo $empresa['email']; ?></td>
			<td><?php echo $empresa['telefono']; ?></td>
			<td><?php echo $empresa['website']; ?></td>
			<td><?php echo $empresa['direpai_id']; ?></td>
			<td><?php echo $empresa['direprovincia_id']; ?></td>
			<td><?php echo $empresa['direccion']; ?></td>
			<td><?php echo $empresa['created']; ?></td>
			<td><?php echo $empresa['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'empresas', 'action' => 'view', $empresa['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'empresas', 'action' => 'edit', $empresa['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'empresas', 'action' => 'delete', $empresa['id']), array(), __('Are you sure you want to delete # %s?', $empresa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<?php */ ?>