<?php if(!isset($id)){ ?>
<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Grafica Pagos de Soltera'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Grafica Pagos de Soltera'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Pagos de Soltera'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Grafica', array('class'=>'form-horizontal', 'url'=>'/Graficas/grafica2/1')); ?>
					<div class='row'>
							<div class='col-md-12'>
							<?php
								echo'<div class="form-group">';
								echo'<label class="control-label col-md-2" for="Graficafecha_a">Fecha desde</label>';
								echo'<div class="col-md-9">';
								echo $this->Form->input('fecha_a', array('id'=>'Graficafecha_a', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'date2'));
								echo '</div>';
								echo '</div>';

								echo'<div class="form-group">';
								echo'<label class="control-label col-md-2" for="Graficafecha_b">Fecha hasta</label>';
								echo'<div class="col-md-9">';
								echo $this->Form->input('fecha_b', array('id'=>'Graficafecha_b', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'date2'));
								echo '</div>';
								echo '</div>';


							?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
	                                <div class="col-md-12">
	                                    <input value="Generar" class="btn btn-primary pull-right" type="submit">
	                                </div>
	                            </div>
                            </div>
					</div></form>                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<?php }else{ ?>
<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Grafica Pagos de Soltera'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Grafica Pagos de Soltera'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Pagos de Soltera'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php echo $this->Form->create('Empresa', array('class'=>'form-horizontal')); ?>
                    <div class='row'>
                            <div class='col-md-12'>
                            		<br><br><br>
                                    <?php
                                    // pr($ventadetalles);
                                    ?>
                            	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <script type="text/javascript">
                                // Create the chart

                               Highcharts.chart('container', {
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Grafica Pagos de Soltera fecha desde <?= $fecha_a ?> hasta <?= $fecha_b ?>'
                                    },
                                    subtitle: {
                                        text: ''
                                    },
                                    xAxis: {
                                        categories: [
                                            <?php
                                              foreach ($ventadetalles as $ventadetalle) {
                                                  echo "'".$ventadetalle[0]['deno_producto']."',";

                                              }
                                        ?>
                                        ],
                                        crosshair: true
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: 'Cantidad ventas'
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                        pointFormat:  '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                                      '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
                                        footerFormat: '</table>',
                                        shared: true,
                                        useHTML: true
                                    },
                                    plotOptions: {
                                        column: {
                                            pointPadding: 0.2,
                                            borderWidth: 0
                                        }
                                    },
                                    series: [{
                                        name: 'Cobrada',
                                        color: '#00FF00',
                                        data: [<?php
                                                      foreach ($ventadetalles as $ventadetalle) {
                                                          echo "".$ventadetalle[0]['pago'].",";

                                                      }
                                           ?>]

                                    }, {
                                        name: 'Pendiente por cobrar',
                                        color: '#FF0000'
                                        data: [<?php
                                                      foreach ($ventadetalles as $ventadetalle) {
                                                          echo "".$ventadetalle[0]['nopago'].",";

                                                      }
                                           ?>]

                                    }]
                                });
                            	</script>
                            	</div>
                                <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php echo $this->Html->link(__('Volver'), array('action' => 'grafica2')); ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<?php } ?>
