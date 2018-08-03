<p id="spinner"></p>
<form id="formNewUser" class="ibm-row-form" method="post" action="../operations/adminOperations.php?operation=addUsuario">
  <div class="ibm-fluid">

    <div class="ibm-col-12-6 ibm-col-6-3">
      <div class="ibm-col-12-12 ibm-col-6-6">
        <label for="uMail">Usuario: <span class="ibm-required">*</span></label>
      </div>
      <div class="ibm-col-12-12 ibm-col-6-6">
        <input type="email" id="uMail" name="uMail" class="ibm-fullwidth" placeholder="juanb@mx1.ibm.com" >
      </div>
    </div>
    <div class="ibm-col-12-6 ibm-col-6-3">
      <div class="ibm-col-12-12 ibm-col-6-6"<>
        <label for="uName">Nombre: <span class="ibm-required">*</span></label>
      </div>
      <div class="ibm-col-12-12 ibm-col-6-6">
        <input type="text" id="uName" name="uName" class="ibm-fullwidth" placeholder="Juan Bananas" >
      </div>
    </div>
    <div class="ibm-col-12-6 ibm-col-6-3">
      <div class="ibm-col-12-12 ibm-col-6-6">
        <label for="uPass">Contrase&ntilde;a: <span class="ibm-required">*</span></label>
      </div>
      <div class="ibm-col-12-12 ibm-col-6-6">
        <input type="password" id="uPass" name="uPass" class="ibm-fullwidth">
      </div>
    </div>
    <div class="ibm-col-12-6 ibm-col-6-3">
      <div class="ibm-col-12-12 ibm-col-6-6">
        <label for="uConPass">Confirmar contrase&ntilde;a: <span class="ibm-required">*</span></label>
      </div>
      <div class="ibm-col-12-12 ibm-col-6-6">
        <input type="password" id="uConPass" name="uConPass" class="ibm-fullwidth">
      </div>
    </div>
    <div class="ibm-col-12-6 ibm-col-6-3">

      <div class="ibm-col-12-12 ibm-col-6-6">
        <label>Rol: <span class="ibm-required">*</span></label>
      </div>

      <div class="ibm-col-12-12 ibm-col-6-6">
        <select id="uRol" name="uRol" class="ibm-styled-input" style="width: 100%;">
          <option value="" selected>Seleccione...</option>
          <option value="1">Super Admin</option>
          <option value="2">Shipping</option>
          <option value="3">User (Geodis)</option>
        </select>
      </div>


    </div>

  <!-- </div> -->
  <!-- <div class="ibm-fluid"> -->
    <div class="ibm-col-12-6">
      <br>
      <div class="ibm-col-12-12 ibm-col-6-6">
        <p>
          <button type="button" class="ibm-btn-pri ibm-btn-small ibm-btn-teal-50 ibm-fullwidth"
          id="btn-checkUser" name="btn-checkUser">Agregar</button>
        </p>
      </div>
    </div>
  </div>
</form>

<!-- <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script> -->
<script src="<?php echo __DIR__; ?>/validNewUser.js">
</script>
