<html>
<head>
    <title><?php echo $title; ?></title>
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

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/CustomCss/reg.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/CustomCss/admin.css">
    <!-- END -->

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

<!--- Dash board end-->
<div class="container box" style="width: 85%;margin-left: 10px;float: left;">
    <h3 align="center"><?php echo $title; ?></h3><br />
    <div class="table-responsive">
        <div class="mybtn">
            <a href="#" class="mylink" style="text-decoration: none" data-toggle="modal" data-target="#userModal">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Add Students
            </a>
        </div>
        <br>
        <div style="overflow-x:auto;">
        <table id="user_data" class="table">
            <thead>
            <tr>
                <th>Image</th>
                <th>User Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Password</th>
                <th>Email</th>
                <th width="8%">Address</th>
                <th width="4%">Gender</th>
                <th>Phone</th>
                <th width="8%">Edit</th>
                <th width="8%">Delete</th>
            </tr>
            </thead>
        </table>
        </div>
    </div>
</div>
</body>
</html>
<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Student</h4>
                </div>
                <div class="modal-body">
                   <div class="row">
                       <div class="col-md-6">
                        <label for="username">User Name</label>
                        <input type="text" name="username" id="username" class="form-control">
                       </div>
                       <div class="col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control">
                       </div>
                   </div>
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="password">Confirm Password</label>
                            <input type="password" name="password2" id="password" class="form-control">
                        </div>
                    </div>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" />
                    <br />
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" style="height: 120px;"/>
                    <br />
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
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                    </div>

                    <label>Select User Image</label>
                    <input type="file" name="user_image" id="user_image" />
					<br>
                    <span id="user_uploaded_image"></span>.
					<br>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="submit" name="action" id="action" class="btn btn-success"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
	$(document).ready(function(){
		$('#add_button').click(function(){
			$('#user_form')[0].reset();
			$('.modal-title').text("Add User");
			$('#action').val("Add");
			$('#user_uploaded_image').html('');
		})
		var dataTable = $('#user_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"<?php echo base_url() . 'Stuadmin_controller/fetch_user'; ?>",
				type:"POST"
			},
			"columnDefs":[
				{
					"orderable":false,
				},
			],
		});
		$(document).on('submit', '#user_form', function(event){
            event.preventDefault();
            var firstName = $('#first_name').val();
            var lastName = $('#last_name').val();
            var extension = $('#user_image').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert("Invalid Image File");
                $('#user_image').val('');
                return false;
            }
            if(firstName != '' && lastName != '')
            {
                $.ajax({
                    url:"<?php echo base_url() . 'Stuadmin_controller/user_action'?>",
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        alert(data);
                        $('#user_form')[0].reset();
                        $('#userModal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
            }
            else
            {
                alert("Bother Fields are Required");
            }
        });
        $(document).on('click','.update',function () {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url(); ?>Stuadmin_controller/fetch_single_user",
                method: "POST",
                data: {user_id: user_id},
                dataType: "json",
                success: function (data) {
                    $('#userModal').modal('show');
                    $('#username').val(data.username);
                    $('#first_name').val(data.first_name);
                    $('#last_name').val(data.last_name);
                    $('#password').val(data.password);
                    $('#email').val(data.email);
                    $('#address').val(data.address);
                    $('#gender').val(data.gender);
                    $('#phone').val(data.phone);

                    $('.modal-title').text("Update Student Details");
                    $('#user_id').val(user_id);
                    $('#user_uploaded_image').html(data.user_image);
					$('#action').val("Edit");
				}
            })
        });
		$(document).on('click', '.delete', function(){
			var user_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
					url:"<?php echo base_url(); ?>Stuadmin_controller/delete_single_user",
					method:"POST",
					data:{user_id:user_id},
					success:function(data)
					{
						alert(data);
						dataTable.ajax.reload();
					}
				});
			}
			else
			{
				return false;
			}
		});
	});
</script>
