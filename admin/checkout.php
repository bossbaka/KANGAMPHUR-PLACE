<?php include('../connection/db.php'); ?>
<?php include('Top.php'); ?>



<div id="page-wrapper">
            <div class="container-fluid" id="divprint">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12"> <h1 class="page-header"> List of Check-Out <small>รายการที่เลิกจองห้องพัก</small> </h1> </div>
                </div>
                
                <div class="row">     
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                        <th><div align="center">Confirmation Code</div></th>
                        <th><div align="center">หมายเลขห้อง (No.)</div></th>
                        <th><div align="center">ชื่อลูกค้า (Guest)</div></th>
                        <th><div align="center">จำนวนวัน (Days)</div></th>
                        <th><div align="center">วันที่เข้าพัก (Arrival)</div></th>
                        <th><div align="center">วันที่เลิกพัก (Departure)</div></th>
                        <th><div align="center">ยอดรวม (Total)</div></th>
                        <th><div align="center">สถานะ (Status)</div></th>
                        <th><div align="center">วันที่ (Date)</div></th>

                        
                                    </tr>
                                </thead>

<?php
    $cart_table = mysql_query("select  * from tb_reserve where status='checkout'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['reserveID'];
                                        $product_id = $cart_row['roomID'];
                                        $member_id = $cart_row['memberID'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
    $member_query = mysql_query("select * from tb_member where memberID = '$member_id'")or die(mysql_error());
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
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['Date']; ?></div></td>
                                        
                                            
                                       

                                        </tr>
               </tbody>
               <?php }?>
        </table>        
            <button type="submit" class="btn btn-primary" onclick="printDiv('divprint')" style=" margin-bottom:10px;"><i class="glyphicon glyphicon-print"></i> Print</button>
    </div>
  </div>
</div>     

            </div>  <!-- class row -->
</div> <!-- class wrapper -->  
<!-- /#wrapper -->

<script type="text/javascript"> 
function printDiv(divName) { 
var printContents = document.getElementById(divName).innerHTML; 
var originalContents = document.body.innerHTML; 

document.body.innerHTML = printContents; 
window.print(); 

document.body.innerHTML = originalContents; 
} 
</script> 
</body>
</html>                      						                                                                                        