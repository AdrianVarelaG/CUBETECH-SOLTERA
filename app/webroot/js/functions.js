///////CLIENTE////////
function validar_nombre_cliente(){
        $.ajax({
                  url:"/Clientes/nombre/",
                  type:"post",
                  data:{
                        nombre:$('#Clientenombre').val(),
                      },
                  success:function(n){
                      if(n!='0'){
                            alert("Para el nombre elejido ya se encuentra registrado");
                            $('input[type="submit"]').attr('disabled','disabled');
                      }else{
                            $('input[type="submit"]').removeAttr('disabled');
                      }
                  }
        });
}
///////ALMACEN////////
function validar_nombre_almacen(){
        $.ajax({
                  url:"/Almacenes/nombre/",
                  type:"post",
                  data:{
                        nombre:$('#Almacenenombre').val(),
                      },
                  success:function(n){
                      if(n!='0'){
                            alert("Para el nombre elejido ya se encuentra registrado");
                            $('input[type="submit"]').attr('disabled','disabled');
                      }else{
                            $('input[type="submit"]').removeAttr('disabled');
                      }
                  }
        });
}
///////ALMACEN AMTERIAL////////
function validar_nombre_almacenmaterial(){
        $.ajax({
                  url:"/Almacenmateriales/nombre/",
                  type:"post",
                  data:{
                        nombre:$('#Almacenmaterialenombre').val(),
                      },
                  success:function(n){
                      if(n!='0'){
                            alert("Para el nombre elejido ya se encuentra registrado");
                            $('input[type="submit"]').attr('disabled','disabled');
                      }else{
                            $('input[type="submit"]').removeAttr('disabled');
                      }
                  }
        });
}
///////VALIDAR RFC////////
function validar_nombre_rfc(){
        $.ajax({
                  url:"/Clientes/rfc/",
                  type:"post",
                  data:{
                        rfc:$('#Clienterfc').val(),
                      },
                  success:function(n){
                      if(n!='0'){
                            if($('#Clienterequiere_factura1').prop('checked')) {
                              alert("El formato es incorrecto");
                              $('input[type="submit"]').attr('disabled','disabled');
                            }else{
                              $('input[type="submit"]').removeAttr('disabled');
                            }
                      }else{
                            $('input[type="submit"]').removeAttr('disabled');
                      }
                  }
        });
}
///////ALMACEN MARCAS////////
function validar_nombre_almacenmarcas(){
        $.ajax({
                  url:"/Almacenmarcas/nombre/",
                  type:"post",
                  data:{
                        nombre:$('#Almacenmarcanombre').val(),
                      },
                  success:function(n){
                      if(n!='0'){
                            alert("Para el nombre elejido ya se encuentra registrado");
                            $('input[type="submit"]').attr('disabled','disabled');
                      }else{
                            $('input[type="submit"]').removeAttr('disabled');
                      }
                  }
        });
}
///////ALMACEN PRODUCTOS////////
function validar_nombre_almacenproductos(){
        $.ajax({
                  url:"/Almacenproductos/nombre/",
                  type:"post",
                  data:{
                        nombre:$('#Almacenproductonombre').val(),
                      },
                  success:function(n){
                      if(n!='0'){
                            alert("Para el nombre elejido ya se encuentra registrado");
                            $('input[type="submit"]').attr('disabled','disabled');
                      }else{
                            $('input[type="submit"]').removeAttr('disabled');
                      }
                  }
        });
}

function activar_almacenfuente(){
   var a = $('#Inventariomovimientotipo').val();
         if(eval(a)==eval(1)){ $('#tipo_fuente').hide();

   }else if(eval(a)==eval(2)){ $('#tipo_fuente').hide();

   }else if(eval(a)==eval(3)){ $('#tipo_fuente').show();

   }
}


