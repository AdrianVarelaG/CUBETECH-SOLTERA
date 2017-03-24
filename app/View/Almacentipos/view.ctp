<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Almacen tipos'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Almacen tipos'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Almacen tipos'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo h($almacentipo['Empresa']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominación'); ?></dt>
		<dd>
			<?php echo h($almacentipo['Almacentipo']['denominacion']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $almacentipo['Almacentipo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Almacentipo'), array('action' => 'edit', $almacentipo['Almacentipo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Almacentipo'), array('action' => 'delete', $almacentipo['Almacentipo']['id']), array(), __('Are you sure you want to delete # %s?', $almacentipo['Almacentipo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacentipos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacentipo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */ ?>