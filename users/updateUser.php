<?php
	session_start();
	
	if ($_SESSION['auth_user']!="admin")
		{   echo 'Доступ заборонений';
			unset($_SESSION['auth_user']);
			header("Location: ../index.php");
		}    
	else
		{
		 include ("../include/db_connect.php");
		 error_reporting(0);
		$id_user=$_GET["User_Id"];
		
		
		if (isset($_POST['submit_new_password']))
		
			{if ($_POST["ULogin"]=="" || $_POST["UOldPass"]=="" || $_POST["UNewPass"]=="" ||$_POST["UConNewPass"]=="")
				{echo '
					<script>
					alert("Не введено логін або пароль.");
					</script>';
				}
			else
				{$UOldPass = md5($_POST['UOldPass']);	
				 $UNewPass=md5($_POST["UNewPass"]);
				 $UConNewPass=md5($_POST["UConNewPass"]);
				 $result_users =  mysqli_query($linc, "SELECT * FROM Users WHERE  User_Id ='$id_user'");
				 $row = mysqli_fetch_array($result_users);
				 if ($row['Password']==$UOldPass)
					{ 
					if ($_POST["UAccess"]=="user") $status="1";
					if ($_POST["UAccess"]=="admin") $status="10";
					 mysqli_query($linc, "UPDATE Users SET Password='$UNewPass', Confirm_password='$UConNewPass' WHERE  User_Id='$id_user'");
					  echo '
						<script>
							alert("Дані змінені.");
						</script>
						';
						header("Location: list_users.php");	
					}
					else 
					{echo '
					<script>
					alert("Зміни не проведені.");
					</script>';
					}
					
				}
			}
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
	<title>Оновлення користувача</title>
	<style>
        .white-text{
            color: #FFFFFF;
        }
    </style>
	</head>
	<body>
    <div class="container p-3">
    <h2 class="text-center text-success">Оновити користувача</h2>
				<form  method="post">
                <input type="hidden" name="CKod" value="<?= $row['User_Id'] ?>">
				<p>Логін користувача</p>
				<?php
								$id_user=$_GET["User_Id"];
								$result=mysqli_query($linc, "SELECT * FROM Users WHERE User_Id='$id_user'");
								if (mysqli_num_rows($result)>0)
                                   {$row = mysqli_fetch_array($result);
									do
									{
									echo '
									<input type="text" class="form-control"  name="ULogin" value="'.$row['Login'].'"  >
									';
									}
									while ($row = mysqli_fetch_array($result));
									}
								?>
				<p>Підтвердіть старий пароль</p>
				<input class="form-control p-1" style="width:100%" type="password" name="UOldPass" value="">
				<p>Введіть новий пароль</p>
				<input class="form-control p-1" style="width:100%" type="password" name="UNewPass" value="">
				<p>Підтвердіть старий пароль</p>
				<input class="form-control p-1" style="width:100%" type="password" name="UConNewPass" value="">
				<p>Оберіть рівень доступу</p>
				<select class="form-control p-1" size="2" name="UAccess">
				<option value="user">Користувач</option>
				<option value="admin">Адміністратор</option>
                </select>
				<button name="submit_new_password" type="submit" class="btn btn-success mt-3 text-center">Оновити</button>
				</form>
			</div>
			
</div>
    </body>
 </html>