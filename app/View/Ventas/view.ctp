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
                        <h3 class="box-title"><?php echo __('Ventas'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
								<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($venta['Empresa']['razon_social'], array('controller' => 'empresas', 'action' => 'view', $venta['Empresa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresasurcusale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($venta['Empresasurcusale']['denominacion'], array('controller' => 'empresasurcusales', 'action' => 'view', $venta['Empresasurcusale']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($venta['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $venta['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Información cliente'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['informacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($venta['User']['username'], array('controller' => 'users', 'action' => 'view', $venta['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacentipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($venta['Almacentipo']['denominacion'], array('controller' => 'almacentipos', 'action' => 'view', $venta['Almacentipo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacene'); ?></dt>
		<dd>
			<?php echo $this->Html->link($venta['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $venta['Almacene']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['tipo']==1?"Venta":"Cortesia"); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pagado'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['pagado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Pagado'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['fecha_pagado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['modified']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $venta['Venta']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Venta'), array('action' => 'edit', $venta['Venta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Venta'), array('action' => 'delete', $venta['Venta']['id']), array(), __('Are you sure you want to delete # %s?', $venta['Venta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ventas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Venta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresasurcusales'), array('controller' => 'empresasurcusales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresasurcusale'), array('controller' => 'empresasurcusales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacentipos'), array('controller' => 'almacentipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacentipo'), array('controller' => 'almacentipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenes'), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacene'), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ventadetalles'), array('controller' => 'ventadetalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ventadetalle'), array('controller' => 'ventadetalles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ventadetalles'); ?></h3>
	<?php if (!empty($venta['Ventadetalle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Venta Id'); ?></th>
		<th><?php echo __('Almacenproducto Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Existencia'); ?></th>
		<th><?php echo __('Precio'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Embalaje'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($venta['Ventadetalle'] as $ventadetalle): ?>
		<tr>
			<td><?php echo $ventadetalle['id']; ?></td>
			<td><?php echo $ventadetalle['venta_id']; ?></td>
			<td><?php echo $ventadetalle['almacenproducto_id']; ?></td>
			<td><?php echo $ventadetalle['cantidad']; ?></td>
			<td><?php echo $ventadetalle['existencia']; ?></td>
			<td><?php echo $ventadetalle['precio']; ?></td>
			<td><?php echo $ventadetalle['total']; ?></td>
			<td><?php echo $ventadetalle['embalaje']; ?></td>
			<td><?php echo $ventadetalle['created']; ?></td>
			<td><?php echo $ventadetalle['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ventadetalles', 'action' => 'view', $ventadetalle['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ventadetalles', 'action' => 'edit', $ventadetalle['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ventadetalles', 'action' => 'delete', $ventadetalle['id']), array(), __('Are you sure you want to delete # %s?', $ventadetalle['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ventadetalle'), array('controller' => 'ventadetalles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<?php */ ?>