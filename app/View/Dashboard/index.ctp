<section class="content-header">
  <h1>
    Sistema de gestión

  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
  </ol>
</section>

<?php
  echo $this->element('InventarioProductos');
  echo $this->Html->script('InventarioProducto.js');
?>

<?php
  echo $this->element('InventarioMateriales');
  echo $this->Html->script('InventarioMateriales.js');
?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Ventas mensual Soltera'); ?></h3>
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
                                            text: 'Grafica Ventas anuales Soltera'
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
                                            valueSuffix: ''
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
                                            y: 50,
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
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<br>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Pagos mensual de Soltera'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php echo $this->Form->create('Empresa', array('class'=>'form-horizontal')); ?>
                    <div class='row'>
                            <div class='col-md-12'>
                                    <br><br><br>
                                <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <script type="text/javascript">
                                // Create the chart
                               Highcharts.chart('container2', {
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Grafica Pagos de Soltera'
                                    },
                                    subtitle: {
                                        text: ''
                                    },
                                    xAxis: {
                                        categories: [
                                            <?php
                                              foreach ($ventadetalles2 as $ventadetalle2) {
                                                  echo "'".$ventadetalle2[0]['deno_producto']."',";

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
                                        data: [<?php
                                                      foreach ($ventadetalles2 as $ventadetalle2) {
                                                          echo "".$ventadetalle2[0]['pago'].",";

                                                      }
                                           ?>]

                                    }, {
                                        name: 'Pendiente por cobrar',
                                        data: [<?php
                                                      foreach ($ventadetalles2 as $ventadetalle2) {
                                                          echo "".$ventadetalle2[0]['nopago'].",";

                                                      }
                                           ?>]

                                    }]
                                });
                                </script>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Grafica Ventas por vendedor mensual'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php echo $this->Form->create('Empresa', array('class'=>'form-horizontal')); ?>
                    <div class='row'>
                            <div class='col-md-12'>
                            <?php //pr($ventas3 ); ?>
                                    <br><br><br>
                                <div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <script type="text/javascript">
                                // Create the chart
                               Highcharts.chart('container3', {
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Grafica Ventas por vendedor mensual'
                                    },
                                    xAxis: {
                                        categories: [
                                        <?php
                                              foreach ($ventas3 as $venta3) {
                                                  echo "'".$venta3[0]['deno_user']."',";

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
                                                      foreach ($ventas3 as $venta3) {
                                                          echo "".$venta3[0]['nopago'].",";

                                                      }
                                           ?>]
                                    },
                                    {   name:'Cobradas',
                                        data:[<?php
                                                      foreach ($ventas3 as $venta3) {
                                                          echo "".$venta3[0]['pago'].",";

                                                      }
                                           ?>]
                                    }]
                                });
                                </script>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
