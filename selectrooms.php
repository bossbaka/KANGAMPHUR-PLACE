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

<script>
function goBack()
  {
  window.history.back()
  }
</script>
</head>
	<?php
	$start=$_POST['start'];
	$end=$_POST['end'];
	
	$r=$_POST['result'];

	if ($r==0){		
		$r=$r+1;
		$result = sprintf ("%.1d", $r);
		}
		else{
			$result = sprintf ("%.1d", $r);
			$result;
			}
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
			<section id="two" class="wrapper style2">
				<header class="major">
					<h2>รายละเอียดการจอง : <br>
					วันที่ <?php echo $start?>
					ถึง <?php echo $end?> 
					จำนวน <?php echo $result?> คืน <div onClick="goBack()" class="button alt small">ยกเลิก</div></h2>
				</header>
			</section>

			<section id="two" class="wrapper style1">
         		<div class="container">
         		<div class="row">
         			<div class="12u">
					
<!-- Table -->
				<section>
				<header class="major">
					<h2>:: โปรดเลือกห้องที่จะจอง ::</h2>
				</header>
							<div class="table-wrapper">

							<table>                       
                            <thead>
                                <tr>
                                    <th>หมายเลขห้องที่</th>
                                    <th>รายละเอียด</th>
                                    <th>ราคาห้อง</th>
                                    <th>Status</th>
                        		    <th>Reserve</th>                          
                                </tr>
                            </thead>
                            
                            <tbody>                            
                                      <?php									  
                                    $query = mysql_query("select * from tb_rooms order by roomID ") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                        $id = $row['roomID'];
										$price = $row['price'];																		
                                        ?>                                 
                                        <tr>
                                            <td><?php if($row['status']=='Available'){ echo $row['name'];}else{echo '-&deg;-';}?></td>
                                            <td><?php if($row['status']=='Available'){echo $row['description'];}else{ echo '-&deg;-';}?></td>    
											<td><?php if($row['status']=='Reserved'){ echo '-&deg;-';}else{echo $price; echo' บาท';}?></td>                                 
                                            <td><strong>
                                            <?php if ($row['status']=='Available'){
												$disabled = "";
												echo '<div style="color:rgba(0,153,51,1);font-size:18px;"> ยังไม่ถูกจอง (Available) </div>';}									
													elseif($row['status']=='Reserved'){
															echo '<div style="color:rgba(255,0,0,1);font-size:18px;font-style:italic;"> เต็มแล้ว (Reserved) </div>';
															$disabled = 'disabled="disabled"';
														}
													else{
													echo 'ปรับปรุง';
													$disabled = 'disabled="disabled"';
													}
												?>											</strong></td>						     
                    					<form method="post" action="reservation.php">
											<input name="start" type="hidden" value="<?php echo $start;?>">
                   						    <input name="roomID" type="hidden" value="<?php echo $row['roomID'];?>">
                    						<input name="end" type="hidden" value="<?php echo $end;?>">
                    						<input name="result" type="hidden" value="<?php echo $result;?>">
                    						<input name="total" type="hidden" value="<?php echo $total;?>">
                    						<td><div><button class="button alt small" name="submit" type="submit" <?php echo $disabled?>> Room <?php echo $row['name'];?></button></div></td>                   		
										</form>                             						 											
                                  		</tr>                                                                                         
                        		<?php } ?>

                            
                            </tbody>
                        </table>	

								</div>
							</section>

				

					</div>
				</div>
				</div>

           	</section>

        	
<?php include('footer.php'); ?>



</body>
</html>