<?php
    include ("include/db_connect.php"); //Підключення до бази даних
    if (isset($_POST['submit_add_brand']))
	{ 
     //Перовірка заповнення полів
	$error=0;
	  if(empty($_POST["form_name_brand"])) 
	   {echo ".Не введено назву бренда! ";
		$error=$error+1;
	   }
     if ($error==0)
		{
	//Додавання запису в базу даних				
					mysqli_query($linc,"INSERT INTO Brand SET				
				    name_brand='".$_POST["form_name_brand"]."'");
		};
	};

/*echo '<pre>';
echo print_r($_POST);
echo '</pre>';*/


    if (isset($_POST['submit_add_model']))
	{ 
     //Перовірка заповнення полів
	$error=0;
	  if(empty($_POST["form_name_model"])) 
	   {echo "Не введено назву моделі! ";
		$error=$error+1;
	   }
	  if(empty($_POST["form_year"])) 
	   {echo "Не введено рік виготовлення! ";
		$error=$error+1;
	   }
       if(empty($_POST["form_brand"])) 
	   {echo "Не обрано Бренд! ";
		$error=$error+1;
	   }
     if ($error==0)
		{
	//Додавання запису в базу даних				
					mysqli_query($linc,"INSERT INTO Model SET				
				    name_model='".$_POST["form_name_model"]."',
                    year='".$_POST["form_year"]."',
                    brand_id='".$_POST["form_brand"]."'");
		};
	};	
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

    <head>
        <!-- Title -->
        <title>Pr7</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	</head>
<body>
    <div class="container bottom-border">
         	<div id="base">
				<div id="content">
				  <div class="container background-white" style="margin:0px; padding:10px;">
                    <div class="row margin-vert-30" style="margin:10px; padding:0px;">
                        <!-- Register Box -->
                        <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                            
							<form class="signup-page" method="POST">
                                <div class="signup-header">
                                    <h3 style="color:#0c0e0c;"><strong>Введення Бренду</strong></h3>
                                    <br>
                                </div>
                                <br>
								<label for="sel2">Назва бренду</label>
								 <input type="text" class="form-control" id="sel2"  name="form_name_brand" style="background:lightgrey; color:#0c0e0c; border:none;"  >
                                 <br>
                                 <p>
								 <input type="submit" class="form-control" id="submit-form" name="submit_add_brand" value="Додати" style="color:#0c0e0c; border: 2px solid #c1aaaa; margin-top:10px;">
								</p>
							    <p>
								<input type="reset" class="form-control" id="submit-form" value="Очистити" style="color:#0c0e0c; border: 2px solid #c1aaaa; margin-top:px;">
							    </p>
                            </form>

                            <form class="signup-page" method="POST">
                                <div class="signup-header">
                                        <h3 style="color:#0c0e0c;"><strong>Введення Моделі</strong></h3>
                                        <br>
                                    </div>
                                    <br>
                                    <label for="sel2">Назва моделі</label>
                                    <input type="text" class="form-control" id="sel2"  name="form_name_model" style="background:lightgrey; color:#0c0e0c; border:none;"  >
                                    <br>
                                    <label for="sel6">Дата виготовлення</label>
                                    <input type="text" class="form-control" name="form_year" id="sel6" style="background:lightgrey; color:#0c0e0c; border:none;">
                                    <br>
                                    <label for="sel1">Виберіть Бренд</label>
                                    <?php
                                        $query_group = mysqli_query($linc, "SELECT * FROM Brand");
                                        echo  '<select class="form-control" name="form_brand" id="sel1" size="5" style="color:#0c0e0c;"';
                                        echo '<option value="id_brand"></option>';
                                        while ($temp = mysqli_fetch_assoc($query_group))
                                        {
                                        echo '<option style="color:#0c0e0c;" value='.$temp['id_brand'].'>'.$temp['name_brand'].'</option>';
                                        }
                                        echo "</select>";
                                    ?>
                                    <br>
                                    <p>
                                    <input type="submit" class="form-control" id="submit-form" name="submit_add_model" value="Додати" style="color:#0c0e0c; border: 2px solid #c1aaaa; margin-top:10px;">
                                    </p>
                                    <p>
                                    <input type="reset" class="form-control" id="submit-form" value="Очистити" style="color:#0c0e0c; border: 2px solid #c1aaaa; margin-top:px;">
                                    </p>
                            </form>
							

 
						</div>
      				</div>
					</div>
				</div>
			</div>
            <!-- === END CONTENT === -->      
        
        </div>
    </body>
</html>
