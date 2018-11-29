<?php include('../connection/db.php');?>
<?php include('Top.php'); ?>



<div id="page-wrapper">
            <div class="container-fluid">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12"> <h1 class="page-header"> List of Check-In <small>รายการที่เข้าห้องพัก</small> </h1> </div>
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
                        <th><div align="center"><a data-trigger="hover" title="Buttons Functions">การจัดการ (Actions)</a></div></th>
                                    </tr>
                                </thead>  

<?php
    $cart_table = mysql_query("select  * from tb_reserve where status='checkin'") or die(mysql_error());
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

										    <td width="228px"><div align="center"><a href="#checkout<?php echo $order_id; ?>" class="btn btn-default" role="button" data-toggle="modal"><i class="glyphicon glyphicon-off"></i> Check-Out</a>
                                            </div></td>




<!-- Modal Check out -->
<div id="checkout<?php echo $order_id; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">                                        

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">ข้างอำเภอเพลส - วันที่ออกจอง (Check-out)</h3>
</div>

<div class="modal-body">
    <form action="phploadcheckout.php<?php echo '?id='.$order_id; ?>" method="post">  <!-- Form Check out -->
                <input name="t" type="hidden" value="<?php echo $t;?>"/>
                <input name="roomID" type="hidden" value="<?php echo $product_id;?>"/>
                                                 
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Kingsfield Express Inn Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
                <a style=" margin-bottom:10px;" class="btn btn-info" href="javascript:Clickheretoprint()"><i class="glyphicon glyphicon-print"></i> Print Receipt</a>                       
                 
                 <div id="print_content"> <!--Print Receipt -->  
                                        
                 <div class="alert-block">       
                    <p><strong>Transaction Code : </strong><?php echo $cart_row['transaction_code']; ?></p>
                    <p><strong>ชื่อลูกค้า (Guest Name) : </strong> <?php echo $member_row['firstname']; ?> <?php echo $member_row['lastname']; ?></p>

                 </div>
                       
                <div class="alert alert-info"><h3><strong>รวมราคา : </strong> <?php echo $cart_row['total']; ?> บาท </h3></div>
                         
                </div><!--Print Receipt -->        
                   </div> <!-- modal-body -->              

<div class="modal-footer">
          <button class="btn btn-info" name="checkout" type="submit"><i class="glyphicon glyphicon-check"></i> Checkout</button>
          <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
</div>
                                        
</form> <!-- Form Check out -->


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