<?php
	//session_start();

	include ("include/db_connect.php");
	
	echo $id_st=$_GET["id_st"];
	
?>



<!-- === BEGIN HEADER === -->


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>АІС БКПЕП</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
    
	<style>
  .fakeimg {
      height: 200px;
      background: #aaa;
			}
	</style>
	
	</head>
   
      <div id="body-bg">
            <!-- Phone/Email -->
            <div id="pre-header" class="background-gray-lighter">
                <div class="container no-padding">
                    <div class="row hidden-xs">
                        <div class="col-sm-6 padding-vert-5">
                            <strong>Телефон:</strong>&nbsp;(04143)2-14-45
                        </div>
                        <div class="col-sm-6 text-right padding-vert-5">
                            <strong>Email:</strong>&nbsp;bcpep@ukr.net
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Phone/Email -->
            <!-- Header -->
            <div id="header">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html" title="">
                              <img src="assets/img/logo.png" alt="Logo" />
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>
                </div>
            </div>
            <!-- End Header -->
			
			<!-- Top Menu -->
			<?php include ("include/top_menu.php");?>
            <!-- End Top Menu -->
           
            <!-- === END HEADER === -->
         
		   <!-- === BEGIN CONTENT === -->
	
                   
     <div class="container bottom-border">
            <div class="row padding-top-40">
                <div class="col-md-6" style="width:60%; margin-left:20%; marging-right:20%; padding-top:10px">
                            
					<form class="signup-page" method="POST">
                             <div class="signup-header" style="width:54%; margin-left:23%; marging-right:23%">
                                    <p style="font-size:22px; color:#0c0e0c;align-text:center"><strong>Перегляд даних про студента</strong></p>
								</div>
						<?php
						  $result = mysqli_query($linc,"SELECT * FROM student WHERE s_id='$id_st'");
						  if (mysqli_num_rows($result)>0)
							{
							$row = mysqli_fetch_array($result);
							 do
							 {if ($row["image"]=='') 
								{$img_path='uploads_images/0_0.png';}
							  else {$img_path = 'uploads_images/'.$row["image"];}	
					          echo '      
						 	   <div style="width:40%; margin-left:30%; marging-right:30%; padding-top:10px"">
							   <img src="'.$img_path.'" width="240px" heigth="240px" />
							   ';
											    
							  echo '  
							   </div>
                               <label><strong>Прізвище</strong></label>
								<strong> <input type="text" class="form-control" name="form_pr_stud" value="'.$row['s_pr'].'" style="background:white; color:#0c0e0c; border:none;"  ></strong>
								
								<label><strong><strong>Ім"я</strong></label>
								<input type="text" class="form-control" name="form_im_stud" value="'.$row['s_im'].'" style="background:white; color:#0c0e0c; border:none;"  >
								
								<label><strong>По батькові</strong></label>
								 <input type="text" class="form-control" name="form_bat_stud" value="'.$row['s_bat'].'" style="background:white; color:#0c0e0c; border:none;"  >
								
								<label><strong>Стать</strong></label>
								 <input type="text" class="form-control" name="form_stat_stud" value="'.$row['s_stat'].'" style="background:white; color:#0c0e0c; border:none;"  >
																
								<label><strong>Дата народження</strong></label>
								<input type="date" class="form-control" name="form_dnar_stud" value="'.$row['s_dnar'].'" style="background:white; color:#0c0e0c; border:none;" >
								
								<label><strong>Група</strong></label>
								<input type="text" class="form-control" name="form_gr_stud" value="'.$row['s_group'].'" style="background:white; color:#0c0e0c; border:none;"  >
								
								<label><strong>Навчання за регіональним замовленням</strong></label>	
								<input type="text" class="form-control" name="form_zamovl_stud" value="'.$row['s_contract'].'" style="background:white; color:#0c0e0c; border:none;"  >	  
															  
								<label><strong>Рік завершення школи</strong></label>
									<input type="text" class="form-control" name="form_zscool_stud" value="'.$row['s_rik_zaver'].'" style="background:white; color:#0c0e0c; border:none;"  >
								 
								 <label> <strong>Регіон проживання</strong></label>
								 <input type="text" class="form-control" name="form_reg_type_stud" value="'.$row['s_region_type'].'" style="background:white; color:#0c0e0c; border:none;"  >
								 								 
								 <label> <strong>Область проживання</strong></label>
								 <input type="text" class="form-control" name="form_region_stud" value="'.$row['s_region'].'" style="background:white; color:#0c0e0c; border:none;"  >
									
								 <p></p>
								  <label><strong>Соціальна категорія</strong></label>
								 <p></p>
								 <label>Діти-сироти та діти позбавлені батьківського пілкування</label>	
								 <input type="text" class="form-control" name="form_sirot_stud" value="'.$row['s_sirota'].'" style="background:white; color:#0c0e0c; border:none;"  >	  
								  								  
								 <label>Переселенці</label>	
								 <input type="text" class="form-control" name="form_peres_stud" value="'.$row['s_peresel'].'" style="background:white; color:#0c0e0c; border:none;"  >	  
												  
								 <label>Інваліди</label>	
								 <input type="text" class="form-control" name="form_ivalid_stud" value="'.$row['s_inval'].'" style="background:white; color:#0c0e0c; border:none;"  >	  
								

								 <label>Малозабезпечені</label>	
								 <input type="text" class="form-control" name="form_malozab_stud" value="'.$row['s_malozab'].'" style="background:white; color:#0c0e0c; border:none;"  >	  
								  
								 <label>Учасники бойвих дій та їх діти</label>	
								 <input type="text" class="form-control" name="form_uchbd_stud" value="'.$row['s_war_act'].'" style="background:white; color:#0c0e0c; border:none;"  >	  
								 								  
								 <label>Адреса</label>
								 <input type="text" class="form-control"  name="form_adres" value="'.$row['s_adresa'].'" style="background:white; color:#0c0e0c; border:none;">
								
								 <label>Тел.№ студента</label>
								 <input type="text" class="form-control"  name="form_tel_st" value="'.$row['s_tels'].'" style="background:white; color:#0c0e0c; border:none;">
								
								 <label>Тел.№ батька</label>
								 <input type="text" class="form-control"  name="form_tel_bat" value="'.$row['s_telb'].'" style="background:white; color:#0c0e0c; border:none;"> 	
									
								<label>Тел.№ матері</label>
								 <input type="text" class="form-control"  name="form_tel_mut" value="'.$row['s_telm'].'" style="background:white; color:#0c0e0c; border:none;">
								';
							 }
					
						while ($row = mysqli_fetch_array($result));	
					}
					echo '<div style="margin-top:10px">';
					$query_img = mysqli_query($linc,"SELECT * FROM image WHERE id_student='$id_st'");
							 if (mysqli_num_rows($query_img)>0)
							{
							$row_img = mysqli_fetch_array($query_img);
							 do
							 {$img_path =$row_img ["name_image"];	
					          echo '  
							 
							   <img src="'.$img_path.'" width="120px" heigth="120px"/>
							 
									';
							 }	
							 while ($row_img = mysqli_fetch_array($query_img));
							}
					echo '</div>';		
					?>
					</form>
   
					</div>
					</div>
				  </div>
				</div>
		
         
		  <!-- === END CONTENT === -->	
      
             
		  <!-- Footer -->
            <div id="footer" class="background-grey">
                <div class="container">
                    <div class="row">
                        <!-- Footer Menu -->
                        <div id="footermenu" class="col-md-8">
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="bcpep.org.ua" target="_blank">bcpep.org.ua</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Footer Menu -->
                        <!-- Copyright -->
                        <div id="copyright" class="col-md-4">
                            <p class="pull-right">(c) <script type='text/javascript'>var mdate = new Date();document.write(mdate.getFullYear());</script> BCPEP Cocporation</p>
                        </div>
                        <!-- End Copyright -->
                    </div>
                </div>
            </div>
            <!-- End Footer -->
            <!-- JS -->
            <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/scripts.js"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
            <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
            <!-- Modernizr -->
            <script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
            <!-- End JS --><div style="position:absolute;left:-3072px;top:0"><div class="width=100% height=100% align-left"></div><div class="align-left" width="1"></div><a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#108;&#105;&#110;&#105;&#121;&#97;&#111;&#107;&#111;&#110;&#46;&#114;&#117;">&#1086;&#1082;&#1085;&#1072;</a> <!-- div --><!-- div end --> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#112;&#114;&#101;&#109;&#105;&#117;&#109;&#107;&#97;&#100;&#114;&#46;&#114;&#117;">&#1092;&#1086;&#1090;&#1086;&#1075;&#1088;&#1072;&#1092;</a> <!-- div --><!-- div end --> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#117;&#110;&#105;&#115;&#104;&#97;&#98;&#108;&#111;&#110;.&#99;&#111;&#109;">html php</a> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#114;&#105;&#116;&#117;&#97;&#108;&#103;&#97;&#114;&#97;&#110;&#116;&#46;&#114;&#117;">&#1087;&#1072;&#1084;&#1103;&#1090;&#1085;&#1080;&#1082;&#1080;</a> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#116;&#117;&#116;&#108;&#111;&#118;&#101;&#46;&#114;&#117;">&#1079;&#1085;&#1072;&#1082;&#1086;&#1084;&#1089;&#1090;&#1074;&#1072;</a></div></body>
 <body>
</html>