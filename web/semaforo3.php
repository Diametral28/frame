<?php
//session_start();

include_once '../views/template.php';
include_once dirname(__DIR__).'/config/login.php';
include_once dirname(__DIR__).'/functions/showTickets.php';
include_once '../functions/getFunctions.php';
include_once '../functions/misc.php';
?>

<?php

  // foreach ($_SESSION as $key => $value) {
  //   echo "$key => $value<br>";
  // }

// echo "secSessionStart";

//session_start();

secSessionStart();
if (!loginCheck()) {
  echo "Only for registered users.<br>";
  echo "<br><a href='../index.php'>Login</a>";
  exit;
}
?>
<?php 
  $rolUser1=$_SESSION['rolUser'];
  $idUser1=$_SESSION['idUser'];
  $areaUser1=$SESSION['areaUser'];
  $_email=$SESSION['emailUser'];
  head("user",$rolUser1); 

?>


<link rel="stylesheet" type="text/css" href="../css/main.css">
<main role="main" aria-labelledby="ibm-pagetitle-h1">
  <div id="ibm-content-main">
    <!------------------------------------------ VALUES ------------------------------------------>
    <section id="values">
      <input type="hidden" id="_idUser" name="_idUser" value="<?php echo $idUser1; ?>">
      <input type="hidden" id="_areaUser" name="_areaUser" value="<?php echo $areaUser1; ?>">
      <input type="hidden" id="_rolUser" name="_rolUser" value="<?php echo $rolUser1; ?>">
    </section>

    <section id="trafficLight">
     

    </section>

    <!-- BUSQUEDA Y ASI -->

    <!-- AQUI VA LA TABLA -->
    <div class="ibm-fluid" id="tabla_buscador">
      <div class="ibm-col-12-5" align="center"></div>
      <div class="ibm-col-12-2" id="spinnerBuscador">
        &nbsp;
      </div>
      <div class="ibm-col-12-5" align="center"></div>
    </div>
</main>
<!-- ----------------------------------OVERLAYS---------------------------------- -->
<section id="overlays">
  <!-- NEW TICKET -->
  <div class="ibm-common-overlay ibm-overlay-alt" data-widget="overlay" id="overlayNewTicket">
    <p class="ibm-h3 ibm-textcolor-blue-50">Nuevo ticket</p>
    <div class="ibm-rule ibm-alternate ibm-grey-30"><hr></div>
    <div data-widget="scrollable" data-height="550">
      <form enctype="multipart/form-data" class="ibm-row-form" method="post" action="../operations/userOperations.php?operation=addTicket">
        <div id="ovl-newTicket">
          <div id="spinner"></div>
        </div>
        <div align="center">
          <p class="ibm-button-link">
            <button type="submit" class="ibm-btn-pri ibm-btn-green-50" id="btnSave" name="btnSave" disabled="disabled">Guardar</button>
          </p>
        </div>
      </form>
    </div>
  </div>

  <!-- OVERLAY OPEN STATUS -->
  <div class="ibm-fluid">
    <div class="ibm-col-12-12">
      <div class="ibm-common-overlay full-width seamless" data-widget="overlay" id="overlayRed">
        <div id="ovl-red" align="center">
          <div id="spinnerR"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- OVERLAY IN_PROCESS STATUS -->
  <div class="ibm-fluid">
    <div class="ibm-col-12-12">
      <div class="ibm-common-overlay full-width seamless" data-widget="overlay" id="overlayYellow">
        <div id="ovl-yellow" align="center">
          <div id="spinnerY"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- OVERLAY CLOSED STATUS -->
  <div class="ibm-fluid">
    <div class="ibm-col-12-12">
      <div class="ibm-common-overlay full-width seamless" data-widget="overlay" id="overlayGreen">
        <div id="ovl-green" align="center">
          <div id="spinnerG"></div>
        </div>
      </div>
    </div>
  </div>

</section>

<!-- <section id="values">
  <input type="hidden" id="_userId" name="_userId" value="<?php echo $idUser1; ?>">
  <input type="hidden" id="_userArea" name="_userArea" value="<?php echo $areaUser1; ?>">
  <input type="hidden" id="_userRol" name="_userRol" value="<?php echo $rolUser1; ?>">
</section>
 -->


<?php footer(); ?>
<script>
			IBMCore.common.util.config.set({
				"masthead":{
					"type":"alternate"
				},
				"footer":{
					"type":"alternate",
					"socialLinks":{
						"enabled":false
					}
				}
			});
		</script>
<script src="../js/newTicket.js"></script>
<script src="../js/reloadTrafficLight.js"></script>
<script src="../js/showTicket.js"></script>
<script src="../js/buscador.js"></script>
<script type="text/javascript" src="../js/picker.js"></script>
<script type="text/javascript" src="../js/picker.date.js"></script>
<!-- <script src="../js/picker.date.js"></script> -->
<!-- <script src="../js/picker.js"></script> -->
