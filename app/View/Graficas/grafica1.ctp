<?php if(!isset($id)){ ?>
<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Grafica Ventas anuales Soltera'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Grafica Ventas anuales Soltera'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box"> 
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Ventas anuales Soltera'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Grafica', array('class'=>'form-horizontal', 'url'=>'/Graficas/grafica1/1')); ?>
					<div class='row'>
							<div class='col-md-12'>
							<?php
    								echo'<div class="form-group">';	
    								echo'<label class="control-label col-md-2" for="Graficaano">Año</label>';		
    								echo'<div class="col-md-9">';			
    								echo $this->Form->input('year', array('value'=>date("Y"), 'id'=>'Graficaano', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'number'));		
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
    <small><?php echo __('Grafica Ventas anuales Soltera'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Grafica Ventas anuales Soltera'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Ventas anuales Soltera'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <?php //pr($ventadetalles); ?>
                <div class="box-body">
                    <?php echo $this->Form->create('Empresa', array('class'=>'form-horizontal')); ?>
                    <div class='row'>
                            <div class='col-md-12'>
                            		<br><br><br>
                            	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <script type="text/javascript">
                                // Create the chart
                                <?php //pr($ventadetalles); ?>
                                Highcharts.chart('container', {
                                        chart: {
                                            type: 'bar'
                                        },
                                        title: {
                                            text: 'Grafica Ventas anuales Soltera año <?= $year ?>'
                                        },
                                        subtitle: {
                                            text: 'Cerverzas vendidas'
                                        },
                                        xAxis: {
                                            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Obctubre', 'Noviembre', 'Diciembre'],
                                            title: {
                                                text: null
                                            }
                                        },
                                        yAxis: {
                                            min: 0,
                                            title: {
                                                text: 'Cantidad',
                                                align: 'high'
                                            },
                                            labels: {
                                                overflow: 'justify'
                                            }
                                        },
                                        tooltip: {
                                            valueSuffix: ' '
                                        },
                                        plotOptions: {
                                            bar: {
                                                dataLabels: {
                                                    enabled: true
                                                }
                                            }
                                        },
                                        legend: {
                                            layout: 'vertical',
                                            align: 'right',
                                            verticalAlign: 'top',
                                            x: -40,
                                            y:  50,
                                            floating: false,
                                            borderWidth: 1,
                                            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                                            shadow: true
                                        },
                                        credits: {
                                            enabled: false
                                        },
                                        series: [<?php 
                                                      foreach ($ventadetalles as $ventadetalle){
                                                          echo "{ ";
                                                          echo "  name: '".$ventadetalle[0]['deno_producto']."' ,";
                                                          echo "  data: [".$ventadetalle[0]['pago_ene'].", ".$ventadetalle[0]['pago_feb'].", ".$ventadetalle[0]['pago_mar'].", ".$ventadetalle[0]['pago_abr'].", ".$ventadetalle[0]['pago_may'].", ".$ventadetalle[0]['pago_jun'].", ".$ventadetalle[0]['pago_jul'].", ".$ventadetalle[0]['pago_ago'].", ".$ventadetalle[0]['pago_sep'].", ".$ventadetalle[0]['pago_obc'].", ".$ventadetalle[0]['pago_nov'].", ".$ventadetalle[0]['pago_dic']."   ]";
                                                          echo "}, ";

                                                      }
                                                ?>]
                                });
                            	</script>
                            	</div>
                                <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php echo $this->Html->link(__('Volver'), array('action' => 'grafica1')); ?>    
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



