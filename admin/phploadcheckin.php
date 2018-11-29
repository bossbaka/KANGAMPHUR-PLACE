<?php
include('../connection/db.php');
$get_id=$_GET['id'];
mysql_query("update tb_reserve set status='checkin' where reserveID='$get_id'")or die(mysql_error());
header('location:checkin.php');
?>