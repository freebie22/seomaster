<?php
require_once "../include/db_connect.php";

$LKod = $_POST['LKod'];
$LName = $_POST['LName'];
$LModel= $_POST['LModel'];
$LPrice = $_POST['LPrice'];
$LYear = $_POST['LYear'];
$LDataPostup = $_POST['LDataPostup'];
$LClientPrizv = $_POST['LClientPrizv'];
$LCountry = $_POST['LCountry'];

mysqli_query($linc, "UPDATE `List` SET `LName` = '$LName', `LModel` = '$LModel', `LPrice` = '$LPrice', `LYear` = '$LYear', `LDataPostup` = '$LDataPostup', `LClientPrizv` = '$LClientPrizv', `LCountry` = '$LCountry'  WHERE LKod = '$LKod'");
header('Location: ../index.php');
?>
