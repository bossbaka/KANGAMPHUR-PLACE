<?php include('connection/db.php');?>	

<!DOCTYPE html>
<html>
<head>
	<title>:: Contact ::</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<?php include('header.php'); ?>

<script>
function goBack()
  {
  window.history.back()
  }
</script>

<body id="top">
<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="index.php">Kangamphur place</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">หน้าแรก</a></li>
						<li><a href="room.php">ค้นหาห้อง</a></li>
						<li><a href="about.php">เกี่ยวกับ</a></li>
						<li><a href="contact.php">ติดต่อเรา</a></li>
						<li><a href="step.php">วิธีการจองห้องพัก</a></li>
						<li><a href="confiram.php" class="button special">ยืนยันการชำระเงิน</a></li>
					</ul>
				</nav>
			</header>	

<?php
$emailto='support@kangamphurplace.com'; //อีเมล์ผู้รับ
$subject='$heade'; //หัวข้อ
$heade.= "Content-type: text/html; charset=windows-620\n";
$heade.="from: ".$name."E-mail :".$mail; //ชื่อและอีเมลผู้ส่ง
$messages.= "$text</br>"; //ข้อความ
$messages.= "จาก $sender<br>"; //ข้อความ

$send_mail = mail($emailto,$subject,$messages,$heade);

if(!$send_mail)
{
echo"ยังไม่สามารถส่งเมลล์ได้ในขณะนี้";
}
else
{
echo "ส่งเมลล์สำเร็จ";
}
?>


<?php include('footer.php'); ?>
</body>
</html>