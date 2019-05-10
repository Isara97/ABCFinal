<?php /*include 'partials/header.php'*/?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-cale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>blog</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/CustomCss/admin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		.container{
			margin-left: 40px;
		}
		.box
		{
			background-color:#fff;
			border:1px solid #ccc;
			border-radius:5px;
			margin-top:10px;
		}
		.modal-title{
			font-family: "Arial Black";
			text-align: center;
		}
		#user_image{
			background-color: white;
			color: black;
			border: 2px solid #4CAF50; /* Green */
			padding: 10px;
		}
		.mybtn{
			font-family: sans-serif;
			color: #0c002b;
			text-decoration: none;
			margin-bottom: 40px;
		}
		.mylink{
			background: #0c002b;
			position: absolute;
			color: #1670f0;
			padding: 5px 20px;
			font-size: 20px;
			letter-spacing: 2px;
			text-transform: uppercase;
			text-decoration: none;
			box-shadow: 0 20px 50px rgba(0,0,0,.5);
			overflow: hidden;
		}
		.mylink:before{
			content: '';
			position: absolute;
			top: 2px;
			left: 2px;
			width: 50%;
			background: rgba(255,255,255,0.05);
		}
		.mylink span:nth-child(1){
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 2px;
			background: linear-gradient(to right, #0c002b, #1779ff);
			animation: animate1 2s linear infinite;
		}
		@keyframes animate1 {
			0%{
				transform: translate(-100%);
			}
			100%{
				transform: translate(100%);
			}
		}

		.mylink span:nth-child(2){
			position: absolute;
			top: 0;
			right: 0;
			width: 2px;
			height: 100%;
			background: linear-gradient(to bottom, #0c002b, #1779ff);
			animation: animate2 2s linear infinite;
		}
		@keyframes animate2 {
			0%{
				transform: translateY(-100%);
			}
			100%{
				transform: translateY(100%);
			}
		}

		.mylink span:nth-child(3){
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			height: 2px;
			background: linear-gradient(to left, #0c002b, #1779ff);
			animation: animate3 2s linear infinite;
		}

		@keyframes animate3 {
			0%{
				transform: translateX(100%);
			}
			100%{
				transform: translateX(-100%);
			}
		}

		.mylink span:nth-child(4){
			position: absolute;
			top: 0;
			left: 0;
			width: 2px;
			height: 100%;
			background: linear-gradient(to top, #0c002b, #1779ff);
			animation: animate4 2s linear infinite;
		}

		@keyframes animate4 {
			0%{
				transform: translateY(100%);
			}
			100%{
				transform: translateY(-100%);
			}
		}

		table {
			border-collapse: collapse;
			border-spacing: 0;
			width: 100%;
			border: 1px solid #ddd;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}
	</style>
</head>
<body>

<h3>Edit Lecturer</h3>
<a href="<?php echo base_url('index.php/AddLectures'); ?>" class="btn btn-default">Back</a>
<form action="<?php echo base_url('index.php/AddLectures/update') ?>" method="post" class="form-horizontal">
    <input type="hidden" name="txt_hidden" value="<?php echo $lecs->id; ?>">
    <div class="form-group">
        <label for="name" class="col-md-2 text-right">First Name</label>
        <div class="col-md-10">

            <input type="text" value="<?php echo $lecs->fname;?>" name="txt_fname" class="form-control" required>
        </div>
    </div>

    <div class="form-group">
        <label for="age" class="col-md-2 text-right">LastName</label>
        <div class="col-md-10">

            <input type="text" value="<?php echo $lecs->lname;?>" name="txt_lname" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-md-2 text-right">Email</label>
        <div class="col-md-10">

            <input type="email" value="<?php echo $lecs->email;?>" name="email" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="ContactNo" class="col-md-2 text-right">Contact Number</label>
        <div class="col-md-10">

            <input type="number" value="<?php echo $lecs->ContactNo;?>" name="num_con" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="subjects" class="col-md-2 text-right">Subjects</label>
        <div class="col-md-10">

            <input type="text" value="<?php echo $lecs->Subjects;?>" name="txt_subject" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 text-right"></label>
        <div class="col-md-10">

            <input type="submit" name="btnUpdate" class="btn btn-primary" value="Update">
        </div>
    </div>
</form>

</body>
<script
	src="http://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>


<?php /*include 'partials/footer.php'*/?>