function activa_requiere_factura(a){
  // var a = $('#'+id).val();
   //alert(a);
    $('input[type="submit"]').removeAttr('disabled');
   if(eval(a)==eval(1)){
            $('#Clienterazon_social').attr('required','required');
            $('#Clientecalle').attr('required','required');
            $('#Clientenumero_exterior').attr('required','required');
            //$('#Clientenumero_interior').attr('required','required');
            $('#Clientecod_postal').attr('required','required');
            $('#Clienterfc').attr('required','required');
            $('#Clientedirepai_id').attr('required','required');
            $('#Clientedireprovincia_id').attr('required','required');
            $('#Clientedirmunicipio_id').attr('required','required');
   }else{
            $('#Clienterazon_social').removeAttr('required');
            $('#Clientecalle').removeAttr('required');
            $('#Clientenumero_exterior').removeAttr('required');
            //$('#Clientenumero_interior').removeAttr('required');
            $('#Clientecod_postal').removeAttr('required');
            $('#Clienterfc').removeAttr('required');
            $('#Clientedirepai_id').removeAttr('required');
            $('#Clientedireprovincia_id').removeAttr('required');
            $('#Clientedirmunicipio_id').removeAttr('required');
   }
   
}
///////FIN CLIENTE////


function generar_comanda(id, url){
   $.ajax({
            type: 'POST',
            url: url,
            data: $(id).serialize(),
            success: function(data) {
              if(data=='1'){
                     $(id).submit();
                     return true;
              }else{
                     alert(data);
                     return false;
              }
            }
        });
}

function  limit_reporte_ven_p(){
       var t = $('#Ingredientestockplato_id').val();
        if(t==0){
          $('#limit').show();
  }else{
          $('#limit').hide();
  }
}

function  limit_reporte_ven(){
       var t = $('#Ingredientestockingrediente_id').val();
        if(t==0){
          $('#limit').show();
  }else{
          $('#limit').hide();
  }
}

function precio_movi_stock(){
       var t = $('#Ingredientestockmovimovimiento').val();
        if(t==1){
          $('#precio').show();
  }else if(t==2){
          $('#precio').hide();
  }
}

function pago_carlcular(){
  var c = $('#contarcampos').val();
  var t = 0;
  for (var i = 0; i <= c; i++) {
    cantidad     = $('#pago_'+i+'__cantidad').val();
    cantidad_tmp = $('#pago_'+i+'__cantidad_tmp').val();
   // cantidad = retornar_valor_calculo(cantidad);
    //alert(cantidad);
    if(eval(cantidad)>eval(cantidad_tmp)){
       alert("La cantidad es mayor a la restante");
       cantidad = cantidad_tmp;
       $('#pago_'+i+'__cantidad').val(cantidad_tmp);
    }
    if(cantidad==''){
        cantidad = cantidad_tmp;
        $('#pago_'+i+'__cantidad').val(cantidad_tmp); 
    }
    precio   = $('#pago_'+i+'__precio_tmp').val();
    valor    = eval(cantidad) * eval(precio);
    $('#pago_'+i+'__precio').val(valor);
    t = eval(t) + eval(valor);
  }
  $('#Pagototal').val(t);
}
function solonumeros_con_punto(e){
   ncomas = new Array(0,0);
   tecla_codigo = (document.all) ? e.keyCode : e.which;
   //alert(tecla_codigo);
   if(tecla_codigo==8 || tecla_codigo==0 || tecla_codigo==13 || tecla_codigo==46 /*|| tecla_codigo==45*/){
     if(tecla_codigo==46){
          if(document.getElementById(e.target.id).value.length==0){
              document.getElementById(e.target.id).value=document.getElementById(e.target.id).value+'0.';
          }else{
              document.getElementById(e.target.id).value=document.getElementById(e.target.id).value+'.';
          }
               document.getElementById(e.target.id).value=document.getElementById(e.target.id).value.replace("..",".");
               for (i=0; i < document.getElementById(e.target.id).value.length; i++){
                 letra = document.getElementById(e.target.id).value.charAt(i);
                 ncomas[0] = (letra==".")? ncomas[0] + 1: ncomas[0];
               }
               for(i=1;i<=ncomas[0]-1;i++){
                  document.getElementById(e.target.id).value=document.getElementById(e.target.id).value.replace(",","");
               }

               return false;
      }
      /*if(tecla_codigo==45){
         if(document.getElementById(e.target.id).value.length==0){
              document.getElementById(e.target.id).value=document.getElementById(e.target.id).value+'-';
          }else{
              document.getElementById(e.target.id).value=document.getElementById(e.target.id).value+'-';
          }
               document.getElementById(e.target.id).value=document.getElementById(e.target.id).value.replace("--","-");
               for (i=0; i < document.getElementById(e.target.id).value.length; i++){
                 letra = document.getElementById(e.target.id).value.charAt(i);
                 ncomas[1] = (letra=="-")? ncomas[1] + 1: ncomas[1];
               }
               for(i=1;i<=ncomas[1];i++){
                  document.getElementById(e.target.id).value=document.getElementById(e.target.id).value.replace("-","");
               }
               document.getElementById(e.target.id).value="-"+document.getElementById(e.target.id).value;
         return false;
     }*/
      return true;
   }
   patron =/[0-9]/;
   tecla_valor = String.fromCharCode(tecla_codigo);
   return patron.test(tecla_valor);

}//fin solo numeros con punto
function solonumeros(e){
 /**var key=tecla ? evt.which:evt.keyCode;
 return (key==13 || (key>=48 && key<=57));*/

  tecla_codigo = (document.all) ? e.keyCode : e.which;
  if(tecla_codigo==8 || tecla_codigo==0 || tecla_codigo==13)return true;
  patron =/[0-9\-]/;
  tecla_valor = String.fromCharCode(tecla_codigo);
  return patron.test(tecla_valor);
}

