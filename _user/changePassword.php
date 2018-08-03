<?php
include_once '../views/template.php';
include_once dirname(__DIR__)."/functions/misc.php";

$rolUser1=$_SESSION['rolUser'];

head("user", $rolUser1);
headParallax("Cambiar Contraseña", "");
// print_r($_SESSION);
?>

<!-- CHANGE PASSWORD -->
<div class="ibm-fluid ibm-padding-top-2">
  <div class="ibm-col-12-4 ibm-col-small-12-12 ibm-col-medium-12-6 ibm-center-block">
    <div class="ibm-card">
      <!-- <div class="ibm-card__heading ibm-h2" align="center">Cambiar contrase&ntilde;a</div> -->
      <div class="ibm-card__content">
        <div class="ibm-rule ibm-alternate ibm-gray-40"><hr></div><br>
        <form id="formChangePassword" class="ibm-row-form ibm-row-form--line" method="post" action="../operations/userOperations.php?operation=changePassword">
          <p>
            <label for="currentPassword">Contrase&ntilde;a actual:</label>
            <span>
              <input class="ibm-fullwidth" type="password" id="currentPassword" name="currentPassword" required>
            </span>
          </p>
          <p>
            <label for="password">Nueva Contrase&ntilde;a</label>
            <span>
              <input class="ibm-fullwidth" type="password" id="password" name="password" required>
            </span>
          </p>
          <p>
            <label for="password">Repetir Contrase&ntilde;a</label>
            <span>
              <input class="ibm-fullwidth" type="password" id="password1" name="password1" required>
            </span>
          </p>
          <div>
            <!-- aqui van los campos ocultos -->
            <input type="hidden" id="idUser" name="idUser" value="<?php echo $_SESSION['user_id'];?>" required>
          </div>
          <p class="ibm-padding-top-1">
            <button type="submit" class="ibm-btn-pri ibm-btn-blue-50 ibm-fullwidth">Cambiar Contrase&ntilde;a</button>
          </form>
        </div>
      </div>
    </div>
  </div>


<?php
footer();
?>
