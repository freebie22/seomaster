<?php
require_once "../include/db_connect.php";

print_r($_POST);

$LName = $_POST['LName'];
$LModel = $_POST['LModel'];
$LPrice = $_POST['LPrice'];
$LYear = $_POST['LYear'];
$LDataPostup = $_POST['LDataPostup'];
$LClientPrizv = $_POST['LClientPrizv'];
$LCountry = $_POST['LCountry'];

if (isset($_POST['submit_add_car']))
	{ 
     //Перовірка заповнення полів
	$error=0;
	 if(empty($_POST["LName"])) 
	   {echo "Не введена марка авто! ";
		$error=$error+1;
	   }
       if(empty($_POST["LModel"])) 
	   {echo "Не введена модель авто! ";
		$error=$error+1;
	   }
	   if(empty($_POST["LCountry"])) 
	   {echo "Не вказано країну-виробника! ";
		$error=$error+1;
	   }
       if(empty($_POST["LPrice"])) 
	   {echo "Не введена ціна авто! ";
		$error=$error+1;
	   }
       if(empty($_POST["LYear"])) 
	   {echo "Не вказано рік випуску авто! ";
		$error=$error+1;
	   }
       if(empty($_POST["LDataPostup"])) 
	   {echo "Не вказана дата надходження! ";
		$error=$error+1;
	   }
	   if(empty($_POST["LClientPrizv"])) 
	   {echo "Не вказано замовника! ";
		$error=$error+1;
	   }
	   echo 'Кількість помилок:'.$error;
	 	
     if ($error==0)
		{
	//Додавання запису в базу даних				
	mysqli_query($linc,"INSERT INTO List SET				
				    LName='".$_POST["LName"]."',
                    LModel='".$_POST["LModel"]."',
                    LPrice='".$_POST["LPrice"]."',
                    LYear='".$_POST["LYear"]."',
                    LDataPostup='".$_POST["LDataPostup"]."',
                    LClientPrizv='".$_POST["LClientPrizv"]."',
					LCountry='".$_POST["LCountry"]."',
                    LImage=''");
	//header('Location: ../index.php');
		};
		//Визначення ідентифікатора доданого запису
        $LKod = mysqli_insert_id($linc);
        echo "New record has id: " . mysqli_insert_id($linc) ."<br>";
		if (isset($_FILES['my_file_one'])) 
			{$myFile1 = $_FILES['my_file_one'];
			 include("../modules/upload-image.php");
			}

			if (isset($_FILES['my_files'])) {
                $myFiles = $_FILES['my_files'];
                include("../modules/upload-gallery.php");
            }
	};	
?>