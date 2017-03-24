<?php if(!isset($id)){ ?>
<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Grafica Stock de productos'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Grafica Stock de productos'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box"> 
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Stock de productos'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Grafica', array('class'=>'form-horizontal', 'url'=>'/Graficas/grafica5/1')); ?>
					<div class='row'>
							<div class='col-md-12'>
							<?php
    								echo'<div class="form-group">'; 
                                    echo'<label class="control-label col-md-2" for="Graficaempresa_id">Empresa</label>';       
                                    echo'<div class="col-md-9">';           
                                    echo $this->Form->input('empresa_id', array('id'=>'Graficaempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));        
                                    echo '</div>';  
                                    echo '</div>';
                                        
                                    echo'<div class="form-group">'; 
                                    echo'<label class="control-label col-md-2" for="Graficaempresasurcusale_id">Sucursal</label>';     
                                    echo'<div class="col-md-9">';           
                                    echo $this->Form->input('empresasurcusale_id', array('id'=>'Graficaempresasurcusale_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));      
                                    echo '</div>';  
                                    echo '</div>';
                                        
                                    echo'<div class="form-group">'; 
                                    echo'<label class="control-label col-md-2" for="Graficaalmacentipo_id">Almacen tipo</label>';      
                                    echo'<div class="col-md-9">';           
                                    echo $this->Form->input('almacentipo_id', array('empty'=>'--Seleccione--','id'=>'Graficaalmacentipo_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Graficas/almacen')."', 'div-almacen', this.value);"));     
                                    echo '</div>';  
                                    echo '</div>';
                                        
                                    echo'<div class="form-group">'; 
                                    echo'<label class="control-label col-md-2" for="Graficaalmacene_id">Almacen</label>';      
                                    echo'<div class="col-md-9" id="div-almacen">';          
                                    echo $this->Form->input('almacene_id', array('id'=>'Graficaalmacene_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));      
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
    <small><?php echo __('Grafica Stock de productos'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Grafica Stock de productos'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Stock de productos'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php echo $this->Form->create('Empresa', array('class'=>'form-horizontal')); ?>
                    <div class='row'>
                            <div class='col-md-12'>
                            		<br><br><br>
                            	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <script type="text/javascript">
                                // Create the chart
                               Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                    return {
                                        radialGradient: {
                                            cx: 0.5,
                                            cy: 0.3,
                                            r: 0.7
                                        },
                                        stops: [
                                            [0, color],
                                            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                        ]
                                    };
                                });

                                // Build the chart
                                Highcharts.chart('container', {
                                    chart: {
                                        plotBackgroundColor: null,
                                        plotBorderWidth: null,
                                        plotShadow: false,
                                        type: 'pie'
                                    },
                                    title: {
                                        text: 'Grafica Stock de productos'
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            dataLabels: {
                                                enabled: true,
                                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                style: {
                                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                },
                                                connectorColor: 'silver'
                                            }
                                        }
                                    },
                                    series: [{
                                        name: 'Productos',
                                        data:[
                                                <?php  $total = 0;
                                                       foreach($inventariomovimientos as $inventariomovimiento){
                                                           $total += ($inventariomovimiento[0]['entrada']-$inventariomovimiento[0]['salida']);
                                                       }
                                                ?>
                                                <?php  foreach($inventariomovimientos as $inventariomovimiento):
                                                           $cantidad   = ($inventariomovimiento[0]['entrada']-$inventariomovimiento[0]['salida']);
                                                           if($total==0){
                                                                   $porcentaje = 0;
                                                           }else{  
                                                                   $porcentaje = (($cantidad * 100)/$total);
                                                           }
                                                           echo "{ name:'".$inventariomovimiento[0]['deno_almacenproductos']." - Cantidad: ".$cantidad." ', y: ".$porcentaje." },";
                                                       endforeach; 
                                                 ?>
                                             ]
                                    }]
                                });
                            	</script>
                            	</div>
                                <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php echo $this->Html->link(__('Volver'), array('action' => 'grafica5')); ?>    
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



