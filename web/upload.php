<?php
echo "upload.php<br>";
$target_dir="uploads/";
echo "target_dir: $target_dir<br> ";
$target_file=$target_dir . basename($_FILES["fileToUpload"]["name"]);
echo "target_file<br>";
$uploadOk=1;
echo "uploadOk $uploadOk<br>";
$imageFileType=pathinfo($target_file, PATHINFO_EXTENSION);

//Check if image file is an actual image or fake image

if(isset($_POST["submit"])){
  $check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  echo "check $check<br>";
  if($check!== false){
    echo "File is an image - ".$check["mime"].".<br>";
    $uploadOk=1;
  }else{
    echo "File is not an image.";
    $uploadOk=0;
  }
}


if($uploadOk==0){
  echo "Sorry, your file was not uploaded.";
}else{
  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
    echo "the file \"". basename($_FILES["fileToUpload"]["name"]."\" has been uploaded.<br>");
  }else {
    echo "Sorry, there was a problem uploading your file.";
  }
}
 ?>
