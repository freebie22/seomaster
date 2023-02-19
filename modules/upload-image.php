<?php
 
//перевірка розширення
$Name_File= $myFile1["name"][0];
$imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $Name_File));
if($imgext == 'jpeg' || $imgext == 'jpg' || $imgext == 'png')
{ 
//папка для загрузки
$uploaddir = '../uploads_images/';
//нове імя
$newfilename = $LKod.'-'.rand(1,10).'.'.$imgext;
//шлях до файлу
echo $uploadfile = $uploaddir.$newfilename;
 
//загрузка файлу
$Tmp_Name=$myFile1["tmp_name"][0];
move_uploaded_file($Tmp_Name, $uploadfile);

$update = mysqli_query($linc, "UPDATE List SET LImage='$newfilename' WHERE LKod = '$LKod'");   
}

?>