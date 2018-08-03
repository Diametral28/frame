
$(function($){

  $("#formNewUser").validate({
    rules:{
      frm-salesOrder: {
        required: true,
        minlenght:10
      }
  });


  // $("#btn-checkUser").on("click",function(e){
  //   // e.preventDefault();
  //   // alert("ivan!!!2");
  //   console.log("clicky-click");
  //   // $(this).submit();
  //   // alert($(this).valid());
  //   if($("#formNewUser").valid()){
  //     console.log('si es valido');
  //     $("#formNewUser").submit();
  //
  //   }else{
  //     console.log('no es valido');
  //   }
  //   return false;
  // });

});
