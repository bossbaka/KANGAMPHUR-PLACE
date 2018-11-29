<?php include('../connection/db.php');?>
<?php include('Top.php'); ?>

<div id="page-wrapper">
            <div class="container-fluid">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12"> <h1 class="page-header"> ข้อมูลการชำระเงิน </h1>  </div>
                </div>
            
               <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                        <th><div align="center">Confirmation Code :</div></th>
                        <th><div align="center">ชื่อ - สกุล :</div></th>
                        <th><div align="center">E-mail</div></th>
                        <th><div align="center">ธนาคารที่โอนผ่าน</div></th>
                        <th><div align="center">จำนวนเงิน</div></th>
                        <th><div align="center">วันที่โอน</div></th>
                        <th><div align="center">การจัดการ</div></th>
                                    </tr>
                                </thead>
<?php
    $confiram_table = mysql_query("select  * from tb_confiram") or die(mysql_error());
                                    $cart_count = mysql_num_rows($confiram_table);
                                    while ($confiram_row = mysql_fetch_array($confiram_table)) {
                                        $ccid = $confiram_row['cid'];
?>

                                <tbody>
                                    <tr>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $confiram_row['confir'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $confiram_row['lfname'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $confiram_row['cemail'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $confiram_row['bank'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $confiram_row['cprice'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $confiram_row['cday'];?></div></td>
                                          
                                            <td width="85"><div align="center"><a href="#delete_confiram<?php echo $ccid; ?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i> Delete</a></div></td>

<!-- Modal delete Customers -->
<div id="delete_confiram<?php echo $ccid; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">ข้างอำเภอเพลส - ลบรายชื่อนี้ (Delete)</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>คุณแน่ใจหรือว่าต้องการลบ ? </p></div>
  </div>
  <div class="modal-footer">
    <a class="btn btn-danger" href="delete_confiram.php<?php echo '?id=' . $ccid; ?>" ><i class="glyphicon glyphicon-check"></i>&nbsp;Yes</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Close</button>
  </div>

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
