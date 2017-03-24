<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Inventario movimientos materiales'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Inventario movimientos materiales'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Inventario movimientos materiales'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
								<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Inventariomovimateriale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Empresa']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Surcusal'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Empresasurcusale']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacen tipo'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Almacentipo']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacen'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Almacene']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacen material'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Almacenmateriale']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Inventariomovimateriale']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Inventariomovimateriale']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha alta'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Inventariomovimateriale']['fechaalta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User movimiento'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Usermovi']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inventario movimiento'); ?></dt>
		<dd>
			<?php echo h($inventariomovimateriale['Inventariomovimiento']['almacenproducto_id']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $inventariomovimateriale['Inventariomovimateriale']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Inventariomovimateriale'), array('action' => 'edit', $inventariomovimateriale['Inventariomovimateriale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Inventariomovimateriale'), array('action' => 'delete', $inventariomovimateriale['Inventariomovimateriale']['id']), array(), __('Are you sure you want to delete # %s?', $inventariomovimateriale['Inventariomovimateriale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventariomovimateriales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventariomovimateriale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresasurcusales'), array('controller' => 'empresasurcusales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresasurcusale'), array('controller' => 'empresasurcusales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacentipos'), array('controller' => 'almacentipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacentipo'), array('controller' => 'almacentipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenes'), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacene'), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenmateriales'), array('controller' => 'almacenmateriales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenmateriale'), array('controller' => 'almacenmateriales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usermovis'), array('controller' => 'usermovis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usermovi'), array('controller' => 'usermovis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventariomovimientos'), array('controller' => 'inventariomovimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventariomovimiento'), array('controller' => 'inventariomovimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */ ?>