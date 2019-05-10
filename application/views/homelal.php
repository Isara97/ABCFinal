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
<section>
	<div class="header">
		<h1><img src="<?php echo base_url();?>assets/CustomImages/Images/logo.png" class="himage"> ADMIN PANEL </h1>
	</div>
</section>
<section>
	<div class="menu">
		<ul>
			<li><a href="#"><span class="fa fa fa-rocket"></span> Dashboard</a></li>
			<li><a href="#"><span class="fa fa-home"></span> Courses</a>
				<ul>
					<li><a href="#"><span class="fa fa-plus"></span> Add</a></li>
					<li><a href="#"><span class="fa fa-edit"></span> Edit</a></li>
					<li><a href="#"><span class="fa fa-remove"></span> Delete</a></li>
				</ul>
			</li>
			<li><a href="#"><span class="fa fa fa-clone"></span> Pages</a>
				<ul>
					<li><a href="#"><span class="fa fa-plus"></span> Add</a></li>
					<li><a href="#"><span class="fa fa-edit"></span> Edit</a></li>
					<li><a href="#"><span class="fa fa-remove"></span> Delete</a></li>
				</ul>
			</li>
			<li><a href="#"><span class="fa fa fa-database"></span> Databases</a></li>
			<li><a href="#"><span class="fa fa fa-lock"></span> Users</a>
				<ul>
					<li><a href="#"><span class="fa fa-plus"></span> Add</a></li>
					<li><a href="#"><span class="fa fa-edit"></span> Edit</a></li>
					<li><a href="#"><span class="fa fa-remove"></span> Delete</a></li>
				</ul>
			</li>
			<li><a href="#"><span class="fa fa-suitcase"></span> Course Resourses</a>
				<ul>
					<li><a href="#"><span class="fa fa-plus"></span> Add</a></li>
					<li><a href="#"><span class="fa fa-edit"></span> Edit</a></li>
					<li><a href="#"><span class="fa fa-remove"></span> Delete</a></li>
				</ul>
			</li>
			<li><a href="#"><span class="fa fa-tv"></span> Notices</a>
				<ul>
					<li><a href="#"><span class="fa fa-plus"></span> Add</a></li>
					<li><a href="#"><span class="fa fa-edit"></span> Edit</a></li>
					<li><a href="#"><span class="fa fa-remove"></span> Delete</a></li>
				</ul>
			</li>
			<li><a href="#"><span class="fa fa fa-graduation-cap"></span> Students</a>
				<ul>
					<li><a href="<?php echo base_url();?>Stuadmin_controller/index"><span class="fa fa-plus"></span> Add</a></li>
					<li><a href="<?php echo base_url();?>Services/index"><span class="fa fa-edit"></span> Student Services</a></li>
					<li><a href="<?php echo base_url();?>Anew/marksIndex"><span class="fa fa-stream"></span> Student Marks</a></li>
				</ul>
			</li>
			<li><a href="#"><span class="fa fa-user-secret"></span> Lecturers</a>
				<ul>
					<li><a href="<?php echo base_url();?>AddLectures/add"><span class="fa fa-plus"></span> Add Lecturers</a></li>
					<li><a href="<?php echo base_url();?>AddLectures/index"><span class="fa fa-edit"></span> Lecturers Management</a></li>
					<li><a href="#"><span class="fa fa-remove"></span> Delete</a></li>
				</ul>
			</li>
			<li><a href="#"><span class="fa fa-window-maximize"></span> Library Assets</a>
				<ul>
					<li><a href="#"><span class="fa fa-plus"></span> Add</a></li>
					<li><a href="#"><span class="fa fa-edit"></span> Edit</a></li>
					<li><a href="#"><span class="fa fa-remove"></span> Delete</a></li>
				</ul>
			</li>
			<li><a href="#"><span class="fa fa-university"></span> Exams</a>
				<ul>
					<li><a href="#"><span class="fa fa-plus"></span> Add</a></li>
					<li><a href="#"><span class="fa fa-edit"></span> Edit</a></li>
					<li><a href="#"><span class="fa fa-remove"></span> Delete</a></li>
				</ul>
			</li>
			<li><a href="#"><span class="fa fa-envelope-open"></span> Contact Us</a></li>
			<li><p class="dash text-center"> ABC   <i class="fa fa-heart-o"></i>  Admin</p></li>
		</ul>

	</div>
</section>


<h2 style="padding-left: 50%">Add Lecturers</h2>

<?php
    if($this->session->flashdata('success_msg')) {
        ?>
        <div class="alert alert-success" style="width: 50%">
            <?php echo $this->session->flashdata('success_msg'); ?>
        </div>
        <?php
    }
?>

<?php
if($this->session->flashdata('error_msg')) {
    ?>
    <div class="alert alert-success" style="width: 50%">
        <?php echo $this->session->flashdata('error_msg'); ?>
    </div>
    <?php
}
?>

<div class = "container" style="float: left;padding-left: 200px">
    <h3>Lecturer list</h3>
    <a href="<?php echo base_url('index.php/AddLectures/add');?>" class="btn btn-primary">Add New</a>
	<br>
	<br/>
    <table class="table table-bordered table-responsive">
        <thread>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Subjects</th>
                <th>Action</th>
            </tr>
        </thread>
        <tbody>
        <?php
            if($lec) {
                foreach ($lec as $lecs) {

                    ?>
                    <tr>
                        <td><?php echo $lecs->id;?></td>
                        <td><?php echo $lecs->fname;?></td>
                        <td><?php echo $lecs->lname;?></td>
                        <td><?php echo $lecs->email;?></td>
                        <td><?php echo $lecs->ContactNo;?></td>
                        <td><?php echo $lecs->Subjects;?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/AddLectures/edit/' .$lecs->id) ?>"; class="btn btn-info">Edit</a>
                            <a href="<?php echo base_url('index.php/AddLectures/delete/' .$lecs->id) ?>"; class="btn btn-danger" onclick="return confirm('Do you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            }
        ?>
        </tbody>
    </table>
</div>

</body>
<script
        src="http://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>



<?php /*include 'partials/footer.php'*/?>



