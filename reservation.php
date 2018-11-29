<?php
session_start();
if(!$_POST) {
	exit;
}
?>
<?php include('connection/db.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>:: SelectRooms ::</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<?php include('header.php'); ?>

		<script type="text/javascript" src="js/datepicker.js"></script>
		<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
		<script src="admin/js/bootstrap-modal.js"></script>  

		<script src="js/jquery.form.validator.min.js"></script>
		<script src="js/security.js"></script>
		<script src="js/file.js"></script>
		<link href="css/validator.css" rel="stylesheet">
		   
		<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
function goBack()
  {
  window.history.back()
  }
</script>

<script>
			jQuery(document).ready(function() {
				// binds form submission and fields to the validation engine
				jQuery("#formID").validationEngine({
					autoHidePrompt:true,
					prettySelect : true,
					useSuffix: "_chzn"

					//promptPosition : "bottomLeft"
				});
				$("#country").chosen({
					allow_single_deselect : true
				});
			});
		</script>
        
        <script>
		jQuery(document).ready(function(){
			jQuery("#formID").validationEngine();

			$("#formID").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })
		});
		</script>

</head> 
  
  <?php 

  $start = $_POST['start'];
  $end = $_POST['end'];
  $result = $_POST['result'];
  $total = $_POST['total'];
  $roomID = $_POST['roomID'];


  $query = mysql_query("select * from tb_rooms where roomID = $roomID")or die(mysql_error());
			while ($row = mysql_fetch_array($query)){
				$rname = $row['name'];
				$price = $row['price'];
				$total = $price * $result;
  ?>



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

<!-- One -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>:: RESERVATIONS ::</h2>
					<p>จองห้องพัก</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="8u">
							<section>
								<h2>กรอกรายละเอียดผู้เข้ามาพัก</h2>
								<p>
                <form id="formID" class="formular" method="post" action="order.php">
      							<ul class="actions">

      				<input name="start" type="hidden" value="<?php echo $start;?>">				
      				<input name="end" type="hidden" value="<?php echo $end;?>">
                    <input name="result" type="hidden" value="<?php echo $result;?>">
                    <input name="total" type="hidden" value="<?php echo $total;?>">
                    <input name="roomID" type="hidden" value="<?php echo $roomID;?>">



								<li>ชื่อ<input type="text" name="firstname" id="req" class="simple-input" required> </li>
                                <li>สกุล<input type="text" name="lastname" id="req2" class="simple-input"  required></li><br>
								<li>อีเมล์<input type="text" name="email" id="email" class="simple-input" data-validation="email" required></li>
								<li>เบอร์โทรศัพท์<input type="text" name="cnumber" id="telephone"  maxlength="11" data-validation="custom" data-validation-regexp="^[0-9]" required></li><br>
                                
                                
                                <li>ที่อยู่</li>
                                <div class="12u"><textarea name="address" rows="4" placeholder="" data-validation="required" required></textarea></div><br>     
                                  

										<input type="checkbox" data-validation="required" data-validation-error-msg="กรุณากรอกข้อมูล" id="agree" name="agree" required/>
										<label for="agree"><span>ฉันเห็นด้วยและ<a href="#myModal" data-toggle="modal">ยอมรับข้อตกลงและเงื่อนไข</a></span></label>

                                <hr class="major" />
                       			 
								</ul>
                                </p>
							</section>
						</div>
<!-- One Right -->                        
						<div class="4u">
							<section>
								<h3>ข้อมูลที่ทำการจอง</h3>
								

									<p>หมายเลขห้อง <?php echo $rname;?><br>
									ราคาห้อง <?php echo $row['price'];?> บาท <br>
									วันที่เข้าพัก <?php echo $start;?> <br>
									วันที่เลิกพัก <?php echo $end;?> <br>
									จำนวน <?php if ($result==1){echo $result; echo ' night'; }else{echo $result; echo ' คืน';}?> <br><br>
									<h2>รวมราคา <?php echo $total;?> บาท</h2> </p>
									<hr class="major" />
                       			    <div id="bottom"><button name="order" type="submit" class="button special">ยืนยันการสั่งจอง</button></div><br>
							
							</section>
						
                    </section>

<!-- Modal -->
  <div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
  	<div class="modal-content">


  <div class="modal-header"> 
  <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3 id="myModalLabel">รายละเอียดข้อตกลงและเงื่อนไข</h3>
  </div>
  <div class="modal-body">
    1. หลังจากท่านได้ทำการเลือกจองห้องเช่าแล้ว <div class="red">ท่านต้องชำระเงินภายในเวลา 2 วัน</div>
    2. เมื่อท่านชำระเงินแล้ว กรุณาแจ้งการโอนเงินมาให้ทางเราทราบด้วย 
    
  </div>
  <div class="modal-footer">
    <button class="button small" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>

</div>
</div>
</div>



</form>
 <?php }?>
		<?php include('footer.php'); ?>

        <script>
            $.validate({
                modules: 'security, file',
                onModulesLoaded: function () {
                    $('input[name="pass_confirmation"]').displayPasswordStrength();
                }
            });
        </script>	
</body>

</html>