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
                        <h3 class="box-title"><?php echo __('Municipios'); ?> Registrados</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <p><?php echo $this->Html->link(__('Crear Nuevo'), array('action' => 'add'),  array('class'=>'btn btn-primary')); ?></p>

							<table id="data" class="table table-striped table-bordered responsive nowrap" width="100%" cellspacing="0">
							<thead>
							<tr>
															<th><?php echo __('Pais'); ?></th>
															<th><?php echo __('Estado'); ?></th>
															<th><?php echo __('Denominación'); ?></th>
															<th class="actions"><?php echo __('Acción'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($dirmunicipios as $dirmunicipio): ?>
	<tr>
		<td>
			<?php echo h($dirmunicipio['Direpai']['denominacion']); ?>
		</td>
		<td>
			<?php echo h($dirmunicipio['Direprovincia']['denominacion']); ?>
		</td>
		<td><?php echo h($dirmunicipio['Dirmunicipio']['denominacion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $dirmunicipio['Dirmunicipio']['id']), array('class'=>'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $dirmunicipio['Dirmunicipio']['id']),   array('class'=>'btn btn-success')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $dirmunicipio['Dirmunicipio']['id']), array('class'=>'btn btn-danger', 'confirm'=>__('Esta seguro que desea eliminar el registro # %s?', $dirmunicipio['Dirmunicipio']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Dirmunicipio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Direpais'), array('controller' => 'direpais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direpai'), array('controller' => 'direpais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Direprovincias'), array('controller' => 'direprovincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direprovincia'), array('controller' => 'direprovincias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */ ?><script type="text/javascript">
	//$(document).ready(function() {
	    $('#data').DataTable( {
	    	dom: 'Bfrtlip',
	    	responsive: true,
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
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
