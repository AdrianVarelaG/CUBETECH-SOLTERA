<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
      <?php
            if(isset($title_for_layout_)){
                  echo $title_for_layout_;
            }else{
                  echo Configure::read('namesysT');
            }
      ?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?= $this->Html->templateinclude('/bootstrap/css/bootstrap.min.css', 'AdminLTE-2.3.0');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $this->Html->templateinclude('/bootstrap/css/font-awesome.css', 'AdminLTE-2.3.0');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= $this->Html->templateinclude('/bootstrap/css/ionicons.min.css', 'AdminLTE-2.3.0');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $this->Html->templateinclude('/dist/css/AdminLTE.css', 'AdminLTE-2.3.0');?>">

    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= $this->Html->templateinclude('/dist/css/skins/_all-skins.min.css', 'AdminLTE-2.3.0');?>">


    <!-- jQuery 2.1.4 -->
    <script src="<?= $this->Html->templateinclude('/plugins/jQuery/jQuery-2.1.4.min.js', 'AdminLTE-2.3.0');?>"></script>
    <!-- DataTable CSS -->
    <?php
    //echo $this->Html->css('datatable/jquery.dataTables.css');
    ?>
    <?php echo $this->Html->css('datatable/buttons.dataTables.min.css'); ?>
    <?php echo $this->Html->css('datatable/dataTables.bootstrap.min.css'); ?>
    <?php echo $this->Html->css('datatable/responsive.dataTables.min.css'); ?>
    <?php echo $this->Html->css('Adicionales.css'); ?>
    <!-- DataTable JS -->
    <?php echo $this->Html->script('datatable/jquery.dataTables.js'); ?>
    <?php echo $this->Html->script('datatable/dataTables.responsive.min.js'); ?>
    <?php echo $this->Html->script('datatable/dataTables.bootstrap.min.js'); ?>
    <?php echo $this->Html->script('datatable/dataTables.buttons.min.js'); ?>
    <?php echo $this->Html->script('datatable/dataTables.buttons.flash.min.js'); ?>
    <?php echo $this->Html->script('datatable/jszip.min.js'); ?>
    <?php echo $this->Html->script('datatable/pdfmake.min.js'); ?>
    <?php echo $this->Html->script('datatable/vfs_fonts.js'); ?>
    <?php echo $this->Html->script('datatable/buttons.html5.min.js'); ?>
    <?php echo $this->Html->script('datatable/buttons.print.min.js'); ?>



    <!-- Calendar JS -->
    <?php echo $this->Html->css('jquery-ui.css'); ?>
    <?php echo $this->Html->script('jquery-ui.min.js'); ?>
    <script type="text/javascript">
      jQuery(function($){
          $.datepicker.regional['es'] = {
              closeText: 'Cerrar',
              prevText: '&#x3c;Ant',
              nextText: 'Sig&#x3e;',
              currentText: 'Hoy',
              monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
              'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
              monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
              'Jul','Ago','Sep','Oct','Nov','Dic'],
              dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
              dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
              dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
              weekHeader: 'Sm',
              dateFormat: 'yy-mm-dd',
              firstDay: 1,
              isRTL: false,
              showMonthAfterYear: false,
              yearSuffix: ''};
          $.datepicker.setDefaults($.datepicker.regional['es']);
      });
  </script>
  <!-- Hora JS -->
  <?php echo $this->Html->css('wickedpicker.min.css'); ?>
  <?php echo $this->Html->script('wickedpicker.min.js'); ?>

   <!-- Hora JS -->
  <?php echo $this->Html->css('jquery.timepicker.css'); ?>
  <?php echo $this->Html->script('jquery.timepicker.js'); ?>

  <?php echo $this->Html->script('functions.js'); ?>


  <!-- highcharts JS -->
    <?php echo $this->Html->script('highcharts/highcharts.js'); ?>
    <?php echo $this->Html->script('highcharts/exporting.js'); ?>
    <?php echo $this->Html->script('highcharts/drilldown.js'); ?>
    <?php echo $this->Html->script('highcharts/data.js'); ?>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><?php echo Configure::read('namesysM'); ?></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo Configure::read('namesysS'); ?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu" >
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= $this->Html->templateinclude('/dist/img/avatar.png', 'AdminLTE-2.3.0');?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?= $_SESSION['USUARIO_NAME']; ?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      <?= $_SESSION['USUARIO_NAME']; ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <!--<div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>-->
                    <div class="pull-right">
                      <a href="<?= $this->Html->url('/Login/logout')?>" class="btn btn-default btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- =============================================== -->
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Opciones del sistema</li>
            <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-home"></i><span>Inicio</span></a></li>


            <li class="treeview" id="activa2">
              <a href="#">
                <i class="fa fa-paper-plane"></i> <span>Sucursales</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= $this->Html->url('/Empresasurcusales/')?>"><span>Sucursales</span></a></li>
              </ul>
            </li>

            <li class="treeview" id="activa4">
              <a href="#">
                <i class="fa fa-users"></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= $this->Html->url('/Clientes/')?>"><span>Clientes</span></a></li>
              </ul>
            </li>

            <li class="treeview" id="activa5">
              <a href="#">
                <i class="fa fa-building "></i> <span>Almacen/Inventario</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= $this->Html->url('/Almacentipos/')?>"><span>Catálogo de Tipos de Almacen</span></a></li>
                <li><a href="<?= $this->Html->url('/Almacenes/')?>"><span>Catálogo de Almacenes</span></a></li>
                <li><a href="<?= $this->Html->url('/Almacenusers/')?>"><span>Usuarios por Almacen</span></a></li>
                <li><a href="<?= $this->Html->url('/Almacenmateriales/')?>"><span>Catálgo de Materiales</span></a></li>
                <li><a href="<?= $this->Html->url('/Almacenmarcas/')?>"><span>Catálgo de Marcas</span></a></li>
                <li><a href="<?= $this->Html->url('/Almacenproductos/')?>"><span>Catálgo de Productos</span></a></li>
                <li><a href="<?= $this->Html->url('/Inventariomovimateriales/')?>"><span>Movimientos de Materiales</span></a></li>
                <li><a href="<?= $this->Html->url('/Inventariomovimientos/')?>"><span>Movimientos de Productos</span></a></li>
                <li><a href="<?= $this->Html->url('/Consulta/materiales')?>"><span>Consulta Inventario Materiales</span></a></li>
                <li><a href="<?= $this->Html->url('/Consulta/productos')?>"><span>Consulta Inventario Productos</span></a></li>
                <?php
                /*
                    <li><a href="<?= $this->Html->url('/Productotipos/')?>"><span>Productos tipo</span></a></li>
                    <li><a href="<?= $this->Html->url('/Productosubtipos/')?>"><span>Productos subtipo</span></a></li>
                    <li><a href="<?= $this->Html->url('/Productos/')?>"><span>Productos</span></a></li>
                    <li><a href="<?= $this->Html->url('/Inventarios/')?>"><span>Inventario</span></a></li>
                    <li><a href="<?= $this->Html->url('/Inventariomovis/')?>"><span>Inventario movimientos</span></a></li>
                */
                ?>
              </ul>
            </li>

            <li class="treeview" id="activa6">
              <a href="#">
                <i class="fa fa-calculator"></i> <span>Ventas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= $this->Html->url('/Ventas/')?>">Ventas</a></li>
              </ul>
            </li>


            <li class="treeview" id="activa7">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= $this->Html->url('/Reportes/reporte1')?>">Stock total </a></li>
              </ul>
            </li>


            <li class="treeview" id="activa8">
              <a href="#">
                <i class="fa fa-line-chart"></i> <span>Graficas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= $this->Html->url('/Graficas/grafica1')?>">Ventas anuales Soltera </a></li>
                <li><a href="<?= $this->Html->url('/Graficas/grafica2')?>">Pagos de Soltera </a></li>
                <li><a href="<?= $this->Html->url('/Graficas/grafica3')?>">Ventas por vendedor</a></li>
                <li><a href="<?= $this->Html->url('/Graficas/grafica4')?>">Stock de materiales</a></li>
                <li><a href="<?= $this->Html->url('/Graficas/grafica5')?>">Stock de productos</a></li>
              </ul>
            </li>



            <li class="treeview" id="activa3">
              <a href="#">
                <i class="fa fa-user-o"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= $this->Html->url('/Users/')?>">Usuarios</a></li>
              </ul>
            </li>
            <li class="header" id="activa1">Configuración</li>
            <li class="treeview" id="activa1">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                    <a href="#"><span>Parametros</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?= $this->Html->url('/Direpais/')?>"><span>Pais</span></a></li>
                        <li><a href="<?= $this->Html->url('/Direprovincias/')?>"><span>Estado</span></a></li>
                        <li><a href="<?= $this->Html->url('/Dirmunicipios/')?>"><span>Municipio</span></a></li>
                    </ul>
                </li>
                <li><a href="<?= $this->Html->url('/Empresas/')?>"><i class="fa fa-circle-o text-red"></i> <span>Empresas</span></a></li>
                <?php /* <li><a href="<?= $this->Html->url('/Modulos/')?>"><i class="fa fa-circle-o text-blue"></i> <span>Modulos</span></a></li> */ ?>
                <li><a href="<?= $this->Html->url('/Roles/')?>"><i class="fa fa-circle-o text-green"></i> <span>Roles</span></a></li>
                <li><a href="<?= $this->Html->url('/Rolemodulos/')?>"><i class="fa fa-circle-o text-blue"></i> <span>Roles modulos</span></a></li>
              </ul>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- =============================================== -->

      <!-- Bootstrap 3.3.5 -->
      <script src="<?= $this->Html->templateinclude('/bootstrap/js/bootstrap.min.js', 'AdminLTE-2.3.0');?>"></script>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php echo $this->Flash->render(); ?>
        <?php echo $this->fetch('content'); ?>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer hidden-xs">
        <div class="row">
            <div class="col-sm-4"><strong>Copyright &copy; 2016-2017.</strong> All rights reserved.</div>
            <div class="col-sm-4 text-center"><strong>Powered by <a href="http://cubetechnologies.com.mx">Cube Technologies</a></strong></div>
            <div class="col-sm-4 text-right"><strong>Version</strong> 1.0.0</div>
        </div>
      </footer>

 </div><!-- ./wrapper -->


    <?php
    if(isset($_SESSION["MODULO_ACTIVO"])){
     echo "<script> $('#activa".$_SESSION["MODULO_ACTIVO"]."').addClass('active'); </script>";
    }
    ?>
      <?php echo $this->Html->script('Adicionales.js'); ?>
    <!-- SlimScroll -->
    <script src="<?= $this->Html->templateinclude('/plugins/slimScroll/jquery.slimscroll.min.js', 'AdminLTE-2.3.0');?>"></script>
    <!-- FastClick -->
    <script src="<?= $this->Html->templateinclude('/plugins/fastclick/fastclick.min.js', 'AdminLTE-2.3.0');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= $this->Html->templateinclude('/dist/js/app.min.js', 'AdminLTE-2.3.0');?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= $this->Html->templateinclude('/dist/js/demo.js', 'AdminLTE-2.3.0');?>"></script>

    <!-- highcharts JS -->
    <?php
     //echo $this->Html->script('highcharts/highcharts.js');
    ?>
    <?php echo $this->Html->script('highcharts/exporting.js'); ?>
    <?php echo $this->Html->script('highcharts/drilldown.js'); ?>
    <?php echo $this->Html->script('highcharts/data.js'); ?>

  </body>
</html>
