<?php
$link = mysqli_connect('localhost', 'root', '', 'kangamph_db');
$link->set_charset('utf8');
?>
<!DOCTYPE html>
<html>
<head>
	<title>:: Confiram ::</title>
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
<br>
<?php
$err = "";
if($_POST) {
  $confir = $_POST['confir'];
  $sql = "SELECT reserveID FROM tb_reserve WHERE transaction_code = '$confir'";
  $r = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($r);
  if(mysqli_num_rows($r)==1) {
    $reserveID = $row[0];
    
    $sql = "SELECT COUNT(*) FROM tb_reserve WHERE reserveID = '$reserveID'";
    $r = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($r);
    $c = $row[0];

      if($c == 1) {
      $confir = $_POST['confir'];
      $lfname =  $_POST['lfname'];
      $cemail = $_POST['cemail'];
      $bank = $_POST['bank'];
      $cprice = $_POST['cprice'];
      $cday = $_POST['cday'];
      $sql = "INSERT INTO tb_confiram VALUES(
            '', '$confir', '$lfname', '$cemail', '$bank', '$cprice', '$cday')";
      if(!mysqli_query($link, $sql)) {
        $err = "ไม่สามารถบันทึกข้อมูล กรุณาตรวจสอบการใส่ข้อมูลของท่าน";
      }
      else {
        echo "<h2>เราจัดเก็บข้อมูลการโอนเงินของท่านแล้ว<br>
            และจะทำการตรวจสอบในลำดับต่อไป<br>
            ขอบคุณครับ / ค่ะ</h2>";
      }
    }

  }
  else { 
    $err = "ไม่พบหมายเลขการสั่งจอง Confirmation Code";
  }
  
  if($err != "") {
    echo '<h2 class="warning">'. $err . "</h2>";
  }
  mysqli_close($link);
}
?>  
	         
<!-- One -->
<form method="post" autocomplete="off">
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>:: Payment Confirmation ::</h2>
					<p>ยืนยันการชำระเงิน</p>
				</header>
        
        <div class="container">
					<div class="row">
						<div class="8u">
							<form name="confiramok" class="formular" method="post" action="">
							<section>
								<h2>กรุณากรอกข้อมูล</h2>
								<p>
                                <ul class="actions">
								                <li>Confirmation Code :<input type="text" name="confir" class="simple-input" required></li><br>
                                <li>ชื่อ - สกุล :<input type="text" name="lfname" class="simple-input"  placeholder="" required></li><br>
                                <li>อีเมล์ :<input type="email" name="cemail" class="simple-input"  placeholder="" required></li><br>
                                <li>ธนาคารที่โอน<select name="bank" required><option value="กรุงไทย">- กรุงไทย</option></select> </li><br>
                                <li>จำนวนเงิน<input type="text" name="cprice" class="simple-input" required></li><br>
                                <li>วันที่โอน  (DD-MM-YY / 00:00) <input name="cday" class="simple-input" type="datetime-local" required></li><br>
                                <hr class="major" />
                       			    <li><input type="submit" value="ส่งข้อมูล"></li>
                       			    <input type="hidden" name="MM_insert" value="confiramok">
								</ul>
               </p>
							</section>
						</div>
					</div>
				</div>
       </section>            
</form>
          
<?php include('footer.php'); ?>

</body>
</html>
