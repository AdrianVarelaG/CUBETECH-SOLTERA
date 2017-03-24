<?php if(!isset($id)){ ?>
<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Grafica Ventas por vendedor'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Grafica Ventas por vendedor'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box"> 
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Ventas por vendedor'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Grafica', array('class'=>'form-horizontal', 'url'=>'/Graficas/grafica3/1')); ?>
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
    <small><?php echo __('Grafica Ventas por vendedor'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Grafica Ventas por vendedor'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Ventas por vendedor'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php echo $this->Form->create('Empresa', array('class'=>'form-horizontal')); ?>
                    <div class='row'>
                            <div class='col-md-12'>
                            <?php //pr($ventas ); ?>
                            		<br><br><br>
                            	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <script type="text/javascript">
                                // Create the chart
                               Highcharts.chart('container', {
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Grafica Ventas por vendedor fecha desde <?= $fecha_a ?> hasta <?= $fecha_b ?>'
                                    },
                                    xAxis: {
                                        categories: [
                                        <?php 
                                              foreach ($ventas as $venta) {
                                                  echo "'".$venta[0]['deno_user']."',";

                                              }
                                        ?>
                                        ]
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text:'Total fruit consumption'
                                        }
                                    },
                                    tooltip: {
                                        pointFormat:'<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                                        shared: true
                                    },
                                    plotOptions: {
                                        column: {
                                            stacking: 'percent'
                                        }
                                    },
                                    series: [{
                                        name:'Pendiente por cobrar',
                                        data:[<?php 
                                                      foreach ($ventas as $venta) {
                                                          echo "".$venta[0]['nopago'].",";

                                                      }
                                           ?>]
                                    }, 
                                    {   name:'Cobradas',
                                        data:[<?php 
                                                      foreach ($ventas as $venta) {
                                                          echo "".$venta[0]['pago'].",";

                                                      }
                                           ?>]
                                    }]
                                });
                            	</script>
                            	</div>
                                <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php echo $this->Html->link(__('Volver'), array('action' => 'grafica3')); ?>    
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



