<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Almacen productos'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Almacen productos'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Almacen productos'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
								<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($almacenproducto['Almacenproducto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo h($almacenproducto['Empresa']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($almacenproducto['Almacenproducto']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($almacenproducto['Almacenproducto']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marca'); ?></dt>
		<dd>
			<?php echo h($almacenproducto['Almacenmarca']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha alta'); ?></dt>
		<dd>
			<?php echo h($almacenproducto['Almacenproducto']['fechaalta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($almacenproducto['Almacenproducto']['precio']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $almacenproducto['Almacenproducto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Almacenproducto'), array('action' => 'edit', $almacenproducto['Almacenproducto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Almacenproducto'), array('action' => 'delete', $almacenproducto['Almacenproducto']['id']), array(), __('Are you sure you want to delete # %s?', $almacenproducto['Almacenproducto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenproductos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenproducto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenmarcas'), array('controller' => 'almacenmarcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenmarca'), array('controller' => 'almacenmarcas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenproductodetalles'), array('controller' => 'almacenproductodetalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenproductodetalle'), array('controller' => 'almacenproductodetalles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Almacenproductodetalles'); ?></h3>
	<?php if (!empty($almacenproducto['Almacenproductodetalle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Almacenproducto Id'); ?></th>
		<th><?php echo __('Almacenmateriale Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($almacenproducto['Almacenproductodetalle'] as $almacenproductodetalle): ?>
		<tr>
			<td><?php echo $almacenproductodetalle['id']; ?></td>
			<td><?php echo $almacenproductodetalle['almacenproducto_id']; ?></td>
			<td><?php echo $almacenproductodetalle['almacenmateriale_id']; ?></td>
			<td><?php echo $almacenproductodetalle['cantidad']; ?></td>
			<td><?php echo $almacenproductodetalle['created']; ?></td>
			<td><?php echo $almacenproductodetalle['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'almacenproductodetalles', 'action' => 'view', $almacenproductodetalle['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'almacenproductodetalles', 'action' => 'edit', $almacenproductodetalle['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'almacenproductodetalles', 'action' => 'delete', $almacenproductodetalle['id']), array(), __('Are you sure you want to delete # %s?', $almacenproductodetalle['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Almacenproductodetalle'), array('controller' => 'almacenproductodetalles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<?php */ ?>