<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Consulta almacenes materiales'); ?> Registrados</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
							<table id="dataMateriales" class="table table-striped table-bordered responsive nowrap" width="100%" cellspacing="0">
							<thead>
							<tr>
															<th><?php echo __('Empresa'); ?></th>
															<th><?php echo __('Sucursal'); ?></th>
															<th><?php echo __('Almacen tipo'); ?></th>
															<th><?php echo __('Almacen'); ?></th>
															<th><?php echo __('Material'); ?></th>
															<th><?php echo __('Cantidad'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php  foreach ($inventariomovimateriales as $inventariomovimateriale): ?>
								<tr>
									<td><?php echo h($inventariomovimateriale[0]['deno_empresas']); ?></td>
									<td><?php echo h($inventariomovimateriale[0]['deno_empresasurcusales']); ?></td>
									<td><?php echo h($inventariomovimateriale[0]['deno_almacentipos']); ?></td>
									<td><?php echo h($inventariomovimateriale[0]['deno_almacenes']); ?></td>
									<td><?php echo h($inventariomovimateriale[0]['deno_almacenmateriales']); ?></td>
									<td><?php echo h($inventariomovimateriale[0]['entrada']-$inventariomovimateriale[0]['salida']); ?>&nbsp;</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
							</table>
						</div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->
