<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Almacenes'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Almacenes'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Almacenes'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
								<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($almacene['Almacene']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo h($almacene['Empresa']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sucursal'); ?></dt>
		<dd>
			<?php echo h($almacene['Empresasurcusale']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacen tipo'); ?></dt>
		<dd>
			<?php echo h($almacene['Almacentipo']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($almacene['Almacene']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dirección'); ?></dt>
		<dd>
			<?php echo h($almacene['Almacene']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foraneo'); ?></dt>
		<dd>
			<?php echo h($almacene['Almacene']['foraneo']=="1"?"SI":"NO"); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maquila'); ?></dt>
		<dd>
			<?php echo h($almacene['Almacene']['maquila']=="1"?"SI":"NO"); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $almacene['Almacene']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Almacene'), array('action' => 'edit', $almacene['Almacene']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Almacene'), array('action' => 'delete', $almacene['Almacene']['id']), array(), __('Are you sure you want to delete # %s?', $almacene['Almacene']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacene'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresasurcusales'), array('controller' => 'empresasurcusales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresasurcusale'), array('controller' => 'empresasurcusales', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */ ?>