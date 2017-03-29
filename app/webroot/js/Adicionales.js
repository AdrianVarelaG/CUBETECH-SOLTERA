$(document).ready(function(){


  $("button[title = 'Pagar']").on('click', muestraDatePicker);
  $("input[title = 'Pagar']").on('blur', ocultaDatePicker);
  $("input[title = 'Pagar']" ).datepicker({
      format: 'YYYY-MM-DD',
      maxDate: 0,
      onSelect: actualizaFecha
    });
  function muestraDatePicker(){
    var pagar = $(this).parent();
    var input = pagar.children("input");
    pagar.addClass("date");
    input.focus();
  }
  function ocultaDatePicker(){
    var pagar = $(this).parent();
    pagar.removeClass("date");
    /*console.log(this.value);*/
  }
  function actualizaFecha(date) {7
    console.log(window);
    console.log(this);
    console.log(date);
  }
});
