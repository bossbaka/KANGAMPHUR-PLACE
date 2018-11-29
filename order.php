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
  <title>:: Order ::</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    
<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="admin/css/bootstrap.min.css" />
<style type="text/css">

body {
  font-family: 'Kanit', sans-serif;
}  
</style>
</head>
<?php
$query = mysql_query("select * from tb_member where memberID") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                        $memberID = $row['memberID'];
                                        $m = $memberID + 1;
?>                           
<?php }?>
    
<?php
$query = mysql_query("select * from tb_rooms where roomID")or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)){
                                    $rname = $row['name'];     
?>                                  
<?php }?>

<?php


  function createRandomPassword() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 11) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}

  $confirmation = createRandomPassword();
  $start = $_POST['start'];
  $end = $_POST['end'];
  $result = $_POST['result'];
  $total = $_POST['total'];
  $roomID = $_POST['roomID'];

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $cnumber = $_POST['cnumber'];

  $address = $_POST['address'];

              
  //send the email


if($_POST) {
ini_set("SMTP", "mail.kangamphurplace.com");
include "thaimailer.php";

$mail_To = "$email,support@kangamphurplace.com";
$mail_Subject = '=?utf-8?B?'.base64_encode("เรียนคุณลูกค้าที่ได้จองพักกับเรา จาก  Kangamphurplace").'?=';
$mail_Body = '=?utf-8?B?'.base64_encode(
"Confirmation Number : $confirmation\n".
"หมายเลขห้องที่ : $rname\n".
"ชื่อ : $firstname\n".
"นามสกุล : $lastname\n".
"Email : $email\n".
"เบอร์โทรศัพท์ : $cnumber\n".
"Check In : $start\n".
"Check Out : $end\n".
"จำนวนวัน : $result\n".
"รวมราคา : $total\n".
"\n".
"การชำระเงิน * กรุณาชำระเงินภายในเวลา 2 วันหลังจากทำการจอง\n".
"ชำระเงินโดยการโอนเงินเข้ามา\n".
"ชื่อบัญชี : เดือน ปิ่นเปีย\n".
"ธนาคาร กรุงไทย\n". 
"เลขที่บัญชี 115-1-24038-9\n".
"หลังจากท่านชำระเงินแล้ว แจ้งการชำระเงิน\n".
"เบอร์โทรติดต่อ 090-1184672, 081-8540473\n").'?=';
mail($mail_To, $mail_Subject, $mail_Body);
}
   
mysql_query("update tb_rooms set status='Reserved' where roomID='$roomID'") or die(mysql_error());  
 
$query = mysql_query("insert into tb_member (firstname,lastname,email,contact_number,address)
      values('$firstname','$lastname','$email','$cnumber','$address')") or die(mysql_error());
      
$sql = mysql_query("insert into tb_reserve (memberID,roomID,days_no,total,arrival,departure,status,transaction_code)
      values('$m','$roomID','$result','$total','$start','$end','reserved','$confirmation')");    
?>
    
 <style type="text/css">
      .form-signin {
        max-width: 750px;
        padding: 29px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
    </style>

 
<script type = 'text/javascript' >
function changeHashOnLoad() {
     window.location.href += '#';
     setTimeout('changeHashAgain()', '50'); 
}

function changeHashAgain() {
  window.location.href += '1';
}

var storedHash = window.location.hash;
window.setInterval(function () {
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);
window.onload=changeHashOnLoad;
</script> 


<body>



<div class="container" id="divprint"><!--Container -->

	

	<div class="form-signin">
    
    <h3>ขอบคุณสำหรับการจองห้องเช่า "ข้างอำเภอเพลส"</h3>
    <h4>* ข้อมูลนี้ถูกส่งไปทางอีเมล์ของท่านแล้ว  กรุณาเก็บหลักฐานฉบับนี้ไว้ สำหรับการยืนยัน</h4>    
			<hr>
            
            
            <div id="print_content">
          
    <table>
    			<tr class="alert alert-danger">
					<td><strong>Confirmation Code:</strong></td>
                    <td width="300px"><div align="right"><?php echo $confirmation;?></div></td>
 				</tr>

             
                <tr>
                  
                    <td><strong>หมายเลขห้องที่:</strong></td>
                    <td width="100px"><div align="right"><?php echo $rname;?></div></td>
                
                </tr>




                
            	<tr>
					<td><strong>วันที่เข้าพัก:</strong></td>
                    <td width="300px"><div align="right"><?php echo $start;?></div></td>
 				</tr>
                
                
                <tr>
                	<td><strong>วันที่เลิกพัก:</strong></td>
                	<td><div align="right"><?php echo $end;?></div></td>                
                </tr>
                <tr>
                	<td><strong>จำนวนวัน:</strong></td>
                	<td><div align="right"><?php echo $result;?></div></td>
                </tr>

                <tr class="alert alert-info">
                    <td><strong>รวมราคาทั้งหมด:</strong></td>
                    <td width="170px"><div align="right"><?php echo $total;?> บาท</div></td>
                </tr>

                <tr class="alert alert-success">
					         <td><strong>รายละเอียดของผู้เข้าพัก</strong></td>
                    <td width="500px"><div align="right"></div></td>
 				</tr>
                
                <tr>
					<td><strong>ชื่อ:</strong></td>
                    <td width="300px"><div align="right"><?php echo $firstname;?></div></td>
 				</tr>
                
                <tr>
					<td><strong>นามสกุล:</strong></td>
                    <td width="300px"><div align="right"><?php echo $lastname;?></div></td>
 				</tr>
                <tr>
					<td><strong>E-mail:</strong></td>
                    <td width="300px"><div align="right"><?php echo $email;?></div></td>
 				</tr>
              
                <tr>
					<td><strong>เบอร์โทร:</strong></td>
                    <td width="300px"><div align="right"><?php echo $cnumber;?></div></td>
 				</tr>
                <tr>
					<td><strong>ที่อยู่:</strong></td>
                    <td width="300px"><div align="right"><?php echo $address;?></div></td>
 				</tr>
        
 
            </table>
            <hr>
          
   </div>         
              <p>
            หากไม่พบข้อความจากอีเมล์ในช่องกล่องจดหมาย กรุณาเช็คที่ จดหมายขยะ <br><br> 
            การชำระเงิน
            * กรุณาชำระเงินภายในเวลา 2 วันหลังจากทำการจอง <br>
            ชำระเงินโดยการโอนเงินเข้ามา <br> 
            <a href="#">ชื่อบัญชี : เดือน ปิ่นเปีย </a><br> 
            <a href="#">ธนาคาร กรุงไทย</a> <br>
            <a href="#">เลขที่บัญชี 115-1-24038-9</a> <br>
            หลังจากท่านชำระเงินแล้ว แจ้งการชำระเงิน <a href="confiram.php" target="_blank">ที่นี่</a><br>
            เบอร์โทรติดต่อ 090-1184672, 081-8540473
            <br><br>
        
                  <button type="submit" class="btn btn-primary" onclick="printDiv('divprint')" style=" margin-bottom:10px;"><i class="glyphicon glyphicon-print"></i> Print</button>

                   <div align="right"><a href="index.php">กลับหน้าแรก</a></div>
	</div><!--form end -->
    
   
    	                           
</div><!--container end -->

</body>


  <script type="text/javascript"> 
function printDiv(divName) { 
var printContents = document.getElementById(divName).innerHTML; 
var originalContents = document.body.innerHTML; 

document.body.innerHTML = printContents; 
window.print(); 

document.body.innerHTML = originalContents; 
} 
</script> 

</html>