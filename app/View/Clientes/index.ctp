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
                        <h3 class="box-title"><?php echo __('Clientes'); ?> Registrados</h3>
                        <hr>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <p><?php echo $this->Html->link(__('Crear Nuevo'), array('action' => 'add'),  array('class'=>'btn btn-primary')); ?></p>

							<table id="data" class="table table-striped table-bordered responsive nowrap" width="100%" cellspacing="0">
							<thead>
							<tr>
									<th><?php echo __('id'); ?></th>
									<th><?php echo __('Empresa'); ?></th>
									<th><?php echo __('Sucursal'); ?></th>
									<th><?php echo __('Nombre'); ?></th>
									<th><?php echo __('Vendedor'); ?></th>
									<th><?php echo __('Teléfono'); ?></th>
									<th><?php echo __('Celular'); ?></th>
									<th><?php echo __('Nombre contacto'); ?></th>
									<th><?php echo __('Email'); ?></th>
									<th><?php echo __('Fecha alta'); ?></th>
									<th><?php echo __('Factura'); ?></th>
									<th><?php echo __('Razón social'); ?></th>
									<th><?php echo __('Calle'); ?></th>
									<th><?php echo __('Número exterior'); ?></th>
									<th><?php echo __('Número interior'); ?></th>
									<th><?php echo __('Colonia'); ?></th>
									<th><?php echo __('Código postal'); ?></th>
									<th><?php echo __('Rfc'); ?></th>
									<th><?php echo __('Pais'); ?></th>
									<th><?php echo __('Estado'); ?></th>
									<th><?php echo __('Municipio'); ?></th>
									<th class="actions"><?php echo __('Acción'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($clientes as $cliente): ?>
								<tr>
									<td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Empresa']['razon_social']); ?></td>
									<td><?php echo h($cliente['Empresasurcusale']['denominacion']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['nombre']); ?>&nbsp;</td>
									<td><?php echo h($cliente['User']['username']); ?></td>
									<td><?php echo h($cliente['Cliente']['telefono']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['celular']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['nombre_contacto']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['email']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['fecha_alta']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['requiere_factura']==1?"SI":"NO"); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['razon_social']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['calle']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['numero_exterior']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['numero_interior']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['colonia']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['cod_postal']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Cliente']['rfc']); ?>&nbsp;</td>
									<td><?php echo h($cliente['Direpai']['denominacion']); ?></td>
									<td><?php echo h($cliente['Direprovincia']['denominacion']); ?></td>
									<td><?php echo h($cliente['Dirmunicipio']['denominacion']); ?></td>
									<td class="actions">
										<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $cliente['Cliente']['id']), array('class'=>'btn btn-primary')); ?>
										<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $cliente['Cliente']['id']),   array('class'=>'btn btn-success')); ?>
										<?php
										$empresa_id          = $this->Session->read('empresa_id');
								     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
								     	$rol_id              = $this->Session->read('ROL');
								     	$user_id             = $this->Session->read('USUARIO_ID');
								     	$pedido              = 0;//PEDIDOS
								     	foreach ($cliente['Venta'] as $value) {
                                         $pedido++;
								     	}
										      if($rol_id==3 || $rol_id==2 || $rol_id==1){

										 echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $cliente['Cliente']['id']), array('class'=>'btn btn-danger', 'confirm'=>__('Esta seguro que desea eliminar el registro # %s?', $cliente['Cliente']['id'])));

										}else if($rol_id==4 && $pedido==0){

                                         echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $cliente['Cliente']['id']), array('class'=>'btn btn-danger', 'confirm'=>__('Esta seguro que desea eliminar el registro # %s?', $cliente['Cliente']['id'])));

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
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]
	                }
	            }
	        ],
		    columnDefs: [
		            {
		                targets: [ 3 ],
		                visible: true,
		                searchable: true
		            },
		            {
		            	targets: [0,5,6,7,10],
		            	visible: true,
		            	searchable: false
		            },
		            {
		            	targets: [1,2,4,5,8,9,11,12,13,14,15,16,17,18,19,20],
		            	visible: false,
		            	searchable: false
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
