<?php
	session_start();
	include "include/db_connect.php"; //Підключення до бази даних


    if (isset($_POST['submit_input']))
	{
		$login=$_POST["input_login"];
		$pass=$_POST["input_password"];
	
		$result = mysqli_query($linc, "SELECT * FROM Users WHERE Login='$login' AND Password='$pass'");
	     if (mysqli_num_rows($result)>0)
	     {$row=mysqli_fetch_array($result);
			if ($row["Access"]==1) 
			{$_SESSION['auth_user']	= 'user';
	         header("Location: user_index.php");
			}
			if ($row["Access"]==2) 
			{$_SESSION['auth_user']	= 'admin';
	         header("Location: admin_index.php");
			}
            else{
                echo 'Такого користувача не існує';
            }
		 }
	}


?>

<!-- === BEGIN HEADER === -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MyFirstCar</title>
        <link rel="stylesheet" href="..\css\style.css?<?echo time();?>">
		<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
		<style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
	</head>
    <body>
        <form class="signup-page" method="POST">
            
			<label for="sel1">Введіть логін</label>
			<input type="text" id="sel1"  name="input_login" style="background:white; color:#0c0e0c; border:none;"><br><br>
								
			<label for="sel2">Введіть пароль</label>
			<input type="password" id="sel2"  name="input_password" style="background:white; color:#0c0e0c; border:none;"><br><br> 
								
			<input type="submit" id="submit-form" name="submit_input" value="Вхід" style="color:#0c0e0c; border: 2px solid #c1aaaa; margin-top:25px;">
		</form>
    </body>
</html>                	
