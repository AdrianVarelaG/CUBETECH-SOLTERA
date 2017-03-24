<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Municipios'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Municipios'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Municipios'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
		<dt><?php echo __('Pais'); ?></dt>
		<dd>
			<?php echo h($dirmunicipio['Direpai']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($dirmunicipio['Direprovincia']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominación'); ?></dt>
		<dd>
			<?php echo h($dirmunicipio['Dirmunicipio']['denominacion']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $dirmunicipio['Dirmunicipio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Dirmunicipio'), array('action' => 'edit', $dirmunicipio['Dirmunicipio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dirmunicipio'), array('action' => 'delete', $dirmunicipio['Dirmunicipio']['id']), array(), __('Are you sure you want to delete # %s?', $dirmunicipio['Dirmunicipio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dirmunicipios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dirmunicipio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Direpais'), array('controller' => 'direpais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direpai'), array('controller' => 'direpais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Direprovincias'), array('controller' => 'direprovincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direprovincia'), array('controller' => 'direprovincias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */ ?>