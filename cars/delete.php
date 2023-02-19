<?php
require_once "../include/db_connect.php";
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
if ($_GET["LKod"]!="")
	{$id =$_GET["LKod"];
          
		$delete = mysqli_query($linc,"DELETE FROM List WHERE LKod ='$id'");
		echo 'Видалено Автомобіль - '.$_GET["LName"].' '.$_GET["LModel"].' '.$_GET["LPrice"].''.$_GET["LYear"].''.$_GET["LDataPostup"].''.$_GET["LClientPrizv"];  
        header('Location: ../index.php');
	}
?>