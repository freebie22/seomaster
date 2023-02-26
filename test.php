<?php

    include ("include/db_connect.php"); //Підключення до бази даних
    $result=mysqli_query($linc, "SELECT * FROM products");//Запит на вибірку всіх записів з Model
    $num_rows=mysqli_num_rows($result);//Визначення кількості рядків у таблиці 
    //Виведення в циклі записів у таблицю веб-сторінки  
    $row = mysqli_fetch_array($result);

  echo '
  <h1 style="text-align:left; padding-left: 450px;">Список доданих Товарів</h1>
    <table>
    <tr>
      <th style="width:110px; text-align:left; font-size: 18px;"><strong>Код страви</strong></th>
      <th style="width:200px; text-align:center; font-size: 18px;"><strong>Назва страви</strong></th>
      <th style="width:160px; text-align:center; font-size: 18px;"><strong>Категорія</strong></th>
      <th style="width:150px; text-align:center; font-size: 18px;"><strong>Ціна страви</strong></th>
    </tr>
    </table>
    ';

    do{
     echo '
    <table style="table-layout:fixed; width:700px;" class="table table-striped">  
    <tr>
    <td style="width:140px;">'.$row['product_id'].'</td>
    <td style="width:140px; ">'.$row['menu_name'].'</td>
    <td style="width:140px; ">'.$row['category'].'</td>
    <td style="width:140px; ">'.$row['price'].'</td>
    </tr>                
    </table>
    '; 
                
    }
  while ($row = mysqli_fetch_array($result));  
   echo 'Кількість записів: '.$num_rows;  
   //mysqli_close($linc);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

    <head>
        <!-- Title -->
        <title>pr11</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Google Fonts-->
  </head>
    <body>
        <!-- Block filter -->         
        
        <div class="col-md-3">
        <h3 class="margin-bottom-6" style="margin-left:10px"><strong>Пошуковий фільтр</strong></h3>     
        
        
        <form method="POST">
             
                <div id="block-search" >
                 <div id="block-category">
                      <p class="header-title"><strong>Категорія:</strong></p>
                    <select class="form-control"  id="sel11" name="select_category" size="8" style="background:white; color:#0c0e0c;">
                  <option value="Десерти">Десерти</option>
                  <option value="Супи">Супи</option>
                  <option value="Основні страви">Основні страви</option>            
                  </select>
           </div>
          </div>

                    <div id="block-submit-search" style=" border-top:2px solid #cccccc;; text-align:center">
                        <input type="submit" name="submit_search" id="submit-filter" value="Пошук" style="margin-top:10px; border-radius:5px;" style="border-radius:5px; padding-left:10px"/>
                        <input type="reset" id="submit-reset" value="Очистити"  style="margin-top:10px; border-radius:5px;"/>
           </div>  

                </form>
    
      <div class="row">
                 <div class="col-md-8" style="margin-top:10px;">
                     <div class="tab-content">
                        <div class="tab-pane active in fade" id="faq">
                            <div class="panel-group" id="accordion">        
              </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
  </div>
    </div>
    </div>          
</body> 
</html>
<?php

    if($_POST["submit_search"])
        { $query_all='';
            $select_category=$_POST ["select_category"];
  if($select_category=="")$query_sc="";
  else $query_sc="('".$select_category."')";

    echo $query_all=$query_sc;
  
  
  $i=1;
  $result_searh = mysqli_query($linc, "SELECT * FROM products WHERE category = $query_sc");
  if (mysqli_num_rows($result_searh)==0)
  {
    echo '<h3 class="margin-bottom"><strong>Пошук не дав результатів</strong></h3>';
  }
  if (mysqli_num_rows($result_searh)>0)
          {echo '<h3 class="margin-bottom"><strong>Результат виконання запиту: знайдено &nbsp';
                     echo  mysqli_num_rows($result_searh);
           echo '&nbsp співпадінь </strong></h3>';

                     $row = mysqli_fetch_array($result_searh);
                    
                        echo '
          <h1>Список доданих Товарів</h1>
            <table>
            <tr>
              <th style="width:110px; text-align:left; font-size: 18px;"><strong>Код страви</strong></th>
              <th style="width:200px; text-align:center; font-size: 18px;"><strong>Назва страви</strong></th>
              <th style="width:160px; text-align:center; font-size: 18px;"><strong>Категорія</strong></th>
              <th style="width:150px; text-align:center; font-size: 18px;"><strong>Ціна страви</strong></th>
            </tr>
            </table>
            ';
        do{
             echo '
            <table style="table-layout:fixed; width:700px;" class="table table-striped">  
            <tr>
            <td style="width:140px;">'.$row['product_id'].'</td>
            <td style="width:140px; ">'.$row['menu_name'].'</td>
            <td style="width:140px; ">'.$row['category'].'</td>
            <td style="width:140px; ">'.$row['price'].'</td>
            </tr>                
            </table>
       '; 
                       $i=$i+1;   
                       }
                       while ($row = mysqli_fetch_array($result_searh));  
                   
                     }
                    }
?>