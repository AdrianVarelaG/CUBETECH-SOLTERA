<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Clientes'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Clientes'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Clientes'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
								<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo h($cliente['Empresa']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sucursal'); ?></dt>
		<dd>
			<?php echo h($cliente['Empresasurcusale']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vendedor'); ?></dt>
		<dd>
			<?php echo h($cliente['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Contacto'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['nombre_contacto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Alta'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['fecha_alta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Requiere Factura'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['requiere_factura']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Razon Social'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calle'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['calle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Exterior'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['numero_exterior']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Interior'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['numero_interior']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Colonia'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['colonia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cod Postal'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['cod_postal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rfc'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['rfc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pais'); ?></dt>
		<dd>
			<?php echo h($cliente['Direpai']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($cliente['Direprovincia']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Municipio'); ?></dt>
		<dd>
			<?php echo h($cliente['Dirmunicipio']['denominacion']); ?>
			&nbsp;
		</dd>
						</dl>
						<p>
						    		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $cliente['Cliente']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Cliente'), array('action' => 'edit', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), array(), __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresasurcusales'), array('controller' => 'empresasurcusales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresasurcusale'), array('controller' => 'empresasurcusales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Direpais'), array('controller' => 'direpais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direpai'), array('controller' => 'direpais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Direprovincias'), array('controller' => 'direprovincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direprovincia'), array('controller' => 'direprovincias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dirmunicipios'), array('controller' => 'dirmunicipios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dirmunicipio'), array('controller' => 'dirmunicipios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */ ?>