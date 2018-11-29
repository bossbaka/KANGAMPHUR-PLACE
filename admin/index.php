<?php include('../connection/db.php');?>
<?php include('Top.php'); ?>

<div id="page-wrapper">
            <div class="container-fluid">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12"> <h1 class="page-header"> List of Customers <small>รายชื่อลูกค้า</small> </h1> </div>
                </div>
                <div class="row">     
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">ชื่อ</div></th>
                        <th><div align="center">นามสกุล</div></th>
                        <th><div align="center">E-mail</div></th>
                        <th><div align="center">เบอร์ติดต่อ</div></th>

                        <th><div align="center">ที่อยู่</div></th>
                        <th><div align="center">การจัดการ</div></th>
                            </tr>
                            </thead>

<?php
    $member_table = mysql_query("select  * from tb_member") or die(mysql_error());
                                    $cart_count = mysql_num_rows($member_table);
                                    while ($member_row = mysql_fetch_array($member_table)) {
                                        $mmid = $member_row['memberID'];
?>
                                        
                  
                            <tbody>
                            <tr>
                                            
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $member_row['memberID'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $member_row['lastname'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $member_row['email'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $member_row['contact_number'];?></div></td>

                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $member_row['address'];?></div></td>
                                            <td width="85"><div align="center"><a href="#delete_customer<?php echo $mmid; ?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i> Delete</a></div></td>

<!-- Modal delete Customers -->
<div id="delete_customer<?php echo $mmid; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">ข้างอำเภอเพลส - ลบรายชื่อนี้ (Delete)</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>คุณแน่ใจหรือว่าต้องการลบ ? <strong><?php echo $member_row['firstname']." ".$member_row['lastname'];?></strong></p></div>
  </div>
  <div class="modal-footer">
    <a class="btn btn-danger" href="delete_customer.php<?php echo '?id=' . $mmid; ?>" ><i class="glyphicon glyphicon-check"></i>&nbsp;Yes</a>
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