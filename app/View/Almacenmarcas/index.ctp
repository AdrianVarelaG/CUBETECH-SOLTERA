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
                        <h3 class="box-title"><?php echo __('Almacen marcas'); ?> Registrados</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <p><?php echo $this->Html->link(__('Crear Nuevo'), array('action' => 'add'),  array('class'=>'btn btn-primary')); ?></p>

							<table id="data" class="table table-striped table-bordered responsive nowrap" width="100%" cellspacing="0">
							<thead>
							<tr>
															<th><?php echo __('Id'); ?></th>
															<th><?php echo __('Empresa'); ?></th>
															<th><?php echo __('Nombre'); ?></th>
															<th><?php echo __('Fecha alta'); ?></th>
															<th><?php echo __('Materiales'); ?></th>
															<th class="actions"><?php echo __('Acción'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($almacenmarcas as $almacenmarca): ?>
	<tr>
		<td><?php echo h($almacenmarca['Almacenmarca']['id']); ?></td>
		<td><?php echo h($almacenmarca['Empresa']['razon_social']); ?>&nbsp;</td>
		<td><?php echo h($almacenmarca['Almacenmarca']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($almacenmarca['Almacenmarca']['fechaalta']); ?>&nbsp;</td>
		<td>
		<?php
		 foreach ($almacenmarca['Almacenmarcadetalle'] as $almacenmarcadetalle){
               echo $almacenmarcadetalle['Almacenmateriale']['nombre'].", cantidad: ".$almacenmarcadetalle['cantidad']."<br>";
		 }
		?>
		</td>
		<td class="actions">
			<?php 			 $empresa_id          = $this->Session->read('empresa_id'); 			 $empresasurcusale_id = $this->Session->read('empresasurcusale_id'); 			 $rol_id              = $this->Session->read('ROL'); 			 $user_id             = $this->Session->read('USUARIO_ID'); 			?> 			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $almacenmarca['Almacenmarca']['id']), array('class'=>'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $almacenmarca['Almacenmarca']['id']),   array('class'=>'btn btn-success')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $almacenmarca['Almacenmarca']['id']), array('class'=>'btn btn-danger', 'confirm'=>__('Esta seguro que desea eliminar el registro # %s?', $almacenmarca['Almacenmarca']['id']))); ?>
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


<?php /* ?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Almacenmarca'), array('action' => 'add')); ?></li>
	</ul>
</div>
<?php */ ?><script type="text/javascript">
	//$(document).ready(function() {
	    $('#data').DataTable( {
	    	dom: 'Bfrtlip',
	    	responsive: true,
	        buttons: [
	            {
	                extend: 'excel',
	                exportOptions: {
	                    columns: [0,1,2,3,4]
	                }
	            }
	        ],
		    columnDefs: [
		            {
		                targets: [ 2 ],
		                visible: true,
		                searchable: true
		            },
		            {
		            	targets: [0,1,2,3,5],
		            	visible: true,
		            	searchable: false
		            },
		            {
		            	targets: [4],
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
