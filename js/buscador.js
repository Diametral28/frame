$(document).on("click","#buscar_btn", function() {

  if($("#fec_ini").val()>$("#fec_fin").val()){
    alert('seleccione una fecha correcta');
    return;
  }

  var values={
    "bus":$("#bus").val(),
    "estado":$("#est").val(),
    "fec_ini":$("#fec_ini").val(),
    "fec_fin":$("#fec_fin").val(),
    "bus_proceso":$("#bus_proceso").val(),
    "bus_error":$("#bus_error").val()
  };

  $.ajax({
    type:"POST",
    url:"../ajax/ajaxBuscador.php",
    data:values,
    beforeSend:function(){
      $("#spinnerBuscador").addClass('ibm-spinner');
    },
    success: function(response){
      $("#tabla_buscador").html(response);
     IBMCore.common.widget.datatable.init('#tableBuscador');
    },
    error: function(xhr,ajaxOptions,thrownError){
      $("#tabla_buscador").html('<div><p>An error has ocurred</p>' + xhr.status + ': '+ thrownError + '</div>');
    }
  } );
} );
