
$(function($){


  jQuery.validator.addMethod('strongPassword', function(value, element){
    return this.optional(element)
    || value.length>=6
    && /\d/.test(value)
    && /[a-z]/i.test(value);
  }, 'Se espera al menos una letra y un n&uacute;mero. M&iacute;nimo 6 caract&eacute;res');

  $("#formNewUser").validate({
    rules:{
      uMail: {required: true},
      uName: {required: true},
      uPass: {
        required:true,
        strongPassword:true
      },
      uConPass:{
        required:true,
        equalTo:"#uPass"
      },
      uRol:{
        required:true
      }
    }
  });


  $("#btn-checkUser").on("click",function(e){
    // e.preventDefault();
    // alert("ivan!!!2");
    console.log("clicky-click");
    // $(this).submit();
    // alert($(this).valid());
    if($("#formNewUser").valid()){
      console.log('si es valido');
      $("#formNewUser").submit();

    }else{
      console.log('no es valido');
    }
    return false;
  });

});
