<?php
require_once "../include/db_connect.php";
$Car_ID = $_GET['LKod'];
$List = mysqli_query($linc, "SELECT * FROM `List` WHERE `LKod`=".intval($Car_ID));
$List = mysqli_fetch_assoc($List);
							 if ($List["LImage"]=='') 
                            {
								{$img_path='../uploads_images/empty.jpg';}
                             }
							  else {$img_path = '../uploads_images/'.$List["LImage"];}		
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width, initial scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	<title>Перегляд автомобілю <?= $List['LName'] ?> <?= $List['LModel'] ?></title>
	<style>
        .white-text{
            color: #FFFFFF;
        }
    </style>
	</head>
	<body>
    <h2 class="text-center text-dark">Перегляд авто <?= $List['LName'] ?> <?= $List['LModel'] ?></h2>
    <div class="container p-3 d-flex justify-content-center">
				<form  method="post">
                <input type="hidden" name="LKod" value="<?= $List['LKod'] ?>">
                <p class="text-center">Головне фото авто</p>
                <img src="<?=$img_path?>" width="340px" heigth="340px" />
                <p class="text-center">Галерея авто</p>
                <?php
                $Images = mysqli_query($linc,"SELECT * FROM Image WHERE id_car='$Car_ID'");
                                       if (mysqli_num_rows($Images)>0)
                                      {
                                      $row_img = mysqli_fetch_array($Images);
                                       do
                                       {$img_path =$row_img ["name_image"];	
                                        echo '  
                                         <img src="'.$img_path.'" width="120px" heigth="220px"/>
                                              ';
                                       }	
                                       while ($row_img = mysqli_fetch_array($Images));
                                      }	
                                      else{
                                        echo '<h6 class="text-center">!!Галерея порожня!!</h6>';
                                      }
                ?>
				<p class="text-center">Марка авто</p>
				<input disabled class="form-control p-1 text-center" style="width:100%" type="text" name="LName" value="<?= $List['LName'] ?>">
				<p class="text-center">Модель авто</p>
				<input disabled class="form-control p-1 text-center" style="width:100%" type="text" name="LModel" value="<?= $List['LModel'] ?>">
                <p class="text-center">Країна-виробник</p>
				<input disabled class="form-control p-1 text-center" style="width:100%" type="number" name="LPrice" value="<?= $List['LCountry'] ?>">
				<p class="text-center">Ціна авто</p>
				<input disabled class="form-control p-1 text-center" style="width:100%" type="number" name="LPrice" value="<?= $List['LPrice'] ?>">
				<p class="text-center">Рік випуску авто</p>
				<input disabled class="form-control p-1 text-center" style="width:100%" type="number" name="LYear" value="<?= $List['LYear'] ?>">
				<p class="text-center">Дата надходження</p>
				<input disabled class="form-control p-1 text-center" style="width:100%" type="date" name="LDataPostup" value="<?= $List['LDataPostup'] ?>">
				<a href="../index.php" style="display:block;text-align:center" class="btn btn-dark  mt-3">Повернутись до таблиці</button>
				</form>
			</div>
    </body>
 </html>