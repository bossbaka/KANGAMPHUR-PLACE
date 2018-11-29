<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>

<?php include('../connection/db.php');
//0Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
 ?>


<style type="text/css">
      body {
      	font-family: 'Kanit', sans-serif;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
		margin-top:80px;
      }  
</style>

<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
</head>

<body>

	<form class="form-signin" method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ผู้ดูแลระบบ (Admin) กรุณาเข้าสู่ระบบ</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input name="username" class="form-control" placeholder="ID" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input name="password" class="form-control" placeholder="Password" type="password" value="">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-primary" name="login" type="submit"><i class=" icon-check"></i> Sign in</button>

         <?php
                                if (isset($_POST['login'])) {
                
                      function clean($str) {
                                        $str = @trim($str);
                                        if (get_magic_quotes_gpc()) {
                                            $str = stripslashes($str);
                                        }
                                        return mysql_real_escape_string($str);
                                    }
                                    $username = clean($_POST['username']);
                                    $password = md5($_POST['password']);

                                    $query = mysql_query("select * from tb_admin where username='$username' and password='$password'") or die(mysql_error());
                                    $count = mysql_num_rows($query);
                                    $row = mysql_fetch_array($query);


                                    if ($count > 0) {
                                       session_start();
                                        session_regenerate_id();
                                        $_SESSION['admin_id'] = $row['admin_id'];
                                        header('location:index.php');
                    session_write_close();
                                    } else {
                     session_write_close();
                                        ?>


                                      <br>
                                      <p>&nbsp;</p>
                                            <div class="alert alert-warning"><i class="glyphicon glyphicon-remove-sign"></i>&nbsp;กรุณาตรวจสอบชื่อผู้ใช้และรหัสผ่านของคุณใหม่</div>
                                        <?php
                                    }
                                }
                                ?>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="js/bootstrap.min.js"></script>
</body>
</html>