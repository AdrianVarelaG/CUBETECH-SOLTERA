<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Almacen usuarios'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Almacen usuarios'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Almacen usuarios'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($almacenuser['Almacenuser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo h($almacenuser['Empresa']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sucursal'); ?></dt>
		<dd>
			<?php echo h($almacenuser['Empresasurcusale']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacen tipo'); ?></dt>
		<dd>
			<?php echo h($almacenuser['Almacentipo']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacen'); ?></dt>
		<dd>
			<?php echo h($almacenuser['Almacene']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo h($almacenuser['User']['username']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $almacenuser['Almacenuser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Almacenuser'), array('action' => 'edit', $almacenuser['Almacenuser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Almacenuser'), array('action' => 'delete', $almacenuser['Almacenuser']['id']), array(), __('Are you sure you want to delete # %s?', $almacenuser['Almacenuser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenusers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenuser'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacentipos'), array('controller' => 'almacentipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacentipo'), array('controller' => 'almacentipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenes'), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacene'), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */ ?>