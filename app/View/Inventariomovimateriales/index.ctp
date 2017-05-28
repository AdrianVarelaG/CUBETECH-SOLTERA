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
                        <h3 class="box-title"><?php echo __('Inventario movimientos materiales'); ?> Registrados</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <p><?php echo $this->Html->link(__('Crear Nuevo'), array('action' => 'add'),  array('class'=>'btn btn-primary')); ?></p>

							<table id="data" class="table table-striped table-bordered responsive nowrap" width="100%" cellspacing="0">
							<thead>
							<tr>
															<th><?php echo __('Id'); ?></th>
															<th><?php echo __('Empresa'); ?></th>
															<th><?php echo __('Sucursal'); ?></th>
															<th><?php echo __('Almacen tipo'); ?></th>
															<th><?php echo __('Almacen'); ?></th>
															<th><?php echo __('Material'); ?></th>
															<th><?php echo __('Tipo'); ?></th>
															<th><?php echo __('Cantidad'); ?></th>
															<th><?php echo __('Fecha alta'); ?></th>
															<th><?php echo __('User movi almacen'); ?></th>
															<th><?php echo __('Id movi almacen'); ?></th>
															<th class="actions"><?php echo __('Acción'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($inventariomovimateriales as $inventariomovimateriale): ?>
								<tr>
									<td><?php echo h($inventariomovimateriale['Inventariomovimateriale']['id']); ?></td>
									<td><?php echo h($inventariomovimateriale['Empresa']['razon_social']); ?></td>
									<td><?php echo h($inventariomovimateriale['Empresasurcusale']['denominacion']); ?></td>
									<td><?php echo h($inventariomovimateriale['Almacentipo']['denominacion']); ?></td>
									<td><?php echo h($inventariomovimateriale['Almacene']['nombre']); ?></td>
									<td><?php echo h($inventariomovimateriale['Almacenmateriale']['nombre']); ?></td>
									<td><?php echo h($inventariomovimateriale['Inventariomovimateriale']['tipo']==1?"ENTRADA":"SALIDA"); ?>&nbsp;</td>
									<td><?php echo h($inventariomovimateriale['Inventariomovimateriale']['cantidad']); ?>&nbsp;</td>
									<td><?php echo h($inventariomovimateriale['Inventariomovimateriale']['fechaalta']); ?>&nbsp;</td>
									<td><?php echo h($inventariomovimateriale['Usermovi']['username']); ?></td>
									<td><?php echo h($inventariomovimateriale['Inventariomovimiento']['almacenproducto_id']); ?></td>
									<td class="actions">
										<?php 	  $empresa_id          = $this->Session->read('empresa_id');
										          $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
										          $rol_id              = $this->Session->read('ROL');
										          $user_id             = $this->Session->read('USUARIO_ID');
										 ?>
										<?php
										if($inventariomovimateriale['Inventariomovimateriale']['inventariomovimiento_id']==0){
										      echo $this->Html->link(__('Editar'), array('action' => 'edit', $inventariomovimateriale['Inventariomovimateriale']['id']), array('class'=>'btn btn-primary'));
										  }
									    ?>
										<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $inventariomovimateriale['Inventariomovimateriale']['id']),   array('class'=>'btn btn-success')); ?>
										<?php
										if($inventariomovimateriale['Inventariomovimiento']['almacenproducto_id']==0){
										    echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $inventariomovimateriale['Inventariomovimateriale']['id']), array('class'=>'btn btn-danger', 'confirm'=>__('EEsta seguro que desea eliminar este Movimiento', $inventariomovimateriale['Inventariomovimateriale']['id'])));
										}
										?>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
							</table>
						</div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->
<script type="text/javascript">
	//$(document).ready(function() {
	    $('#data').DataTable( {
	    	dom: 'Bfrtlip',
	    	responsive: true,
	        buttons: [
	            {
	                extend: 'excel',
	                exportOptions: {
	                    columns: [0,1,2,3,5,6,7,8,9,10]
	                }
	            }
	        ],
		    columnDefs: [
		            {
		                targets: [0,1,2,3,5,6,7,11],
		                visible: true,
		                searchable: true
		            },
		            {
		            	targets: [0,1,2,3,5,6,7,11],
		            	visible: true,
		            	searchable: false
		            },
		            {
		            	targets: [8,9,10],
		            	visible: false,
		            	searchable: false
		            },
                {
                    type: 'num',
                    targets: [0]
                },
		     ],
	        "language":
	        {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			}
	    } );
	//} );
</script>
