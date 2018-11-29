<?php include('../connection/db.php');?>
<?php include('Top.php'); ?>

<div id="page-wrapper">
            <div class="container-fluid">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12"> <h1 class="page-header"> Table Rooms <small>ตารางห้องเช่า</small> 
                    <a href="#addroom" class="btn btn-success" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มห้อง</a> </h1> </div>
                </div>

<!-- Modal add rooms -->
<div id="addroom" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Rooms ( เพิ่มห้องเช่า )</h3>
  </div>
  
  <div class="modal-body">

  <form class="form-horizontal" method="post" action="room_save.php" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Informations ( ข้อมูล )</strong></div>
                                <hr>
                                                              
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">หมายเลขห้องที่ (Room No.) :</label>
                                    <div class="controls">
                                        <input required="required" type="text" name="name" id="inputEmail">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">คำอธิบาย (Description) :</label>
                                    <div class="controls">
                                        <input type="text"  name="description" >
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">ราคาห้อง (Price) :</label>
                                    <div class="controls">
                                        <input type="text" name="price">
                                        <input type="hidden" name="status" value="Available" >
                                    </div>
                                </div>
  


  </div>

  <div class="modal-footer">
   <button type="submit" name="roomsave" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Close</button>
  </div>
  
</div>
</div>
</div>

</form>                   
    
<!-- Add room modal end -->

                <div class="row">     
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">หมายเลขห้อง (Room)</div></th>
                        <th><div align="center">คำอธิบาย (Description)</div></th>
                        <th><div align="center">ราคา (Price)</div></th>                    
                        <th><div align="center">สถานะห้อง (Status)</div></th>
                        <th><div align="center">การจัดการ (Actions)</div></th> 
                                    </tr>
                                </thead>
<?php
    $room_table = mysql_query("select  * from tb_rooms order by roomID") or die(mysql_error());
                                    $room_count = mysql_num_rows($room_table);
                                    while ($room_row = mysql_fetch_array($room_table)) {
                                        
                                        $roomID = $room_row['roomID'];
                                       
                                        
                                                                                
?>                  
                                <tbody>
                                    <tr>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $room_row['roomID'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $room_row['name'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $room_row['description'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $room_row['price'];?></div></td>
                                            <td><div style="color:rgba(153,0,0,1);" align="center"><?php echo $room_row['status'];?></div></td>
                                            <td width="380"><div align="center">
                                            <a href="#update<?php echo$roomID;?>" class="btn btn-default" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i> Update</a>
                                            <a href="#edit_room<?php echo $roomID;?>" class="btn btn-default" role="button" data-toggle="modal"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                            <a href="#delete_room<?php echo $roomID;?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                            </div></td>

<div id="update<?php echo $roomID; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
<!-- Modal update room -->
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">ข้างอำเภอเพลส - ปรับปรุงห้อง (Update)</h3>
  </div>
 
  <div class="modal-body">
   <form action="update_room.php<?php echo '?id=' . $roomID; ?>" method="post">
  
  <div align="center">สถานะห้อง : 
  <select class="span2" name="status">
  <option>เลือก</option>
  <option value="Available">Available</option>
  <option value="Reserved">Reserved</option>
  <option value="disabled">disabled</option>
  </select>
  </div>

  </div>
 

  <div class="modal-footer">
    <button type="submit" name="updateroom" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Close</button>
  </div>
  </form>
  
  </div>
  </div>

</div><!--modal end --> 
    

<!-- Modal delete room -->
<div id="delete_room<?php echo $roomID; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">ข้างอำเภอเพลส - ลบห้อง (Delete)</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>คุณแน่ใจหรือว่าต้องการลบ ?  <strong>หมายเลขห้องที่ <?php echo $room_row['name'];?></strong></p></div>
  </div>
  <div class="modal-footer">
    <a class="btn btn-danger" href="delete_room.php<?php echo '?id=' . $roomID; ?>" ><i class="glyphicon glyphicon-check"></i>&nbsp;Yes</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Close</button>
  </div>

</div>
</div>

</div>

<!-- Modal add rooms -->
<div id="edit_room<?php echo $roomID;?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">ข้างอำเภอเพลส - แก้ไขห้อง (Edit)</h3>
  </div>     

  <div class="modal-body"> <!-- Modal-body Start -->
  <form action="edit_room.php<?php echo '?id=' . $roomID; ?>" class="form-horizontal" method="post"  enctype="multipart/form-data">                              
                                
                                <div class="alert alert-info"><strong>ข้อมูล (Informations)</strong></div>
                                <hr>
                                                              
                                <div class="control-group">
                                    <div style="margin-left:104px;" class="controls">
                                        <p>หมายเลขห้อง (Room No.) : <input required type="text" name="name" id="inputEmail" value="<?php echo $room_row['name'];?>"></p>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <div style="margin-left:104px;" class="controls">
                                        <p>คำอธิบาย (Descriptions) : <input type="text"  name="description" value="<?php echo $room_row['description'] ;?>" ></p>
                                    </div>
                                </div>
                                

                                <div class="control-group">
                                    <div style="margin-left:104px;" class="controls">
                                        <p>ราคา (Price) : <input type="text" name="price" value="<?php echo $room_row['price'];?>"></p>
                                          <input type="hidden" name="status" value="Available" >
                                    </div>
                                </div>


</div> <!-- Modal-body End -->

  <div class="modal-footer">
   <button type="submit" name="roomupdate" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Save</button>
   <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Close</button>
  </div>
                          
                                         
 </div>
                        
    </form>                      
                                                     
                                         
                                         
                                         
                                         
                                         
                                            
                                            
                                            
                                            
                                                         
                                        </tr>
               </tbody>
               <?php }?>
        </table>        
      


            </div>  <!-- class row -->
</div> <!-- class wrapper -->  
<!-- /#wrapper -->


</body>
</html>
