<?php include('session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>หน้าสำหรับ Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                            
               <div class="navbar-brand" >Kangamphur place</div>
            </div>
            <!-- Top Menu Items -->
 		<ul class="nav navbar-right top-nav">
        	<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin</a></li>
          <li class="dropdown"><a class="btn" href="#logout" data-toggle="modal"><i class="icon-off"></i> Log-out</a> </li>
         </ul>
           <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			 <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">				
                <li><a href="#"><?php include('user_name.php');?></a></li>		
				        <li><a href="index.php">รายชื่อลูกค้า (Customers)</a></li>
                <li><a href="confiram.php">ข้อมูลการชำระเงิน</a></li>
                <li><a href="list.php">รอดำเนินการ (Pending)</a></li>
                <li><a href="checkin.php">เข้าจอง (Check-In)</a></li>
                <li><a href="checkout.php">ออกจอง (Check-Out)</a></li> 
                <li><a href="print.php"><i class="glyphicon glyphicon-print"></i> รายงาน (Reports)</a></li>          
                <li><a href="rooms.php">ห้องเช่า (Rooms)</a></li>
				</ul>
				</div>
            <!-- /.navbar-collapse -->
</nav>

<!--Modal Log-out --> 
<div id="logout" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
  </div>
  <div class="modal-body">
  <div class="alert alert-info">คุณแน่ใจหรือว่าต้องการ <strong>Logout</strong> ?</div>
  </div>
  <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
      <a href="logout.php" class="btn btn-info"><i class="icon-off"></i> Logout</a>
  </div>
</div> 
</div>
</div>            



