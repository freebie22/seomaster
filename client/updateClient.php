<?php
require_once "../include/db_connect.php";

$CKod = $_POST['CKod'];
$CPrizv = $_POST['CPrizv'];
$CIm= $_POST['CIm'];
$CBat = $_POST['CBat'];
$CNomTel = $_POST['CNomTel'];
$CName = $_POST['CName'];
$CModel = $_POST['CModel'];

mysqli_query($linc, "UPDATE `Client` SET `CPrizv` = '$CPrizv', `CIm` = '$CIm', `CBat` = '$CBat', `CNomTel` = '$CNomTel', `CName` = '$CName', `CModel` = '$CModel'  WHERE CKod = '$CKod'");
header('Location: viewClient.php');
?>