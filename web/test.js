$(function(){

  $.validator.addMethod('strongPassword', function(value, element){
    return value.length>=6
    && /\d/.test(value)
    && /[a-z]/i.test(value);
  }, 'your password must be at least 6 character long and one alpha and one number');

  $("#registerForm").validate({
    rules:{
      email: {required: true},
      password: {
        required:true,
        strongPassword:true
      },
      password2:{
        required:true,
        equalTo:"#password"
      }
    },
    messages:{
      email:{
        required:"m&eacute;tale un correo",
        email:"m&eacute;tale un correo <i>v&aacute;lido</i>"
      },
      password:{
        required:"m&eacute;tale una contrase&ntilde;a"
      }
    }
  });

  $("#submit-button").on("click",function(){
    console.log("clik y asi");
  });
});
