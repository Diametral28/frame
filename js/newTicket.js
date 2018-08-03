$(document).ready(function(){

 


  // $("#btnSalesOrder").on("click",function(){
  //   console.log("click check");
  // });

});

 function btnNewTicket(){
    console.log("click en boton new ticket desde js/newTicket.js");
    // IBMCore.common.widget.overlay.show('overlayNewTicket'); return false;
    $.ajax({
      type:"POST",
      url:"../ajax/ajaxNewTicket1.php",
      beforeSend: function(){
        $("#spinner").addClass('ibm-spinner');
      },
      success: function(response){
        $("#ovl-newTicket").html(response);
      },
      error: function(xhr,ajaxOptions,thrownError) {
        $('#ovl-newTicket').html('<div><p>An error has occurred</p>'+xhr.status+": "+thrownError+'</div>');
      }
    });
    IBMCore.common.widget.overlay.show('overlayNewTicket'); return false;
  }


$(document).on("click","#btnSalesOrder",function(){
  console.log("click check");
  // console.log($("#salesOrder").val());
  var values={
    "_salesOrder":$("#frm-salesOrder").val()
  };

  // console log(values['_salesOrder']);
  // console.log($("#salesOrder").val().length);
  // if salesOrder is valid then
  if($("#frm-salesOrder").val()[0]=='0' && $("#frm-salesOrder").val()[1]=='0' && $("#frm-salesOrder").val().length==10) {
    // open newTicket2
    console.log(values)
    $.ajax({
      type:"POST",
      data: values,
      url:"../ajax/ajaxNewTicket2.php",
      beforeSend:function(){
        $("#spinner").addClass('ibm-spinner');
      },
      success: function(response){
        $("#btnSave").removeAttr("disabled");
        $("#ovl-newTicket").html(response);
      },
      error: function(xhr,ajaxOptions,thrownError) {
        $('#ovl-newTicket').html('<div><p>An error has occurred</p>'+xhr.status+": "
        +thrownError+'</div><div>'+ajaxOptions+'</div>');
      }
    });
    // else dont open and show an alert
  }else {
    alert("incorrecto");
  }
});