function retornar_valor_calculo(monto){
  var var_aux = monto+'';
  var str     = var_aux;
  var acepta  = "no";
  for(i=0; i<var_aux.length; i++){
   ch = var_aux.charAt(i);
   if(ch==","){acepta  = "si";}
  }
  if(acepta=="si"){
    for(i=0; i<var_aux.length; i++){str = str.replace('.','');}
    str   = str.replace(',','.');
  }
  var var_aux = str;
  return var_aux;
}//fin funtion

$(document).ready(function() {
    $('.pasar').click(function() { return !$('#origen option:selected').remove().appendTo('#destino'), cantidad_multiple_habitaciones();  });  
    $('.quitar').click(function() { return !$('#destino option:selected').remove().appendTo('#origen'), cantidad_multiple_habitaciones(); });
    $('.pasartodos').click(function() { $('#origen option').each(function() { $(this).remove().appendTo('#destino'); }); cantidad_multiple_habitaciones(); });
    $('.quitartodos').click(function() { $('#destino option').each(function() { $(this).remove().appendTo('#origen'); }); cantidad_multiple_habitaciones();  });
  });


function compra_pago(){
   var t = $('#Compraabonacompratipopago_id').val();
        if(t==1){
          $('#Reserindivistatuscheque_v').hide();
          $('#Reserindivistatuscheque2_v').hide();
          $('#Reserindivistatustransferencia_v').hide();
  }else if(t==2){
          $('#Reserindivistatuscheque_v').hide();
          $('#Reserindivistatuscheque2_v').hide();
          $('#Reserindivistatustransferencia_v').show();
  }else if(t==3){
          $('#Reserindivistatuscheque_v').show();
          $('#Reserindivistatuscheque2_v').show();
          $('#Reserindivistatustransferencia_v').hide();
  }
}

function compra_pago_deuda(){
  var a = $('#Compraabonatotal').val();
  var b = $('#Compraabonacancelado').val();
  var d = $('#Compraabonadeuda2').val();
  c =  eval(d) - eval(b);
  if(eval(b)>eval(d)){
                    alert("El monto a cancelar es mayor a la deuda");
                    $('input[type="submit"]').attr('disabled','disabled');
                    $('#Compraabonadeuda').val('0');
              }else{
                    c = parseFloat(c).toFixed(2);
                    $('#Compraabonadeuda').val(c);
                    $('input[type="submit"]').removeAttr('disabled');
              }
}


function pago_individual_habitacion(){
  var a = $('#Reserindivistatustotal').val();
  var b = $('#Reserindivistatuspago').val();
  c =  eval(a) - eval(b);
  $('#Reserindivistatusdebe').val(c);
}

