$(function($){
  $("#formSolveTicket").validate({
    rules:{
      solve-proceso: "required",
      solve-error: "required",
      solve-solution: "required",
      solve-descGeo: "required",
      solve-descME "required"
    }
  });
});
