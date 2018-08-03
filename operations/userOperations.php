<?php
include_once '../functions/setFunctions.php';
include_once '../functions/getFunctions.php';
include_once '../functions/misc.php';
include_once '../functions/uploadFunctions.php';
include_once '../includes/mail.php';
include_once(dirname(__DIR__).'/config/login.php');
secSessionStart();

// echo "holo despues de iniciar la sesion<br>";

error_reporting(E_ALL);
ini_set('display_errors', 'on');
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_GET['operation'])){
    $operation=$_GET['operation'];

    if(!empty($operation)){
      if($operation=="addTicket"){
        //echo "add ticket<br>";
        if(isset($_POST['frm-salesOrder'],
            $_POST['frm-error'],
            $_POST['frm-proceso'],
            $_POST['frm-descrip'],
            $_POST['frm-severidad'])) {
          // dont forget frm-screen
          $salesOrder=$_POST['frm-salesOrder'];
          $error=$_POST['frm-error'];
          $proceso=$_POST['frm-proceso'];
          $descrip=replaceCharacter($_POST['frm-descrip']);
          $autor=$_SESSION['idUser'];
          $severidad = $_POST['frm-severidad'];
          date_default_timezone_set('America/Mexico_City');
          echo $fec_creacion=date("Y-m-d H:i:s");

          //upload the screenshot
          $_screenshot=uploadTicketScreenshot($_FILES['frm-screen'],"n");

          $var=addTicket($salesOrder, $autor, $proceso, $fec_creacion, $descrip, $_screenshot,$error, $severidad);
          if($var){
            consoleLog(' creado correctamente');
            $ticket=getLastTicket();
            mailNewTicket($ticket[0]);
            //echo "";
            if($_screenshot==NULL){
              alert('correcto', '../web/semaforo3.php');
            }else{
              alert('correctamente', '../web/semaforo3.php');
            }
          }else {
            consoleLog(" no guardado");
            alert("Error",'../web/semaforo3.php');
          }
          // echo "despues de addTicket<br>";

        }
      }
    }
  }
}else {
  echo "userOperations method get<br>";
}

?>
