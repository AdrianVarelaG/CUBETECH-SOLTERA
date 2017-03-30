$(document).ready(function(){

  var $tdPagar = $("td[title='Pagar']");

  $tdPagar.find("button.btn-danger").on('click', muestraDatePicker);
  $tdPagar.find("input").on('blur', ocultaDatePicker);
  $tdPagar.find("input").datepicker({
      format: 'YYYY-MM-DD',
      maxDate: 0,
      onSelect: actualizaFecha
    });
  function muestraDatePicker(){
    console.log(this);
    var $pagar = $(this).closest('td');

    $pagar.addClass("date");
    $pagar.children("input").focus();
  }
  function ocultaDatePicker(){
    var $pagar = $(this).closest('td');
    $pagar.removeClass("date");
  }
  function actualizaFecha(date) {
    var $pagar = $(this).closest('td');

    var ventaPago = {
      venta: $(this).attr('data-id'),
      fecha: date
    };
    $.ajax({
      type: 'POST',
      url: '/Ventas/pagar2.json',
      data: ventaPago,
      success: function(response){
        if(response.status == 'OK'){
          var $button = $pagar.children("button").removeClass('btn-danger').addClass('btn-success btn-sm').prop('disabled', true);
          $button.text(date);
        }else if (response.status == 'ERROR'){
            if(response.message){
              alert(response.message);
            }
            if(response.redirect){
              window.location = response.redirect;
            }
        }else{
          alert('Error Inesperado');
        }
      },
      error: function(){
        alert('No fue posible actualizar el pago!! Favor de volver a intentar.');
      }
    });
  }
});
