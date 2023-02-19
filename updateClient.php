<?php
    require_once "include/db_connect.php";
    $Client_ID = $_GET['CKod'];
    $Client = mysqli_query($linc, "SELECT * FROM `Client` WHERE `CKod`=".intval($Client_ID));
    $Client = mysqli_fetch_assoc($Client);
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width, initial scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	<title>Оновлення клієнта</title>
	<style>
        .white-text{
            color: #FFFFFF;
        }
    </style>
	</head>
	<body>
    <div class="container p-3">
    <h2 class="text-center text-success">Оновити клієнта</h2>
				<form action="client/updateClient.php" method="post">
                <input type="hidden" name="CKod" value="<?= $Client['CKod'] ?>">
				<p>Прізвище клієнта</p>
				<input class="form-control p-1" style="width:100%" type="text" name="CPrizv" value="<?= $Client['CPrizv'] ?>">
				<p>Ім'я клієнта</p>
				<input class="form-control p-1" style="width:100%" type="text" name="CIm" value="<?= $Client['CIm'] ?>">
				<p>По-батькові клієнта</p>
				<input class="form-control p-1" style="width:100%" type="text" name="CBat" value="<?= $Client['CBat'] ?>">
				<p>Номер телефону</p>
				<input class="form-control p-1" style="width:100%" type="text" name="CNomTel" value="<?= $Client['CNomTel'] ?>">
				<p>Марка бажаного авто</p>
				<input class="form-control p-1" style="width:100%" type="text" name="CName" value="<?= $Client['CName'] ?>">
                <p>Модель бажаного авто</p>
				<input class="form-control p-1" style="width:100%" type="text" name="CModel" value="<?= $Client['CModel'] ?>">
				<button name="submit_update_client" type="submit" class="btn btn-success mt-3 text-center">Оновити</button>
				</form>
			</div>
			
</div>
    </body>
 </html>