<?php
class fpdfview extends FPDF{
	function Footer(){}
	function Header(){

		
	}
}
//pr($datas);
$fpdf = new fpdfview('P','mm','A4');
$fpdf->AddPage();

$fpdf->Ln(5);
$fpdf->SetFont('Arial','B',22);
$fpdf->Cell(0,5,"IMPRESIÓN VENTA",'',1,'C');
$fpdf->Ln(5);

$fpdf->SetFont('Arial','',7);
$fpdf->Cell(18,20,"CLIENTE:",'LT',0,'L');
$fpdf->Cell(1,20,"",'T',0);//margen izquierdo
    $varX = $fpdf->GetX();//capturo X
    $varY = $fpdf->GetY();//capturo Y
    $fpdf->Cell(150,0,"",'T',2);
    $fpdf->MultiCell(150,4,trim($datas[0]['Venta']['informacion']),'','L');//Concepto Orden de Pago
    $varX = $varX+150;//le sumo a X ---> 180.
    $fpdf->SetXY($varX,$varY);// cargo XY
$fpdf->Cell(0,20,"",'TR',1);//margen derecho

$fpdf->SetFont('Arial','',7);
$fpdf->Cell(18,8,"VENDEDOR:",'L',0,'L');
//$fpdf->SetFont('Arial','',9);
$fpdf->Cell(0,8, $datas[0]['User']['nombres_apellidos'],'R',1,'L');

$fpdf->SetFont('Arial','',7);
$fpdf->Cell(18,8,"ALMACEN:",'L',0,'L');
//$fpdf->SetFont('Arial','',9);
$fpdf->Cell(0,8, $datas[0]['Almacene']['nombre'],'R',1,'L');


$fpdf->SetFont('Arial','',7);
$fpdf->Cell(18,8,"TIPO:",'L',0,'L');
//$fpdf->SetFont('Arial','',9);
$fpdf->Cell(0,8, $datas[0]['Venta']['tipo']==1?"Venta":"Cortesia",'R',1,'L');


$fpdf->SetFont('Arial','',7);
$fpdf->Cell(18,8,"FECHA:",'BL',0,'L');
//$fpdf->SetFont('Arial','',9);
$fpdf->Cell(0,8, $datas[0]['Venta']['fecha'],'BR',1,'L');

$fpdf->Ln(5);
$fpdf->SetFont('Arial','',6);
$fpdf->Cell(35,5,"PRODUCTO",'LTB',0,'C');
$fpdf->Cell(35,5,"CANTIDAD",'TBL',0,'C');
$fpdf->Cell(45,5,"PRECIO UNITARIO",'TBL',0,'C');
$fpdf->Cell(35,5,"EMBALAJE",'TBL',0,'C');
$fpdf->Cell(0,5,"TOTAL",'TBRL',1,'C');  
$total = 0;
foreach ($datas[0]['Ventadetalle'] as $ventadetalle) {
    $fpdf->Cell(35,5,$ventadetalle['Almacenproducto']['nombre'],'BL',0,'R');
    $fpdf->Cell(35,5,$ventadetalle['cantidad'],'LB',0,'R');

    if($datas[0]['Venta']['tipo']==1){
        $fpdf->Cell(45,5,$ventadetalle['precio'],'LB',0,'R');
    }else{
        $fpdf->Cell(45,5,"Cortesia",'LB',0,'R');
        $ventadetalle['total'] = 0;
    }

    $fpdf->Cell(35,5,(isset($ventadetalle['Almacenmateriale']['nombre'])?$ventadetalle['Almacenmateriale']['nombre']:"" ),'LB',0,'R');
    $fpdf->Cell(0,5,$ventadetalle['total'],'LRB',1,'R');
    $total += $ventadetalle['total'];
}
    $fpdf->Cell(35,5,"",'LTB',0,'C');
    $fpdf->Cell(35,5,"",'TB',0,'C');
    $fpdf->Cell(45,5,"",'TB',0,'C');
    $fpdf->Cell(35,5,"TOTAL",'TB',0,'R');
    $fpdf->Cell(0,5,$total,'LTBR',1,'R');
$fpdf->Output('D',$name);
?>