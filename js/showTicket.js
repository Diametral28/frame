$(document).on("click","#redLight",function() {
  var values={
    "_userId" : $("#_userId").val(),
    "_userArea": $("#_userArea").val(),
    "_userRol": $("#_userRol").val()
  };

  $.ajax({
    type:"POST",
    url:"../ajax/ajaxRedLight.php",
    data:values,
    beforeSend:function(){
      $("#spinnerR").addClass('ibm-spinner');
    },
    success: function(response){
      $("#ovl-red").html(response);
      IBMCore.common.widget.datatable.init('#tableRed');
    },
    error: function(xhr,ajaxOptions,thrownError){
      $("#ovl-red").html('<div><p>An error has ocurred</p>' + xhr.status + ': '+ thrownError + '</div>');
    }
  });
  IBMCore.common.widget.overlay.show('overlayRed'); return false;
});


// YELLOW LIGHT
$(document).on("click","#yellowLight",function() {
  var values={
    "_userId" : $("#_userId").val(),
    "_userArea": $("#_userArea").val(),
    "_userRol": $("#_userRol").val()
  };

  $.ajax({
    type:"POST",
    url:"../ajax/ajaxYellowLight.php",
    data:values,
    beforeSend:function(){
      $("#spinnerY").addClass('ibm-spinner');
    },
    success: function(response){
      $("#ovl-yellow").html(response);
      IBMCore.common.widget.datatable.init('#tableYellow');
    },
    error: function(xhr,ajaxOptions,thrownError){
      $("#ovl-yellow").html('<div><p>An error has ocurred</p>' + xhr.status + ': '+ thrownError + '</div>');
    }
  });
  IBMCore.common.widget.overlay.show('overlayYellow'); return false;
});


// GREEN LIGHT
$(document).on("click","#greenLight",function() {
  var values={
    "_userId" : $("#_userId").val(),
    "_userArea": $("#_userArea").val(),
    "_userRol": $("#_userRol").val()
  };

  $.ajax({
    type:"POST",
    url:"../ajax/ajaxGreenLight.php",
    data:values,
    beforeSend:function(){
      $("#spinnerG").addClass('ibm-spinner');
    },
    success: function(response){
      $("#ovl-green").html(response);
      IBMCore.common.widget.datatable.init('#tableGreen');
    },
    error: function(xhr,ajaxOptions,thrownError){
      $("#ovl-green").html('<div><p>An error has ocurred</p>' + xhr.status + ': '+ thrownError + '</div>');
    }
  });
  IBMCore.common.widget.overlay.show('overlayGreen'); return false;
});
