<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			background-color: #85929E;
		}

		/* Style the header */
		.header {
			background-color: #f1f1f1;
			padding: 20px;
			text-align: center;
		}

		/* Style the top navigation bar */
		.topnav {
			overflow: hidden;
			background-color: #0c002b;
		}

		/* Style the topnav links */
		.topnav a {
			float: left;
			display: block;
			padding: 1px 1px;
		}


		/* Create three unequal columns that floats next to each other */
		.column {
			float: left;
		}

		/* Left and right column */
		.column.side {
			width: 20%;
		}

		/* Middle column */
		.column.middle {
			width: 60%;
		}

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 600px) {
			.column.side, .column.middle {
				width: 100%;
			}
		}

		/* my tab */

		/* Style the tab */
		/* Style the tab */
		.tab {
			float: left;
			background-color: #007bff;
			width: 100%;
			height: 800px;
		}

		/* Style the buttons inside the tab */
		.tab button {
			display: block;
			background-color: inherit;
			color: white;
			padding: 44px 10px 50px 40px;
			width: 100%;
			border: none;
			outline: none;
			text-align: left;
			cursor: pointer;
			transition: 0.3s;
			font-size: 17px;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
			background-color: #FFC300;
		}

		/* Create an active/current "tab button" class */
		.tab button.active {
			background-color: #007bff;
		}

		/* Style the tab content */
		.tabcontent {
			float: left;
			padding-top: 30px;
			width: 100%;
			height: 400px;
		}
		/* profile pic */
		.propic{
			width: 50px;
			height: 50px;
			float: left;
			padding-left: 20px;
			padding-top: 10px;
		}

		.procontent{
			width: 100%;
			height: 315px;
			margin-top: 15%;
			margin-left: 0;
			padding-top: 8%;
			padding-left: 30%;
			padding-bottom: 40%;
			background-color: #212F3C;
			color: whitesmoke;
		}
	</style>
</head>
<body>

<div class="header">
	<h1 style="color: #9A7D0A">Student Profile</h1>

</div>

<div class="topnav">
	<span><p></p></span>
</div>

<div class="row" style="margin: 40px 40px 40px 40px;background-color: whitesmoke">
	<div class="column side">
		<div class="vertical-menu">
				<div class="tab">
					<button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen"><i class="fa fa-info-circle"></i> Profile Details</button>
					<button class="tablinks" onclick="openCity(event, 'Paris')"><i class="fas fa-stream"></i> Student Marks & GPA</button>
					<button class="tablinks" onclick="openCity(event, 'Tokyo')"><i class="fas fa-user-cog"></i> profile Settings</button>
				</div>
		</div>
	</div>

	<div class="column middle">
		<div id="London" class="tabcontent">
			<h2 style="padding-left: 20px;color: #888888">Profile Details</h2>
			<div class="propic">
				<img src="<?php echo base_url()?>upload<?php echo $_SESSION['image']?>" style="width: 160px;height: 160px">

			</div>
			<h3 style="float: right;text-align: center;padding-right: 120px;text-transform: uppercase;font-family: 'Times New Roman';font-size: 30px"> <span><?php echo $_SESSION['first_name'];  ?></span><span> <?php echo $_SESSION['last_name'];  ?></span> </h3>
			<div class="procontent">
				<div class="row">
					<span style="font-size: 20px;text-transform: capitalize"><b>Name : </b><?php echo $_SESSION['first_name'];  ?></span><span style="font-size: 20px;text-transform: capitalize"> <?php echo $_SESSION['last_name'];  ?></span>
				</div><br>
				<div class="row">
					<span style="font-size: 20px"><b>Email : </b><?php echo $_SESSION['email'];  ?></span>
				</div><br>
				<div class="row">
					<span style="font-size: 20px;text-transform: capitalize"><b>Address : </b><?php echo $_SESSION['address'];  ?></span>
				</div><br>
				<div class="row">
					<span style="font-size: 20px;text-transform: capitalize"><b>Gender : </b><?php echo $_SESSION['gender'];  ?></span>
				</div><br>
				<div class="row">
					<span style="font-size: 20px;text-transform: capitalize"><b>Phone : </b><?php echo $_SESSION['phone'];  ?></span>
				</div><br>
				<div class="clear"></div>
			</div>
		</div>

		<div id="Paris" class="tabcontent" style="padding-left: 20px">
			<h2>Student Marks & Gpa</h2>

			<div class="form-group">
				<div class="input-group">
						<input type="hidden" name="search_text" id="search_text" class="form-control" value="<?php echo $_SESSION['username'];  ?>" /><br /><br />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<script>
			$(document).ready(function(){
				//load_data();

				function load_data(query)
				{
					$.ajax({
						url:"<?php echo base_url(); ?>Anew/fetch",
						method:"POST",
						data:{query:query},
						success:function(data){
							$('#result').html(data);
						}
					})
				}

				$('#search_text').val(function(){
					var search = $(this).val();
					if(search != '')
					{
						load_data(search);
					}
					else
					{
						load_data();
					}
				});
			});
		</script>

		<div id="Tokyo" class="tabcontent">
			<h3 style="padding-left: 40px;font-family: sans-serif;color: #888888">Edit your profile</h3>
			<form method="post" id="user_form" style="padding: 40px 40px 40px 40px;">
				<div class="row">
					<div class="col-md-6">
						<label for="username">User Name</label>
						<input type="text" name="username" id="username" class="form-control" value="<?php echo $_SESSION['email']?>">
					</div>
					<div class="col-md-6">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $_SESSION['first_name']?>">
					</div>
				</div>

				<label for="last_name">Last Name</label>
				<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $_SESSION['last_name']?>">
				<br/>

				<div class="row">
					<div class="col-md-6">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" value="<?php echo $_SESSION['password']?>">
					</div>

					<div class="col-md-6">
						<label for="password">Confirm Password</label>
						<input type="password" name="password2" id="password" class="form-control" value="<?php echo $_SESSION['password']?>">
					</div>
				</div>

				<label for="email">Email</label>
				<input type="text" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']?>"/>
				<br/>

				<label for="address">Address</label>
				<input type="text" name="address" id="address" class="form-control" style="height: 120px;" value="<?php echo $_SESSION['address']?>"/>
				<br/>

				<div class="row">
					<div class="col-md-6">
						<label for="gender">Gender</label>
						<select class="form-control" id="gender" name="gender">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="phone">Phone</label>
						<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $_SESSION['phone']?>">
						<label>Select User Image</label>
						<input type="file" name="user_image" id="user_image" />
						<span id="user_uploaded_image" ><img src="<?php echo base_url()?>upload<?php echo $_SESSION['image']?>" style="width: 80px;height: 80px"></span>
						<input type="hidden" name="user_id" id="user_id">
					</div>
				</div>
				<input type="submit" name="action" id="action" class="btn" value="Add" style="padding: 15px 15px 15px 15px;background-color: #239B56;color: whitesmoke"/>
			</form>
		</div>
	</div>

	<div class="column side">

	</div>

</div>
<script>
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>
<script>

</script>
</body>
</html>
