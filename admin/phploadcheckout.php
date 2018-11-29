<?php
include('../connection/db.php');
include('user_name.php');
$get_id=$_GET['id'];
$roomID = $_POST['roomID'];
$t = $_POST['t'];
mysql_query("update tb_reserve set totalamount='$t',Date='$Today' ,status='checkout' where reserveID='$get_id'")or die(mysql_error());
mysql_query("update tb_rooms set status='Available' where roomID='$roomID'") or die(mysql_error());
header('location:checkout.php');
?>