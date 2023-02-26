<?php
require_once'include/db_connect.php';


if($_POST["search"])
{ $query_all='';
	$name_car=$_POST['name_car'];
	$model_car=$_POST['model_car'];
    $start_year=$_POST['start_year'];
    $end_year=$_POST['end_year'];
    $min_price=$_POST['min_price'];
	$max_price=$_POST['max_price'];

	if($name_car==""){
			$query_name="LName IN(SELECT LName FROM List)";
	}
    else {
		$query_name="LName = '$name_car'";}

        if($model_car==""){
			$query_model="AND LModel IN(SELECT LModel FROM List)";
	}
    else {
		$query_model="AND LModel = '$model_car'";}
        if($min_price==""&&$max_price==""){
			$query_price="AND LPrice IN(SELECT LPrice FROM List)";
	}
    else {
		$query_price="AND LPrice >= '$min_price' AND LPrice <= '$max_price'";}
        
        if($start_year=="" && $end_year=""){
			$query_year="AND LYear IN (Select LYear From List)";
	}
    else {
		$query_year="AND LYear >= '$start_year' AND LYear <= '$end_year'";}
    

	$query_all=$query_name.$query_model.$query_price.$query_year;
	$List = mysqli_query($linc, "SELECT * FROM List  WHERE $query_all");
	$num_rows=mysqli_num_rows($List);//Визначення кількості рядків у таблиці
	//Виведення в циклі записів у таблицю веб-сторінки
	$row = mysqli_fetch_assoc($List);
	mysqli_close($linc);
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
	<title>Список автомобілів</title>
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
		<li><a class="dropdown-item" href="../index.php" >Таблиця автомобілів</a></li>
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
<?php 
    echo '<h3 class="text-center">За обраними фільтрами знайдено '.$num_rows.' співпадань</h3>';
?>

		<h1 class="text-primary text-center">Таблиця автомобілів</h1>
		<div class="container p-2">
		<div class="center">
     <div class="center">
       <table class="table table-bordered table-stripped" style="width:100%">
			<thead>
				<tr>
					<th>
						Код 
					</th>
					<th>
						Марка авто
					</th>
					<th>
						Модель авто
					</th>
					<th>
						Ціна авто
					</th>
					<th>
						Рік випуску
					</th>
					<th>
						Дата надходження
					</th>
					<th>
						Код клієнта
					</th>
                    <th>
						Країна-виробник
					</th>
					<th>
						Фото
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
                do{
                    if ($row["LImage"]=='') 
				{$img_path='empty.jpg';}
				else {$img_path = 'uploads_images/'.$row["LImage"];}
                    echo '
                    <tr>
                    <td>'.$row['LKod'].'</strong></td>
                    <td>'.$row['LName'].'</td>
                    <td>'.$row['LModel'].'</td>
                    <td>'.$row['LPrice'].'</td>
                    <td>'.$row['LYear'].'</td>
                    <td>'.$row['LDataPostup'].'</td>
                    <td>'.$row['LClientPrizv'].'</td>
                    <td>'.$row['LCountry'].'</td>
                    <td><img src="'.$img_path.'" width="140px" heigth="200px" /></td>
                    </tr>
                    ';
                }
                while ($row = mysqli_fetch_assoc($List));
				?>
			</tbody>
			 </table>
            </div>
   </body>
 </html>
