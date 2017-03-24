<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Almacen marcas'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Almacen marcas'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Almacen marcas'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
								<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($almacenmarca['Almacenmarca']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($almacenmarca['Almacenmarca']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha alta'); ?></dt>
		<dd>
			<?php echo h($almacenmarca['Almacenmarca']['fechaalta']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $almacenmarca['Almacenmarca']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Almacenmarca'), array('action' => 'edit', $almacenmarca['Almacenmarca']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Almacenmarca'), array('action' => 'delete', $almacenmarca['Almacenmarca']['id']), array(), __('Are you sure you want to delete # %s?', $almacenmarca['Almacenmarca']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenmarcas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenmarca'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<?php */ ?>