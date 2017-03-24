<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Consulta almacenes Productos'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Consulta almacenes Productos'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Consulta almacenes Productos'); ?> Registrados</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
							<table id="data" class="table table-striped table-bordered responsive nowrap" width="100%" cellspacing="0">
							<thead>
							<tr>
															<th><?php echo __('Empresa'); ?></th>
															<th><?php echo __('Sucursal'); ?></th>
															<th><?php echo __('Almacen tipo'); ?></th>
															<th><?php echo __('Almacen'); ?></th>
															<th><?php echo __('Productos'); ?></th>
															<th><?php echo __('Cantidad'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($inventariomovimientos as $inventariomovimiento): ?>
								<tr>
									<td><?php echo h($inventariomovimiento[0]['deno_empresas']); ?></td>
									<td><?php echo h($inventariomovimiento[0]['deno_empresasurcusales']); ?></td>
									<td><?php echo h($inventariomovimiento[0]['deno_almacentipos']); ?></td>
									<td><?php echo h($inventariomovimiento[0]['deno_almacenes']); ?></td>
									<td><?php echo h($inventariomovimiento[0]['deno_almacenproductos']); ?></td>
									<td><?php echo h($inventariomovimiento[0]['entrada']-$inventariomovimiento[0]['salida']); ?>&nbsp;</td>
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
	                extend: 'excel'
	            }
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



