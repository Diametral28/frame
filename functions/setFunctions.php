<?php
date_default_timezone_set('America/Mexico_City');
include_once '../config/DBConnect.php';
include_once '../functions/misc.php';


function addUsuario($name,$email, $password,$area,$rol){
  $sql="INSERT INTO \"INCPOWDB\".\"ss_usuarios\" (\"nombre\", \"usuario\", \"contrasena\",\"id_area\",\"rol\") values ('$name','$email','$password','$area','$rol')";
  $db=new DBConnect();
  return $db -> insertData($sql);
}

function editUserPassword($password,$user){
  $sql="UPDATE \"INCPOWDB\".\"ss_usuarios\" set \"contrasena\"='{$password}' where \"id_usuario\"='{$user}'";
  $db=new DBConnect();
  return $db -> insertData($sql);
}

?>