function total_p(a){
    var x  = $('#Productos_'+a+'__Cantidad').val();
    var y  = $('#Productos_'+a+'__Precio').val();
    var xe = $('#Productos_'+a+'__Existencia').val();
    if(eval(x)<=eval(xe)){
        z = eval(x) * eval(y);
        $('#Productos_'+a+'__Total').val(z);
    var c = $("#productos-container #productoscount").length;
    var total = 0;
    for (var i = 0; i <100; i++) {
        if($('#Productos_'+i+'__Total').length){
         var aux = $('#Productos_'+i+'__Total').val();
         total = eval(total) + eval(aux);
       }
    }
     total2 = parseFloat(total).toFixed(2);
    $('#Ventatotal').val(total2);
    $('input[type="submit"]').removeAttr('disabled');
  }else{
     alert("La cantidad es mayor a la existencia");
    $('input[type="submit"]').attr('disabled','disabled');
  }

}

function precio_p(a){
  $.ajax({
            url:"/Compras/precio",
            type:"post",
            data:{
                  id:$('#Productos_'+a+'__Pro').val()
                 },
            success:function(n){
              if(n!="0"){
                      $('#Productos_'+a+'__Cantidad').val('0');
                      $('#Productos_'+a+'__Precio').val(n);
                      $('#Productos_'+a+'__Total').val('0');
                             
              }else{ 
                      $('#Productos_'+a+'__Cantidad').val('0');
                      $('#Productos_'+a+'__Precio').val('0');
                      $('#Productos_'+a+'__Total').val('0');
                      total_p(a);
              }
            }
        });
}


function pago_multiples_habitacion(){
  var a = $('#Resermultistatustotal').val();
  var b = $('#Resermultistatuspago').val();
  c =  eval(a) - eval(b);
  $('#Resermultistatusdebe').val(c);
}

function status_multiple_habitacion(){

  var t = $('#Resermultistatusreserstatusmultiple_id').val();

        if(t==1){
          $('#Resermultistatusconftipopagoreserva_id_v').hide();
          $('#Resermultistatustotal_v').hide();
          $('#Resermultistatuspago_v').hide();
          $('#Resermultistatusdebe_v').hide();
          $('#Resermultistatusfecha_v').hide();
          $('#Resermultistatusmonto_penalidad_v').hide();
          $('#Resermultistatusobservaciones_v').hide();
  }else if(t==2){
          $('#Resermultistatusconftipopagoreserva_id_v').show();
          $('#Resermultistatustotal_v').show();
          $('#Resermultistatuspago_v').show();
          $('#Resermultistatusdebe_v').show();
          $('#Resermultistatusfecha_v').show();
          $('#Resermultistatusmonto_penalidad_v').hide();
          $('#Resermultistatusobservaciones_v').show();
  }else if(t==3){
          $('#Resermultistatusconftipopagoreserva_id_v').hide();
          $('#Resermultistatustotal_v').hide();
          $('#Resermultistatuspago_v').hide();
          $('#Resermultistatusdebe_v').hide();
          $('#Resermultistatusfecha_v').show();
          $('#Resermultistatusmonto_penalidad_v').hide();
          $('#Resermultistatusobservaciones_v').show();
  }else if(t==4){
          $('#Resermultistatusconftipopagoreserva_id_v').hide();
          $('#Resermultistatustotal_v').hide();
          $('#Resermultistatuspago_v').hide();
          $('#Resermultistatusdebe_v').hide();
          $('#Resermultistatusfecha_v').show();
          $('#Resermultistatusmonto_penalidad_v').hide();
          $('#Resermultistatusobservaciones_v').show();
  }else if(t==5){
          $('#Resermultistatusconftipopagoreserva_id_v').hide();
          $('#Resermultistatustotal_v').hide();
          $('#Resermultistatuspago_v').hide();
          $('#Resermultistatusdebe_v').hide();
          $('#Resermultistatusfecha_v').show();
          $('#Resermultistatusmonto_penalidad_v').hide();
          $('#Resermultistatusobservaciones_v').show();
  }else if(t==6){
          $('#Resermultistatusconftipopagoreserva_id_v').hide();
          $('#Resermultistatustotal_v').hide();
          $('#Resermultistatuspago_v').hide();
          $('#Resermultistatusdebe_v').hide();
          $('#Resermultistatusfecha_v').show();
          $('#Resermultistatusmonto_penalidad_v').show();
          $('#Resermultistatusobservaciones_v').show();
  }

}


