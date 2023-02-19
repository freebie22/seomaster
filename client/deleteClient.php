<?php
if ($_GET["CKod"]!="")
	{$id =$_GET["CKod"];
          
		$delete = mysqli_query($linc,"DELETE FROM Client WHERE CKod ='$id'");
        header('Location: viewClient.php');
	}
?>