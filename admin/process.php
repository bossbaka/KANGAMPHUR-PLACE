<?php include('session.php'); ?>
<?php include('../connection/db.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Admin</title>

    <script type='text/javascript' src="js/jquery.js"></script>

    <script type="text/javascript" src="js/bootstrap-progressbar.js"></script>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-progressbar.css">

    <script>
        $(document).ready(function() {

                $('.progress .bar.text-filled-1').progressbar({
                    display_text: 1,
					         refresh_speed: 200,
                   transition_delay: 500,

            });
            
            });
    </script>
    
    <script type="text/javascript">
	$(document).ready(function()
		{
		 var delay = 2000;
		setTimeout(function(){ window.location = 'rooms.php';}, delay);  
    });
	</script>
    

    
</head> 

<body>
			<div style="margin-top:200px;" class="modal">	
            	<div class="modal-body">
                		<h4>Data Processing......</h4>
                		<div id="prog" class="progress progress-info progress-striped">
               <div class="bar text-filled-1" data-amount-part="1337" data-amount-total="9000" data-percentage="100"><?php include('user_name.php'); ?></div>
                </div>
                </div>
           	</div>     
</body>