function status_individual_habitacion(){

  var t = $('#Reserindivistatusreserstatusindividuale_id').val();

        if(t==1){
          $('#Reserindivistatusconftipopagoreserva_id_v').hide();
          $('#Reserindivistatustotal_v').hide();
          $('#Reserindivistatuspago_v').hide();
          $('#Reserindivistatusdebe_v').hide();
          $('#Reserindivistatusfecha_v').hide();
          $('#Reserindivistatusmonto_penalidad_v').hide();
          $('#Reserindivistatusobservaciones_v').hide();
  }else if(t==2){
          $('#Reserindivistatusconftipopagoreserva_id_v').show();
          $('#Reserindivistatustotal_v').show();
          $('#Reserindivistatuspago_v').show();
          $('#Reserindivistatusdebe_v').show();
          $('#Reserindivistatusfecha_v').show();
          $('#Reserindivistatusmonto_penalidad_v').hide();
          $('#Reserindivistatusobservaciones_v').show();
  }else if(t==3){
          $('#Reserindivistatusconftipopagoreserva_id_v').hide();
          $('#Reserindivistatustotal_v').hide();
          $('#Reserindivistatuspago_v').hide();
          $('#Reserindivistatusdebe_v').hide();
          $('#Reserindivistatusfecha_v').show();
          $('#Reserindivistatusmonto_penalidad_v').hide();
          $('#Reserindivistatusobservaciones_v').show();
  }else if(t==4){
          $('#Reserindivistatusconftipopagoreserva_id_v').hide();
          $('#Reserindivistatustotal_v').hide();
          $('#Reserindivistatuspago_v').hide();
          $('#Reserindivistatusdebe_v').hide();
          $('#Reserindivistatusfecha_v').show();
          $('#Reserindivistatusmonto_penalidad_v').hide();
          $('#Reserindivistatusobservaciones_v').show();
  }else if(t==5){
          $('#Reserindivistatusconftipopagoreserva_id_v').hide();
          $('#Reserindivistatustotal_v').hide();
          $('#Reserindivistatuspago_v').hide();
          $('#Reserindivistatusdebe_v').hide();
          $('#Reserindivistatusfecha_v').show();
          $('#Reserindivistatusmonto_penalidad_v').hide();
          $('#Reserindivistatusobservaciones_v').show();
  }else if(t==6){
          $('#Reserindivistatusconftipopagoreserva_id_v').hide();
          $('#Reserindivistatustotal_v').hide();
          $('#Reserindivistatuspago_v').hide();
          $('#Reserindivistatusdebe_v').hide();
          $('#Reserindivistatusfecha_v').show();
          $('#Reserindivistatusmonto_penalidad_v').show();
          $('#Reserindivistatusobservaciones_v').show();
  }

}
function reemplazarPC(a){
var str = a;
for(i=0; i<a.length; i++){
    str = str.replace('.','');
}
var b=str;
var str = b;
for(i=0; i<b.length; i++){
    str = str.replace(',','.');
}
return str;
}
function cantidad_multiple_habitaciones(){
  var l = $('#destino option').size();
          $('#Resermultiplecantidad').val(l);
          $("#Resermultiplefecha_entrada").val('');
          $("#Resermultiplefecha_salida").val('');
          $("#Resermultipledias").val('0');
          $("#Resermultipletotal").val('0');
          $("#Resermultipleprecioxdia").val('0');
}

