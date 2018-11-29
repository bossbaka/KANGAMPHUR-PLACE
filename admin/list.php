<?php include('../connection/db.php');?>
<?php include('Top.php'); ?>

<div id="page-wrapper">
            <div class="container-fluid">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12"> <h1 class="page-header">Pending <small>รอดำเนินการจอง</small> </h1> </div>
                </div>

                
                <div class="row">     
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                        <th><div align="center">Confirmation</div></th>
                        <th><div align="center">หมายเลขห้อง (No.)</div></th>
                        <th><div align="center">ชื่อลูกค้า (Guest)</div></th>
                        <th><div align="center">จำนวนวัน (Days)</div></th>
                        <th><div align="center">วันที่เข้าพัก (Arrival)</div></th>
                        <th><div align="center">วันที่เลิกพัก (Departure)</div></th>
                        <th><div align="center">ยอดรวม (Total)</div></th>
                        <th><div align="center">สถานะ (Status)</div></th>
                        <th><div align="center"><a data-trigger="hover" title="Buttons Function">การจัดการ (Actions)</a></div></th>
                                    </tr>
                                </thead>     

<?php
    $cart_table = mysql_query("select * from tb_reserve where status='reserved'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['reserveID'];
                                        $product_id = $cart_row['roomID'];
                                        $member_id = $cart_row['memberID'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);										
?>
<?php

  $member_query = mysql_query("SELECT * FROM tb_member where memberID='$member_id'")or die(mysql_error());
                    $member_row=mysql_fetch_array($member_query);
?>

               					 <tbody>
                						<tr>   
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['transaction_code']; ?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $product_row['name']; ?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname']; ?> <?php echo $member_row['lastname']; ?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['days_no']; ?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['arrival']; ?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['departure']; ?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['total']; ?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['status']; ?></div></td>

                                            
                                            <td width="430"><div align="center">
                                            <a href="#change<?php echo $order_id; ?>" class="btn btn-default" role="button" data-toggle="modal"><i class="glyphicon glyphicon-edit"></i> ย้ายห้อง (Move)</a>          
                                            <a href="#checkin<?php echo $order_id; ?>" class="btn btn-default" role="button" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> ยืนยันการเข้าจอง</a>
                                            <a href="#delete_listres<?php echo $order_id;?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                            </div></td>   

<!-- Modal Check-In rooms -->
<div id="checkin<?php echo $order_id; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">ข้างอำเภอเพลส - เข้าจอง (Check-In)</h3>
</div>

<div class="modal-body">
	<div class="alert-block">         	
                 	<p><strong>Transaction Code : </strong><?php echo $cart_row['transaction_code']; ?></p>
                  <p><strong>ชื่อลูกค้า (Guest Name) : </strong> <?php echo $member_row['firstname']; ?> <?php echo $member_row['lastname']; ?></p>
               
	</div>          
	<div class="alert alert-info"><h4><strong>ราคารวม : </strong> <?php echo $cart_row['total']; ?> บาท </h4></div>
</div>
                         		
<div class="modal-footer">
    <a class="btn btn-danger" href="phploadcheckin.php<?php echo '?id='.$order_id; ?>"><i class="glyphicon glyphicon-check"></i> Checkin</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
</div>  
	
	</div>
  </div>
</div> 

<!-- Modal delete List Res -->
<div id="delete_listres<?php echo $order_id; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">ข้างอำเภอเพลส - ลบรายการจองนี้ (Delete)</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>คุณแน่ใจหรือว่าต้องการลบ ?</p></div>
  </div>
  <div class="modal-footer">
    <a class="btn btn-danger" href="delete_ListRes.php<?php echo '?id=' . $order_id; ?>" ><i class="glyphicon glyphicon-check"></i>&nbsp;Yes</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Close</button>
  </div>

</div>
</div>

</div>

<!-- Modal Change rooms -->
<div id="change<?php echo $order_id;?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">ข้างอำเภอเพลส - ย้ายห้อง</h3>
</div>

<div class="modal-body"> 
  <form action="res.php" method="post">   <!-- res.php move-->
  <input name="reserveid" type="hidden" value="<?php echo $order_id;?>">
  <input name="roomp" type="hidden" value="<?php echo $product_id;?>">
  
  <div align="center">Room Number: 
  <select class="span2" name="roomID">
  <?php 
	$resc = mysql_query("select * from tb_rooms where roomID and status = 'available'") or die (mysql_error());
 		while ($row_sche = mysql_fetch_array($resc)){
  ?>
  
 <option  value="<?php echo $row_sche['roomID']?>"><?php echo 'Room'." ".$row_sche['name'];?></option> 
 
 <?php }?>
  </select>
  </div>

</div>
  
<div class="modal-footer">
    <button type="submit" class="btn btn-info" name="res"><i class="glyphicon glyphicon-edit"></i> Change</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Close</button>
</div>
 </form> <!-- form res.php move -->  

	</div>
  </div>
</div> 

                                       </tr>
               </tbody>
               <?php }?>
        </table>        
      


            </div>  <!-- class row -->
</div> <!-- class wrapper -->  
<!-- /#wrapper -->


</body>
</html>                                  