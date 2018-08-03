<?php
// ------------------------------------------- Access List Control -------------------------------------------

function acl($usr,$rol, $){
  $str="<p>&iexcl;Accesso denegado!<br>No tienes permisos para ver este contenido.</p>";
  $home='/incidentpower/index.php';
  $str1="<br><a href='$home'>Home</a>";
  switch ($usr) {
    case 'admin':
      # code...
      break;

    default:
      # code...
      break;
  }
}
?>
