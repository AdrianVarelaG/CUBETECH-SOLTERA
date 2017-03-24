<?php if(!isset($id)){ ?>
<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Reporte Stock total'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Reporte Stock total'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box"> 
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Reporte Stock total'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Reporte', array('class'=>'form-horizontal', 'url'=>'/Reportes/reporte1/1')); ?>
					<div class='row'>
							<div class='col-md-12'>
							<?php
								    echo '<div class="form-group">'; 
                                    echo '<label class="control-label col-md-2" for="Reporteempresa_id">Empresa</label>';       
                                    echo '<div class="col-md-9">';           
                                    echo $this->Form->input('empresa_id', array('id'=>'Reporteempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));        
                                    echo '</div>';  
                                    echo '</div>';
                                        
                                    echo '<div class="form-group">'; 
                                    echo '<label class="control-label col-md-2" for="Reporteempresasurcusale_id">Sucursal</label>';     
                                    echo '<div class="col-md-9">';           
                                    echo $this->Form->input('empresasurcusale_id', array('id'=>'Reporteempresasurcusale_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));      
                                    echo '</div>';  
                                    echo '</div>';
                                        
                                    echo '<div class="form-group">'; 
                                    echo '<label class="control-label col-md-2" for="Reportealmacentipo_id">Almacen tipo</label>';      
                                    echo '<div class="col-md-9">';           
                                    echo $this->Form->input('almacentipo_id', array('empty'=>'--Seleccione--','id'=>'Reportealmacentipo_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', "onChange"=>"selectTagRemote('".$this->Html->url('/Reportes/almacen')."', 'div-almacen', this.value);"));     
                                    echo '</div>';  
                                    echo '</div>';
                                        
                                    echo '<div class="form-group">'; 
                                    echo '<label class="control-label col-md-2" for="Reportealmacene_id">Almacen</label>';      
                                    echo '<div class="col-md-9" id="div-almacen">';          
                                    echo $this->Form->input('almacene_id', array('id'=>'Reportealmacene_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));      
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
<?php }else{
class fpdfview extends FPDF{
	function Footer(){}
	function Header(){

		
	}
}
$fpdf = new fpdfview('P','mm','A4');
$fpdf->AddPage();
$fpdf->Ln(5);
$fpdf->SetFont('Arial','B',22);
$fpdf->Cell(0,5,"STOCK TOTAL",'',1,'C');
$fpdf->Ln(2);
$fpdf->SetFont('Arial','',8);
$fpdf->Cell(0,5,"ORDENADOS POR NOMBRES",'',1,'C');
$fpdf->Ln(3);
$fpdf->SetFont('Arial','',6);
$fpdf->Cell(25,5,"TIPO ALMACE",'LTB',0,'C');
$fpdf->Cell(25,5,"ALMACEN",'TB',0,'C');
$fpdf->Cell(45,5,"PRODUCTO",'TB',0,'C');
$fpdf->Cell(25,5,"STOCK",'TB',0,'C');
$fpdf->Cell(25,5,"TRANSITO",'TB',0,'C');
$fpdf->Cell(25,5,"DISPONIBLE",'TB',0,'C');
$fpdf->Cell(0,5,"CAJA",'TBR',1,'C');
  //pr($inventariomovimientos);
  //pr($ventadetalles);
  //pr($almacenmarcas);
foreach ($inventariomovimientos as $inventariomovimiento) {
	$fpdf->Cell(25,5,$inventariomovimiento[0]['deno_almacentipos'],'LTB',0,'C');
	$fpdf->Cell(25,5,$inventariomovimiento[0]['deno_almacenes'],'TB',0,'C');
	$fpdf->Cell(45,5,$inventariomovimiento[0]['deno_almacenproductos'],'TB',0,'C');
	$fpdf->Cell(25,5,$inventariomovimiento[0]['entrada']-$inventariomovimiento[0]['salida'],'TB',0,'C');
    $transito = 0;
    $marca    = 0;
    foreach ($ventadetalles as $ventadetalle) {
      if($inventariomovimiento['Inventariomovimiento']['almacentipo_id']     == $ventadetalle['Venta']['almacentipo_id'] &&
         $inventariomovimiento['Inventariomovimiento']['almacene_id']        == $ventadetalle['Venta']['almacene_id'] &&
         $inventariomovimiento['Inventariomovimiento']['almacenproducto_id'] == $ventadetalle['Ventadetalle']['almacenproducto_id']
        ){
            $transito = $ventadetalle[0]['cantidad'];
            foreach ($almacenmarcas as $almacenmarca) {
                if($almacenmarca['Almacenmarca']['id'] == $ventadetalle[0]['almacenmarca_id']){
                    foreach ($almacenmarca['Almacenmarcadetalle'] as $almacenmarcadetalle) {
                        if($almacenmarcadetalle['default']==1){
                           $marca = $almacenmarcadetalle['cantidad'];
                        }
                    }
                }
            }
      }
    }
	$fpdf->Cell(25,5,$transito,'TB',0,'C');
	$fpdf->Cell(25,5,(($inventariomovimiento[0]['entrada']-$inventariomovimiento[0]['salida']) - $transito),'TB',0,'C');
    if($marca!=0){
                   $fpdf->Cell(0,5, (($inventariomovimiento[0]['entrada']-$inventariomovimiento[0]['salida'])/$marca) ,'TBR',1,'C');
    }else{
                   $fpdf->Cell(0,5, '0' ,'TBR',1,'C');
    }
	
}
//pr($ventadetalles);
$fpdf->Output('D',$name);
} 
?>



