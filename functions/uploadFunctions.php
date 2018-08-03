<?php
include_once '../functions/misc.php';

function uploadTicketScreenshot($screenshot, $type){
  if($screenshot==NULL || empty($screenshot)){
    return NULL;
  }
  $limitKB=60048;
  $dir="../../";
  $dateFile=date("Y_m_d-H_i_s");
  if(!empty($screenshot['name'])){
    $screenshot['name']=deleteSpaces($screenshot['name']);
    if($screenshot['type']=="image/jpeg" || $screenshot['type']=='image/jpg' || $screenshot['type']=='image/png') {
      if($screenshot['size'] <=$limitKB * 1024) {
        $ac = "screen/shipping_".$type."_".$dateFile."_".$screenshot['name'];
        $tmp=$screenshot["tmp_name"];
        if(is_uploaded_file($tmp)) {
          copy($tmp, $dir.$ac);
          chmod($dir.$ac,0777);
          return $ac;
        }
        else {
          return NULL;
          consoleLog("Archivo no cargado");
        }
      }
      else {
        return NULL;
        consoleLog("Exceed allowed size file");
      }
    }else{
      return NULL;
      consoleLog("Invalid format");
    }
  }
}

 ?>
