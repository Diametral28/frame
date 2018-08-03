$(document).on("click","#btn-solve",function() {
  console.log("presionando el boton solucionar");
  var values={
    "_author":$('#_author').val(),
    "_error":$('#_errorId').val(),
    "_proceso":$('#_proceso').val(),
    "_id":$('#_id').val()
  };
  $.ajax({
    type:"POST",
    data:values,
    url:"../ajax/ajaxSolveTicket.php",
    beforeSend: function(){
      $("#spinner").addClass('ibm-spinner');
    },
    error: function(xhr,ajaxOptions,thrownError){
      $('#ovl-solveTicket').html('<div><p>An error has occurred</p>'+xhr.status+": "+thrownError+'</div>');
    },
    success: function(response){
      $("#ovl-solveTicket").html(response);
    }
  });
  IBMCore.common.widget.overlay.show('overlaySolveTicket'); return false;
  // $(this).addAttr("disabled");
});
