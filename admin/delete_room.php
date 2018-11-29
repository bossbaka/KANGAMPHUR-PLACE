<?php
include('../connection/db.php');

$get_id=$_GET['id'];

mysql_query("delete from tb_rooms where roomID='$get_id'")or die(mysql_error());
header('location:rooms.php');

?>