function calcular_multiple_habitacion(){
  cantidad  = $('#Resermultiplecantidad').val();
  if(cantidad==""){
      cantidad = 0; 
      $('#Resermultiplecantidad').val('');
  } 
  fecha1  = $('#Resermultiplefecha_entrada').val(); 
  var dia1   = fecha1.substr(8);
  var mes1   = fecha1.substr(5,2);
  var anyo1  = fecha1.substr(0,4);
  fecha2  = $('#Resermultiplefecha_salida').val();
  var dia2   = fecha2.substr(8);
  var mes2   = fecha2.substr(5,2);
  var anyo2  = fecha2.substr(0,4);
  var fecha1 = new Date(anyo1+","+mes1+","+dia1);
  var fecha2 = new Date(anyo2+","+mes2+","+dia2);
  var diasDif = fecha2.getTime() - fecha1.getTime();
  var dias   = Math.round(diasDif/(1000 * 60 * 60 * 24));
  var tmsel = document.getElementById('destino').length;
  var t = new Array();
  for(var z = 0; z < tmsel; z++){
   t[z] = document.getElementById('destino').options[z].value;
  }
  $('#Resermultiplehabitaciones').val(t);
        if(tmsel==0){
          $('#Resermultipledias').val('0');
          $('#Resermultipleprecioxdia').val('0');
          $('#Resermultipletotal').val('0');
          alert("Ingrese la habitación");
          $('input[type="submit"]').attr('disabled','disabled');
  }else if(fecha1 <= fecha2 && fecha1!="" && fecha2!="" && tmsel!=0){
        $.ajax({
            url:"/Resermultiples/disponibidad",
            type:"post",
            data:{
                  fecha_a:$('#Resermultiplefecha_entrada').val(),
                  fecha_b:$('#Resermultiplefecha_salida').val(),
                  tipohabitacione_id:$('#Resermultipletipohabitacione_id').val(),
                  habitacione_id:t,
                },
            success:function(n){
              if(n==0){
                             $('#Resermultipledias').val(dias);
                var a      = $('#Resermultipleprecioxdia').val();
                var total  = (eval(dias)*eval(a));
                var total1 = (eval(total)*eval(cantidad));
                    total2 = parseFloat(total1).toFixed(2);
                            $('#Resermultipletotal').val(total2);
                    $('input[type="submit"]').removeAttr('disabled');
              }else{
                    $('#Resermultipledias').val('0');
                    $('#Resermultipleprecioxdia').val('0');
                    $('#Resermultipletotal').val('0');
                    alert("Para el periodo elejido ya se encuentra una reservar en la habitación "+n);
                    $('input[type="submit"]').attr('disabled','disabled');
              }
            }
        });
  }else{
          $('#Resermultipledias').val('0');
          $('#Resermultipleprecioxdia').val('0');
          $('#Resermultipletotal').val('0');
          alert("La fecha de Salida debe ser mayor a la de Entrada");
          $('input[type="submit"]').attr('disabled','disabled');

  }
}

function calcular_individual_habitacion(){
    fecha1  = $('#Reserindividualefecha_entrada').val(); 
    var dia1   = fecha1.substr(8);
    var mes1   = fecha1.substr(5,2);
    var anyo1  = fecha1.substr(0,4);
    fecha2  = $('#Reserindividualefecha_salida').val();
    var dia2   = fecha2.substr(8);
    var mes2   = fecha2.substr(5,2);
    var anyo2  = fecha2.substr(0,4);
    var n=$("#autoriza_pass").val();
    var t=$("#autoriza_user").val();
    var fecha1  = new Date(anyo1+","+mes1+","+dia1);
    var fecha2  = new Date(anyo2+","+mes2+","+dia2);
    var diasDif = fecha2.getTime() - fecha1.getTime();
    var dias    = Math.round(diasDif/(1000 * 60 * 60 * 24));
    if(fecha1 <= fecha2 && fecha1!="" && fecha2!=""){
        $.ajax({
            url:"/Reserindividuales/disponibidad",
            type:"post",
            data:{
                  fecha_a:$('#Reserindividualefecha_entrada').val(),
                  fecha_b:$('#Reserindividualefecha_salida').val(),
                  tipohabitacione_id:$('#Reserindividualetipohabitacione_id').val(),
                  habitacione_id:$('#Reserindividualehabitacione_id').val()
                },
            success:function(n){
              if(n==!0){
                             $('#Reserindividualedias').val(dias);
                var a      = $('#Reserindividualeprecioxdia').val();
                var total  = (eval(dias)*eval(a));
                    total2 = parseFloat(total).toFixed(2);
                            $('#Reserindividualetotal').val(total2);
                    $('input[type="submit"]').removeAttr('disabled');
              }else{
                    $('#Reserindividualedias').val('0');
                    $('#Reserindividualeprecioxdia').val('0');
                    $('#Reserindividualetotal').val('0');
                    alert("Para el periodo elejido ya se encuentra una reservar en la habitación");
                    $('input[type="submit"]').attr('disabled','disabled');
              }
            }
        });
    }else{
          $('#Reserindividualedias').val('0');
          $('#Reserindividualeprecioxdia').val('0');
          $('#Reserindividualetotal').val('0');
          alert("La fecha de Salida debe ser mayor a la de Entrada");
          $('input[type="submit"]').attr('disabled','disabled');
    }
}


