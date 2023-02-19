<?php
require_once "../include/db_connect.php";

$CPrizv = $_POST['CPrizv'];
$CIm= $_POST['CIm'];
$CBat = $_POST['CBat'];
$CNomTel = $_POST['CNomTel'];
$CName = $_POST['CName'];
$CModel = $_POST['CModel'];

if (isset($_POST['submit_add_client']))
	{ 
     //Перовірка заповнення полів
	$error=0;
	 if(empty($_POST["CPrizv"])) 
	   {echo "Не введене прізвище клієнта! ";
		$error=$error+1;
	   }
       if(empty($_POST["CIm"])) 
	   {echo "Не введене ім'я клієнта! ";
		$error=$error+1;
	   }
       if(empty($_POST["CBat"])) 
	   {echo "Не введене по-батькові клієнта! ";
		$error=$error+1;
	   }
       if(empty($_POST["CNomTel"])) 
	   {echo "Не введений номер телефону клієнта! ";
		$error=$error+1;
	   }
       if(empty($_POST["CName"])) 
	   {echo "Не введена марка бажаного авто! ";
		$error=$error+1;
	   }
       if(empty($_POST["CModel"])) 
	   {echo "Не введена модель бажаного авто! ";
		$error=$error+1;
	   }
	   echo 'Кількість помилок:'.$error;
	 	
     if ($error==0)
		{
	//Додавання запису в базу даних				
    mysqli_query($linc, "INSERT INTO `Client` (`CPrizv`, `CIm`, `CBat`, `CNomTel`, `CName`, `CModel`) VALUES ('$CPrizv', '$CIm', '$CBat', '$CNomTel', '$CName', '$CModel')");
	header('Location: /client/viewClient.php');
		};
	};	
?>