<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Inventario movimientos'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Inventario movimientos'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Inventario movimientos'); ?> Detalles</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<dl class="dl-horizontal">
								<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Inventariomovimiento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Empresa']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sucursal'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Empresasurcusale']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacen tipo'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Almacentipo']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacen'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Almacene']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Almacenproducto']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Inventariomovimiento']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Inventariomovimiento']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacen tipo destino'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Almacentipofunte']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacen destino'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Almacenefunte']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha alta'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Inventariomovimiento']['fechaalta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referencia'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Inventariomovimiento']['referencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orden venta'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Inventariomovimiento']['ordenventa_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User venta'); ?></dt>
		<dd>
			<?php echo h($inventariomovimiento['Userventa']['username']); ?>
			&nbsp;
		</dd>		</dl>
						<p>
				    		<?php 
	                        if($inventariomovimiento['Inventariomovimiento']['userventa_id']==0){
				    		    echo $this->Html->link(__('Editar'), array('action' => 'edit', $inventariomovimiento['Inventariomovimiento']['id'])); 
	                        }
				    		?>
                            |
                            <?php echo $this->Html->link(__('Volver'), array('action' => 'index')); ?>
                        </p>
					</div>
			    </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->