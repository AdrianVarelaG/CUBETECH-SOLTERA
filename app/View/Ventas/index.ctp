<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Ventas'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Ventas'); ?></li>
  </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Ventas'); ?> Registrados</h3>
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
									<th><?php echo __('Cliente'); ?></th>
									<th><?php echo __('Vendedor'); ?></th>
									<th><?php echo __('Almacen tipo'); ?></th>
									<th><?php echo __('Almacen'); ?></th>
									<th><?php echo __('Tipo'); ?></th>
									<th><?php echo __('Fecha'); ?></th>
									<th><?php echo __('Pagado'); ?></th>
									<th><?php echo __('Total'); ?></th>
									<th><?php echo __('Estado'); ?></th>
									<th class="actions"><?php echo __('Acción'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach($ventas as $venta): ?>
								<tr>
									<td><?php echo h($venta['Venta']['id']); ?>&nbsp;</td>
									<td><?php echo h($venta['Empresa']['razon_social']); ?></td>
									<td><?php echo h($venta['Empresasurcusale']['denominacion']); ?></td>
									<td><?php echo h($venta['Cliente']['nombre']); ?></td>
									<td><?php echo h($venta['User']['username']); ?></td>
									<td><?php echo h($venta['Almacentipo']['denominacion']); ?></td>
									<td><?php echo h($venta['Almacene']['nombre']); ?></td>
									<td><?php echo h($venta['Venta']['tipo']==1?"Venta":"Cortesia"); ?></td>
									<td><?php echo h($venta['Venta']['fecha']); ?></td>
									<td>
									<?php 
										//echo h($venta['Venta']['pagado']); 
									    if($venta['Venta']['tipo']==1){
	                                        if($venta['Venta']['pagado']==2){
													echo $this->Html->link(__('Pagar'), array('action' => 'pagar', $venta['Venta']['id']), array('class'=>'btn btn-danger'));
											}else{
	                                                echo "PAGADO";
											}
										}else{
											echo "GRATIS";
										}
									?>&nbsp;
									</td>
									<td><?php echo h($venta['Venta']['total']); ?>&nbsp;</td>
									<td><?php 
											      if($venta['Venta']['estado']==1){ echo "Registrado";

											}else if($venta['Venta']['estado']==2){ echo "Pendiente Autorizar";

											}else{  echo "Entregado";

											}
									?></td>
									<td class="actions">
										<?php 	
									        $empresa_id          = $this->Session->read('empresa_id'); 			 
									        $empresasurcusale_id = $this->Session->read('empresasurcusale_id'); 			 
									        $rol_id              = $this->Session->read('ROL'); 			 
									        $user_id             = $this->Session->read('USUARIO_ID'); 			
										?> 			
										<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $venta['Venta']['id']), array('class'=>'btn btn-primary')); ?>
										<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $venta['Venta']['id']),   array('class'=>'btn btn-success')); ?>
										<?php 
										      if($venta['Venta']['estado']!=3){
										      	echo $this->Html->link(__('Estado'), array('action' => 'cambiar', $venta['Venta']['id']),   array('class'=>'btn btn-warning'));
									          }
									    ?>
										<?php echo $this->Html->link(__('Eliminar'), array('action' => 'delete', $venta['Venta']['id']), array('class'=>'btn btn-danger', 'confirm'=>__('Esta seguro que desea eliminar el registro # %s?', $venta['Venta']['id']))); ?>
										<?php echo $this->Html->link(__('Reporte'), array('action' => 'reporte1', $venta['Venta']['id']),   array('class'=>'btn btn-warning'));?>
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
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11]
	                }
	            }
	        ],
		    columnDefs: [ 
		            {
		                targets: [0,1,2,3,4,7,8,9,10,11],
		                visible: true,
		                searchable: true
		            },
		            {
		            	targets: [0,1,2,3,4,7,8,9,10,11],
		            	visible: true,
		            	searchable: false
		            },
		            {
		            	targets: [5,6,11],
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
