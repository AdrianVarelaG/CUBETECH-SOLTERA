$(document).ready(function(){


/* BLOQUUE PARA LA FINCIONALIDAD DEL INDEX fecha de pago*/
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
  $formVenta = $('#VentaAddForm');

  $formVenta.on('submit', function(e){

         $(this).find('input.mayorcero').each(function(){
           $(this).rules("add",
                   {
                      required: true,
                      number: true,
                      step: 1,
                       min: 1,
                       messages: {
                          required: jQuery.validator.format("Favor de capturar la cantidad"),
                          number: jQuery.validator.format("El valor no es numero"),
                          min: jQuery.validator.format("Debe ser un numero positivo mayor a 0"),
                          step: jQuery.validator.format("No se permiten decimales")
                      },
                   })
         });
        e.preventDefault();
        if($(this).validate().form()){
          console.log("Validate");
        } else{
           console.log("does not validate");
        }
  });
   $formVenta.validate();

  /*
  $formVenta.validate({
    submitHandler: function (form) { // for demo
          console.log('valid form submitted'); // for demo
          return false; // for demo
      }
  });
  */
  /*
  $formVenta.delegate('input.mayorcero', 'focus', function(){
    console.log('Si soy');
  });
*/
/*
  $formVenta.on('submit', function(e){
        e.preventDefault();
        var data = $("#VentaAddForm :input").serializeArray();
        console.log("Primeo On Submit");
  });
*/
/*BLOQUE PARA LA FUNCIONALIDAD DEL ADD validar que los productos no sean 0
  $('#GuardarVenta').on('click', validaProductos);
  $divProductos = $('#div-productos');
  function validaProductos(){
    $productos = $divProductos.find("input.mayorcero");

  }
*/
});