function recalcular_individual(){
    var dias   = $('#Reserindividualedias').val();
    var a      = $('#Reserindividualeprecioxdia').val();
    var b      = $('#Reserindividualedescuento').val();
    var total  = ((eval(dias)*eval(a)) - eval(b));
        total2 = parseFloat(total).toFixed(2);
                $('#Reserindividualetotal').val(total2);
}


function recalcular_multiple(){
    var dias   = $('#Resermultipledias').val();
    var a      = $('#Resermultipleprecioxdia').val();
    var b      = $('#Resermultipledescuento').val();
    var total  = ((eval(dias)*eval(a)) - eval(b));
    var total1 = (eval(total)*eval(cantidad));
        total2 = parseFloat(total1).toFixed(2);
}


function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}



function moneda(fld, milSep, decSep, e) {
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
  if (whichCode == 13) return true; // Enter
	if (whichCode == 8) return true; // Enter
	if (whichCode == 127) return true; // Enter
	if (whichCode == 9) return true; // Enter
    key = String.fromCharCode(whichCode); // Get key value from key code
    if (strCheck.indexOf(key) == -1) return false; // Not a valid key
    len = fld.value.length;
    for(i = 0; i < len; i++)
     if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;
    aux = '';
    for(; i < len; i++)
     if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) fld.value = '';
    if (len == 1) fld.value = '0'+ decSep + '0' + aux;
    if (len == 2) fld.value = '0'+ decSep + aux;
    if (len > 2) {
     aux2 = '';
     for (j = 0, i = len - 3; i >= 0; i--) {
      if (j == 3) {
       aux2 += milSep;
       j = 0;
      }
      aux2 += aux.charAt(i);
      j++;
     }
     fld.value = '';
     len2 = aux2.length;
     for (i = len2 - 1; i >= 0; i--)
      fld.value += aux2.charAt(i);
     fld.value += decSep + aux.substr(len - 2, len);
    }
    return false;
 }

