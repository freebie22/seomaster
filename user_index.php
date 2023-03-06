<?php
session_start();
if ($_SESSION['auth_user']!="user")
	{   echo 'Доступ заборонений';
	    unset($_SESSION['auth_user']);
		header("Location: Index.php");
	 }    
else
	{
        require_once "include/db_connect.php";
        $List = mysqli_query($linc, "SELECT * FROM `List`");
        $List = mysqli_fetch_all($List);
        echo '
        <script>
        function confirmSpelll() {
            if (confirm("Ви підтверджуєте видалення?")) {
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
		<h1 class="text-primary text-center">Таблиця автомобілів</h1>
		<div class="container p-2">
		<form class="" action="carfilter.php" method="post">
		<div class="input-text" style="display:flex; flex-direction:row; justify-content:center">
            <h2>Фільтрація&nbsp </h2>
          </div>
          <div class="input-text" style="display:flex; flex-direction:row; justify-content:center">
            <h6>Марка авто&nbsp </h6>
            <input type="text" name="name_car">
          </div>
          <div class="input-text mt-2" style="display:flex; flex-direction:row; justify-content:center">
            <h6>Модель авто&nbsp </h6>
            <input type="text" name="model_car">
          </div>
		  <div class="input-text mt-3" style="display:flex; flex-direction:row; justify-content:center">
            <h6>Рік випуску авто</h6>
          </div>
      <div class="input-text mt-2" style="display:flex; flex-direction:row; justify-content:center">
            <h6 >Від&nbsp</h6>
            <select    name="start_year">
      <option value="1985">1985</option>
          <option value="1986">1986</option>
          <option value="1987">1987</option>
          <option value="1988">1988</option>
          <option value="1989">1989</option>
          <option value="1990">1990</option>
          <option value="1991">1991</option>
          <option value="1992">1992</option>
          <option value="1993">1993</option>
          <option value="1994">1994</option>
          <option value="1995">1995</option>
          <option value="1996">1996</option>
          <option value="1997">1997</option>
          <option value="1998">1998</option>
          <option value="1999">1999</option>
          <option value="2000">2000</option>
          <option value="2001">2001</option>
          <option value="2002">2002</option>
          <option value="2003">2003</option>
          <option value="2004">2004</option>
          <option value="2005">2005</option>
          <option value="2006">2006</option>
          <option value="2007">2007</option>
          <option value="2008">2008</option>
          <option value="2009">2009</option>
          <option value="2010">2010</option>
          <option value="2011">2011</option>
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
        </select>
      <h6>&nbspДо&nbsp</h6>
            <select  name="end_year">
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
          <option value="2009">2009</option>
          <option value="2008">2008</option>
          <option value="2007">2007</option>
          <option value="2006">2006</option>
          <option value="2005">2005</option>
          <option value="2004">2004</option>
          <option value="2003">2003</option>
          <option value="2002">2002</option>
          <option value="2001">2001</option>
          <option value="2000">2000</option>
          <option value="1999">1999</option>
          <option value="1998">1998</option>
          <option value="1997">1997</option>
		  <option value="1996">1996</option>
          <option value="1995">1995</option>
          <option value="1994">1994</option>
          <option value="1993">1993</option>
          <option value="1992">1992</option>
          <option value="1991">1991</option>
          <option value="1990">1990</option>
          <option value="1989">1989</option>
          <option value="1988">1988</option>
          <option value="1987">1987</option>
          <option value="1986">1986</option>
          <option value="1985">1985</option>
        </select>
          </div>
		  <div class="input-text mt-3" style="display:flex; flex-direction:row; justify-content:center">
            <h6>Ціна авто, $</h6>
          </div>
      <div class="input-text mt-2" style="display:flex; flex-direction:row; justify-content:center">
            <h6>Від&nbsp </h6>
            <input  type="number" name="min_price">
          </div>
      <div class="input-text mt-2" style="display:flex; flex-direction:row; justify-content:center">
            <h6>До&nbsp </h6>
            <input  type="number" name="max_price">
          </div>
		  <div class="input-text mt-2" style="display:flex; flex-direction:row; justify-content:center">
		  <input type="submit" name="search" value="Відфільтрувати">
          </div>
       
       </form>

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
						Країна-виробник
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
						Переглянути авто
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($List as $item)
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
					<?= $item[8] ?>
                    </td>
					<td>
					<?= $item[3] ?>
                    </td>
					<td>
					<?= $item[4] ?>
                    </td>
                    <td>
					<?= $item[5] ?>
                    </td>
                    <td>
					<?= $item[6] ?>
                    </td>
					<td>
						<a href="cars/viewCar.php?LKod=<?=$item[0]?>"><img height="140px" width="200px" src="uploads_images/<?= $item[7] ?>"></a>
                    </td>
				<?php
				}
				?>
			</tbody>
			 </table>
			</div>
			
</div>
	</body>
</html>	