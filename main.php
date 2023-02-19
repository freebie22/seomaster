<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width, initial scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	<title>Головна сторінка</title>
    <style>
        .white-text{
            color: #FFFFFF;
        }
    </style>
	</head>
	<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark pl-6">
  <a class="navbar-brand white-text" href="main.php">&nbsp MyFirstCar</a>
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
		<li><a class="dropdown-item" href="index.php">Таблиця автомобілів</a></li>
	  </ul>
	</div>
    <div class="dropdown">
	  <a class=" nav-link dropdown-toggle white-text"  id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
		Клієнти
    </a>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
		<li><a class="dropdown-item" href="client/viewClient.php">Таблиця клієнтів</a></li>
	  </ul>
	</div>
    </ul>
  </div>
</nav>
	</body>
</html>	