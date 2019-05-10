<?php /*include 'includes/header.php';

    if ($this->session->flashdata('welcome')){

        echo "<h3>".$this->session->flashdata('welcome')."</h3>";

    }
*/?><!--

--><?php
/*if (! ($this->session->userdata('loggedin'))){
	redirect('Home/Login');
}
*/?>

	<!doctype html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, user-scalable=no, initial-cale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>blog</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

			</ul>

			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('fname')." " . $this->session->userdata('lname'); ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url('index.php/Login/LogoutUser'); ?>">Logout</a></li>
						<li><a href="<?php echo base_url('index.php/Admin/profile'); ?>">Profile</a></li>

					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>



</body>
	<script
		src="http://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>


<?php /*include 'includes/footer.php'; */?>
