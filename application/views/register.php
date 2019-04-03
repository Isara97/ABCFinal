<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register Page</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/CustomCss/reg.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/CustomCss/admin.css">
    <!-- END -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                    <li><a href="#"><span class="fa fa-plus"></span> Add</a></li>
                    <li><a href="#"><span class="fa fa-edit"></span> Edit</a></li>
                    <li><a href="#"><span class="fa fa-remove"></span> Delete</a></li>
                </ul>
            </li>
            <li><a href="#"><span class="fa fa-user-secret"></span> Lecturers</a>
                <ul>
                    <li><a href="#"><span class="fa fa-plus"></span> Add</a></li>
                    <li><a href="#"><span class="fa fa-edit"></span> Edit</a></li>
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




<div class="col-lg-5 col-lg-offset-2">
    <h1>Register</h1>
    <p>Fill in the details to register New Students to ABC Institute</p>
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success"> <?php echo $_SESSION['success']; ?> </div>
    <?php
    } ?>
    <?php
        echo validation_errors('<div class="alert alert-danger">','</div>');
    ?>
    <div class="d-flex justify-content-center">
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" name="username" id="username" type="text">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" name="email" id="email" type="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" name="password" id="password" type="password">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input class="form-control" name="password2" id="password" type="password">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">phone</label>
                <input class="form-control" name="phone" id="phone">
            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="register">Register</button>
            </div>
        </form>
    </div>
</div>






<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</body>
</html>