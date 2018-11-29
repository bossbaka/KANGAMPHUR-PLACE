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
if($_POST) {
require('PHPMailer/PHPMailerAutoload.php');
$oMail = new PHPMailer();
$oMail->CharSet = "utf-8";
$oMail->isSMTP();
$oMail->Host = 'mail.kangamphurplace.com';
$oMail->Username = 'support@kangamphurplace.com';
$oMail->Password = '123456';
/***/
$oMail->SMTPAuth = true;
$oMail->SMTPSecure = 'tls';
$oMail->Port = 25;
$oMail->isHTML(true);
/****/
$oMail->FromName = $_POST['name']; //Remitente 
$oMail->From = $_POST['from']; //Remitente 
$oMail->addAddress('support@kangamphurplace.com'); //Destinatario
$oMail->addReplyTo($_POST['name'], $_POST['from']);
$oMail->Subject = $_POST['subject']; //asunto 
$oMail->Body = $_POST['body']; //contenido
/***/
if($oMail->send() == false){
    echo "การส่งข้อมูลล้มเหลว";
    echo $oMail->ErrorInfo;
} else {
    echo "ข้อมูลการติดต่อของท่านถูกส่งออกไปแล้ว";
} 

}   
?>               
	<!-- One -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>:: Contact ::</h2>
					<p>ติดต่อสอบถาม</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="8u">
							<section>
								<h2>แผนที่</h2>
								<iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/d/embed?mid=zTchDOfznYRg.kPHKp6juVC_I"></iframe>
								<form method="post" enctype="multipart/form-data">								<p>
                                <ul class="actions">
								<li>ชื่อ - นามสกุล<input name="name"  type="text" class="simple-input" placeholder="ชื่อ"  required></li><br>
								<li>อีเมล์ของคุณ<input name="from" type="email" class="simple-input" placeholder="อีเมล์"  required></li><br>
								<li>หัวข้อ <input name="subject" type="text" class="simple-input" placeholder="หัวข้อ"  required> </li><br>
                                <li>ข้อความ <textarea name="body" cols="50" rows="5" placeholder="ข้อความของคุณ" required></textarea></li>
                                <br>  
                                <hr class="major" />
                       			 <li><button type="submit" class="button big special">ส่งข้อความ</button></li>
								</ul>
                                </p>
                                </form>
                                <?php if(!empty($message)) echo $message; ?>
							</section>
						</div>
					</div>
				</div>
			</section>


<?php include('footer.php'); ?>
</body>
</html>


