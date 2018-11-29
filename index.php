
<!DOCTYPE html>
<html>
<head>
	<title>:: Home ::</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<?php include('header.php'); ?>
	
	<script type="text/javascript" src="js/datepicker.js"></script>
	<link href="css/datepicker.css" rel="stylesheet" type="text/css" />


<script type="text/javascript">
		//<![CDATA[
		/*
				A "Reservation Date" example using two datePickers
				--------------------------------------------------

				* Functionality

				1. When the page loads:
						- We clear the value of the two inputs (to clear any values cached by the browser)
						- We set an "onchange" event handler on the startDate input to call the setReservationDates function
				2. When a start date is selected
						- We set the low range of the endDate datePicker to be the start date the user has just selected
						- If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

				* Caveats (aren't there always)

				- This demo has been written for dates that have NOT been split across three inputs

		*/

		function makeTwoChars(inp) {
				return String(inp).length < 2 ? "0" + inp : inp;
		}

		function initialiseInputs() {
				// Clear any old values from the inputs (that might be cached by the browser after a page reload)
				document.getElementById("sd").value = "";
				document.getElementById("ed").value = "";

				// Add the onchange event handler to the start date input
				datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		var initAttempts = 0;

		function setReservationDates(e) {
				// Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
				// until they become available (a maximum of ten times in case something has gone horribly wrong)

				try {
						var sd = datePickerController.getDatePicker("sd");
						var ed = datePickerController.getDatePicker("ed");
				} catch (err) {
						if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
						return;
				}

				// Check the value of the input is a date of the correct format
				var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

				// If the input's value cannot be parsed as a valid date then return
				if(dt == 0) return;

				// At this stage we have a valid YYYYMMDD date

				// Grab the value set within the endDate input and parse it using the dateFormat method
				// N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
				var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

				// Set the low range of the second datePicker to be the date parsed from the first
				ed.setRangeLow( dt );
				
				// If theres a value already present within the end date input and it's smaller than the start date
				// then clear the end date value
				if(edv < dt) {
						document.getElementById("ed").value = "";
				}
		}

		function removeInputEvents() {
				// Remove the onchange event handler set within the function initialiseInputs
				datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		datePickerController.addEvent(window, 'load', initialiseInputs);
		datePickerController.addEvent(window, 'unload', removeInputEvents);

		//]]>
</script>

<!--sa error trapping-->
<script type="text/javascript">
		function validateForm()
		{
		var x=document.forms["index"]["start"].value;
		if (x==null || x=="")
		  {
		  alert("You must enter your check in Date(click the calendar icon)");
		  return false;
		  }
		var y=document.forms["index"]["end"].value;
		if (y==null || y=="")
		  {
		  alert("You must enter your check out Date(click the calendar icon)");
		  return false;
		  }
		}
		</script>
		<!--sa minus date-->
		<script type="text/javascript">
			// Error checking kept to a minimum for brevity
		 
			function setDifference(frm) {
			var dtElem1 = frm.elements['start'];
			var dtElem2 = frm.elements['end'];
			var resultElem = frm.elements['result'];
			 
		// Return if no such element exists
			if(!dtElem1 || !dtElem2 || !resultElem) {
		return;
			}
			 
			//assuming that the delimiter for dt time picker is a '/'.
			var x = dtElem1.value;
			var y = dtElem2.value;
			var arr1 = x.split('/');
			var arr2 = y.split('/');
			 
		// If any problem with input exists, return with an error msg
		if(!arr1 || !arr2 || arr1.length != 3 || arr2.length != 3) {
		resultElem.value = "Invalid Input";
		return;
			}
			 
		var dt1 = new Date();
		dt1.setFullYear(arr1[2], arr1[1], arr1[0]);
		var dt2 = new Date();
		dt2.setFullYear(arr2[2], arr2[1], arr2[0]);

		resultElem.value = (dt2.getTime() - dt1.getTime()) / (60 * 60 * 24 * 1000);
		}
</script>

        <script>
		function goBack()
 		 {
 		 window.history.back()
  			}
  
		</script>

<!-- -->
<script type="text/javascript">
function validateForms()
{

var a=document.forms["cancelpage"]["confirmation"].value;
if ((a==null || a==""))
  {
  alert("Enter your confirmation code to cancel you reservation!!!");
  return false;
  }
 
if (document.cancelpage.cancelpolicy.checked == false)
{
alert ('Please agree the cancelation policy of this hotel!');
return false;
}
else
{
return true;
}
}
</script>


</head>
<body id="top">
<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="index.php">Kangamphur place</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">หน้าแรก</a></li>
						<li><a href="room.php">ค้นหาห้อง</a></li>
						<li><a href="about.php">เกี่ยวกับ</a></li>
						<li><a href="contact.php">ติดต่อเรา</a></li>
						<li><a href="step.php">วิธีการจองห้องพัก</a></li>
						<li><a href="confiram.php" class="button special">ยืนยันการชำระเงิน</a></li>
					</ul>
				</nav>
			</header>

<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>Kangamphur place</h2>
					<p>ห้องเช่าราคาถูก <a href="index.php">" ข้างอำเภอเพลส "</a></p>
                    <form method="post" action="selectrooms.php"  name="index"  onSubmit="return validateForm()">
					<ul class="actions">
						<li>วันที่เข้าพัก<input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" placeholder="คลิกที่ไอคอน" name="start" id="sd" value="" maxlength="10" readonly style="border: 1px double #CCCCCC;"/></li>

						<li>วันที่เลิกพัก<input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" placeholder="คลิกที่ไอคอน" name="end" id="ed" value="" maxlength="10" readonly style="border: 1px double #CCCCCC;"/></li>
                       	<input type="hidden" name="result" id="result" />
                        <li> <button type="submit" onClick="setDifference(this.form);" class="button big special">ยืนยันการจอง</button></li>
					</ul>
                    </form>
				</div>
			</section>

         	<div class="container">
         	<div class="row">
			<section>

			</section>
			</div>
			</div>


         	<div class="container">
         	<div class="row">
			<section><br>
					<h2>แกลลอรี่</h3>
					<div class="box alt">
						<div class="row 50% uniform">
							<div class="4u"><span class="image fit"><img src="images/room1.jpg" alt="" /></span></div>
							<div class="4u"><span class="image fit"><img src="images/room2.jpg" alt="" /></span></div>
							<div class="4u"><span class="image fit"><img src="images/room3.jpg" alt="" /><br></span></div>
							<div class="4u"><span class="image fit"><img src="images/room4.jpg" alt="" /></span></div>
							<div class="4u"><span class="image fit"><img src="images/room5.jpg" alt="" /></span></div>
							<div class="4u"><span class="image fit"><img src="images/room6.jpg" alt="" /><br></span></div>
							<div class="4u"><span class="image fit"><img src="images/room7.jpg" alt="" /></span></div>
						</div>
					</div>
			</section>

					</div>
				</div>
	



<?php include('footer.php'); ?>
</body>

</html>
