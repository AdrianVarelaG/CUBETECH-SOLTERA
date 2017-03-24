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
                        <h3 class="box-title"><?php echo __('Almacenes'); ?> Registrados</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <p><?php echo $this->Html->link(__('Crear Nuevo'), array('action' => 'add'),  array('class'=>'btn btn-primary')); ?></p>

							<table id="data" class="table table-striped table-bordered responsive nowrap" width="100%" cellspacing="0">
							<thead>
							<tr>
															<th><?php echo __('id'); ?></th>
															<th><?php echo __('Almacen tipo'); ?></th>
															<th><?php echo __('Nombre'); ?></th>
															<th><?php echo __('Dirección'); ?></th>
															<th><?php echo __('Foraneo'); ?></th>
															<th><?php echo __('Maquila'); ?></th>
															<th class="actions"><?php echo __('Acción'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($almacenes as $almacene): ?>
	<tr>
		<td><?php echo h($almacene['Almacene']['id']); ?>&nbsp;</td>
		<td><?php echo h($almacene['Almacentipo']['denominacion']); ?></td>
		<td><?php echo h($almacene['Almacene']['nombre']); ?>&nbsp;</td>
		<td><?php echo h(substr($almacene['Almacene']['direccion'],0,20)); ?>&nbsp;</td>
		<td><?php echo h($almacene['Almacene']['foraneo']=="1"?"SI":"NO"); ?>&nbsp;</td>
		<td><?php echo h($almacene['Almacene']['maquila']=="1"?"SI":"NO"); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $almacene['Almacene']['id']), array('class'=>'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $almacene['Almacene']['id']),   array('class'=>'btn btn-success')); ?>
			<?php 
			$empresa_id          = $this->Session->read('empresa_id');
	     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
	     	$rol_id              = $this->Session->read('ROL');
	     	$user_id             = $this->Session->read('USUARIO_ID');
	     	$pedido              = 0;//PEDIDOS
	     	if($rol_id==3 || $rol_id==1 || $rol_id==2){
				echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $almacene['Almacene']['id']), array('class'=>'btn btn-danger', 'confirm'=>__('Esta seguro que desea eliminar el registro # %s?', $almacene['Almacene']['id']))); 
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


<?php /* ?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Almacene'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresasurcusales'), array('controller' => 'empresasurcusales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresasurcusale'), array('controller' => 'empresasurcusales', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */ ?><script type="text/javascript">
	//$(document).ready(function() {
	    $('#data').DataTable( {
	    	dom: 'Bfrtlip',
	    	responsive: true,
	        buttons: [
	            'excel'
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
