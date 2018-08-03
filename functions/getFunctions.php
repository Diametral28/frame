<?php
date_default_timezone_set('America/Mexico_City');
include_once dirname(__DIR__)."/config/DBConnect.php";

function getSolutions(){
  $sql="SELECT * FROM INCPOWDB.\"ss_solution_catal\" WHERE \"estado\" = 1 ORDER BY \"solucion_desc\" ASC";
  $db=new DBConnect();
  $data=$db -> query($sql);

  if(!empty($data)){
    return $data;
  }else{
    return false;
  }
}

function getShippingUsers(){
  $sql="SELECT u.\"id_usuario\", u.\"nombre\", u.\"usuario\", u.\"contrasena\",
   u.\"id_area\", u.\"rol\", u.\"estado\" FROM incpowdb.\"ss_usuarios\" u, INCPOWDB.\"ss_area\" e
   where u.\"id_area\"=e.\"id_area\" and u.\"rol\"<7 and upper(e.\"area\") like 'SHIPPING%' order by u.\"nombre\"";
  $db=new DBConnect();
  $data=$db -> queryAssoc($sql);
  if(!empty($data)){
    return $data;
  }else {
    return false;
  }
}


// function getUsers(){
// }

?>
