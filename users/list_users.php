<?php
session_start();

if ($_SESSION['auth_user']!="admin")
	{   echo 'Доступ заборонений';
	    unset($_SESSION['auth_user']);
		header("Location:index.php");
	}    
else
	{
		require_once "../include/db_connect.php";
		$Users = mysqli_query($linc, "SELECT * FROM `Users`");
		$Users = mysqli_fetch_all($Users);
		require_once "../include/db_connect.php";
		echo '
		<script>
		function confirmSpelll() {
			if (confirm("Увага! При видаленні даних з довідника, в основній таблиці запис теж буде видалено!")) {
				return true;
			} else {
				return false;
			}
		}
		 
		</script>
		';
	}


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
	<title>Список користувачів</title>
	<style>
        .white-text{
            color: #FFFFFF;
        }
    </style>
	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-dark pl-6">
  <a class="navbar-brand white-text" href="../main.php">&nbsp MyFirstCar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <div class="dropdown">
	  <a class=" nav-link dropdown-toggle white-text"  id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
		Автомобілі
    </a>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
		<li><a class="dropdown-item" href="../index.php">Таблиця автомобілів</a></li>
	  </ul>
	</div>
    <div class="dropdown">
	  <a class=" nav-link dropdown-toggle white-text"  id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
		Клієнти
    </a>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
		<li><a class="dropdown-item" href="../client/viewClient.php">Таблиця клієнтів</a></li>
	  </ul>
	</div>
    </ul>
  </div>
</nav>
		<h1 class="text-primary text-center">Таблиця користувачів</h1>
		<div class="container p-3">
		<table class="table table-bordered table-stripped" style="width:100%">
			<thead>
				<tr>
					<th>
						Ідентифікатор
					</th>
					<th>
						Логін
					</th>
					<th>
						Пароль
					</th>
					<th>
                        Підтверджений пароль
					</th>
					<th>
						Рівень доступу
					</th>
					<th>
						&#9998
					</th>
					<th>
						&#10006
					</th>
					<tr>

			</thead>
			<tbody>
				<?php
				foreach($Users as $item)
				{
				?>
				<tr>
					<td>
					<?= $item[0] ?>
                    </td>
					<td>
					<?= $item[1] ?>
                    </td>
					<td>
					<?= $item[2] ?>
                    </td>
					<td>
					<?= $item[3] ?>
                    </td>
					<td>
					<?= $item[4] ?>
                    </td>
					
					<td>
						<a href="updateUser.php?User_Id=<?=$item[0]?>">Оновити</a>
				</td
				><td>
						<a href="deleteUser.php?User_Id=<?=md5($item[0])?>" onclick="return confirmSpelll();">Видалити</a>
				</td>
				<?php
				}
				?>
			</tbody>
			 </table>
			 <hr></hr>
</div>
	</body>
</html>	