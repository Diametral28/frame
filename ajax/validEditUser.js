$(function($){
  jQuery.validator.addMethod('strongPassword', function(value, element){
    return this.optional(element)
    || value.length>=6
    && /\d/.test(value)
    && /[a-z]/i.test(value);
  }, 'Se espera al menos una letra y un n&uacute;mero. M&iacute;nimo 6 caract&eacute;res');


  $("#formEditUser").validate({
    rules:{
      uName:"required",
      uEmail:"required",
      uPass:{
        required:false,
        strongPassword:true
      },
      uPass2:{
        required:false,
        equalTo:"#uPass"
      },
      uRol:"required",
      uStatus:"required"
    }
  });

  $("#btn-editUser").on("click",function(e){
    console.log("click edit user");
    if($("#formEditUser").valid()){
      console.log("editUser values are valid");
      $("#formEditUser").submit();
    }else{
      console.log("editUser values are invalid");
    }
  });
});