function cargar_contenido(url_cargar,id_cargar){
	new Ajax.Updater(id_cargar,url_cargar, {asynchronous:true, evalScripts:true,onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', id_cargar]});
}

function linkTagRemote(url_cargar, id){
  //url_cargar = 'cochesplus/'+url_cargar+'/'+parametro_extra;
  url_cargar = url_cargar;
  $('#'+id).load(url_cargar);
}

function inputTagRemote(url_cargar, id, parametro_extra){
	//url_cargar = 'cochesplus/'+url_cargar+'/'+parametro_extra;
	url_cargar = url_cargar+'/'+parametro_extra;
  $('#'+id).load(url_cargar);
}

function selectTagRemote(url_cargar, id, parametro_extra){
	//url_cargar = url_cargar+'/'+parametro_extra;
	//new Ajax.Updater(id_cargar,url_cargar, {asynchronous:true, evalScripts:true,onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', id_cargar]});
  url_cargar = url_cargar+'/'+parametro_extra;
  jQuery('#'+id).load(url_cargar);
}

function verifica_contrasena(id1,id2){
	var c1=$(id1).value;
	var c2=$(id2).value;
	if(c1!=c2){
		 $('verifica_contrasena').innerHTML = '<span class="error_1">Las contrase&ntilde;as son incorrectas</span>';
		 $(id1).value='';
		 $(id2).value='';
	}else{
		 $('verifica_contrasena').innerHTML = '';
	}
}

function limpiar_msj(v){
	if(v==2){
		id='msj_internal_exito';
	}else{
		id='msj_internal_error';
	}
	new Effect.Fade(id);
}

function solonumeros(e){
	/**var key=tecla ? evt.which:evt.keyCode;
	return (key==13 || (key>=48 && key<=57));*/
	tecla_codigo = (document.all) ? e.keyCode : e.which;
	if(tecla_codigo==8 || tecla_codigo==0 || tecla_codigo==13)return true;
	patron =/[0-9]/;
	tecla_valor = String.fromCharCode(tecla_codigo);
	return patron.test(tecla_valor);
}

function sprintf () {
  var i = 0, a, f = arguments[i++], o = [], m, p, c, x;
  while (f) {
    if (m = /^[^\x25]+/.exec(f)) o.push(m[0]);
    else if (m = /^\x25{2}/.exec(f)) o.push('%');
    else if (m = /^\x25(?:(\d+)\$)?(\+)?(0|'[^$])?(-)?(\d+)?(?:\.(\d+))?([b-fosuxX])/.exec(f)) {
      if (((a = arguments[m[1] || i++]) == null) || (a == undefined)) throw("Too few arguments.");
      if (/[^s]/.test(m[7]) && (typeof(a) != 'number'))
        throw("Expecting number but found " + typeof(a));
      switch (m[7]) {
        case 'b': a = a.toString(2); break;
        case 'c': a = String.fromCharCode(a); break;
        case 'd': a = parseInt(a); break;
        case 'e': a = m[6] ? a.toExponential(m[6]) : a.toExponential(); break;
        case 'f': a = m[6] ? parseFloat(a).toFixed(m[6]) : parseFloat(a); break;
        case 'o': a = a.toString(8); break;
        case 's': a = ((a = String(a)) && m[6] ? a.substring(0, m[6]) : a); break;
        case 'u': a = Math.abs(a); break;
        case 'x': a = a.toString(16); break;
        case 'X': a = a.toString(16).toUpperCase(); break;
      }
      a = (/[def]/.test(m[7]) && m[2] && a > 0 ? '+' + a : a);
      c = m[3] ? m[3] == '0' ? '0' : m[3].charAt(1) : ' ';
      x = m[5] - String(a).length;
      p = m[5] ? str_repeat(c, x) : '';
      o.push(m[4] ? a + p : p + a);
    }
    else throw ("Huh ?!");
    f = f.substring(m[0].length);
  }
  return o.join('');
}//fin sprintf

function str_repeat(i, m) { for (var o = []; m > 0; o[--m] = i); return(o.join('')); }

function redondear(cantidad, decimales){
	    var   cantidad  = parseFloat(cantidad);
		var decimales2  = 6;
		var    formato  = '%01.'+decimales2+'f';
		var   cantidad  = eval(sprintf(formato, cantidad));
			     str =  cantidad+'';
				 for(x=0; x<str.length; x++){if(str.charAt(x)=="."){
				    if(str.charAt(eval(x)+eval(3))=="5"){ cantidad = eval(cantidad) + eval(0.001);}
				    break;
				      }//fin if
				   }//fin for
		var cantidad = parseFloat(cantidad);
		  decimales = (!decimales ? 2 : parseInt(decimales));
		var formato = '%01.'+decimales+'f';
		      valor = sprintf(formato,cantidad);
		return eval(valor);
}

function soloLetras(e){
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
  especiales = [8,37,39,46];

  tecla_especial = false
  for(var i in especiales){
      if(key == especiales[i]){
          tecla_especial = true;
          break;
      }
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial){
      return false;
  }
}

function regresar() {
  window.history.back()
}

function mostrarMensaje(mensaje, tipo){
  switch(tipo){
    case 'success': $().toastmessage('showSuccessToast', mensaje); break;
    case 'notice': $().toastmessage('showNoticeToast', mensaje); break;
    case 'warning': $().toastmessage('showWarningToast', mensaje); break;
    case 'error': $().toastmessage('showErrorToast', mensaje); break;
    default: $().toastmessage('showSuccessToast', mensaje); break;
  }

}

function successToast(mensaje){
  $().toastmessage('showNoticeToast', mensaje);
}



function fncSumar(){
  var precio_compra  = Number(document.getElementById("Proproductoprecio_compra").value);
  var ganancia       = Number(document.getElementById("Proproductoganancia").value);
  var valor_iva      = Number(document.getElementById("Proiva").value);
  var precio_neto    = ((precio_compra*ganancia)/100);
  var precio_neto_2  = Number(document.getElementById("Proproductoprecio_neto").value =  precio_neto+precio_compra);
  var iva            = (precio_neto_2*valor_iva)/100;
  var iva_procentaje = iva;
  var total          = precio_neto_2+iva_procentaje;
  document.getElementById("Proproductoiva").value =(iva_procentaje);
  document.getElementById("Proproductopvp").value =(total);
}
