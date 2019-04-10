<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin-Services</title>
    <!-- Main Css for Admin -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/CustomCss/admin.css">
    <!-- Booststrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <!-- Booststrap javascripts-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- font awesome cdn-->
    <!-- Charts -->

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

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
                    <li><a href="<?php echo base_url();?>MarksAdmin/index"><span class="fa fa-remove"></span> Delete</a></li>
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

<section style="float: left;margin-top: 20px;margin-left: 40px">
    <div class="container-fluid">
        <h2>Student Services Forums</h2>
    <table class="table table-bordered table-responsive text-center" style="width: 800px;padding:20px 20px 20px 20px;float: left">
        <thead>
        <tr>
            <td>ID</td>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Description</th>
            <th>Submitted at</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($service){
            foreach($service as $services){
                ?>
                <tr>
                    <td><?php echo $services->id; ?></td>
                    <td><?php echo $services->name; ?></td>
                    <td><?php echo $services->phone; ?></td>
                    <td><?php echo $services->email; ?></td>
                    <td><?php echo $services->description; ?></td>
                    <td><?php echo $services->created_at; ?></td>
                    <td>
                        <a href="<?php echo base_url('Services/delete/'.$services->id); ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this record?');">Delete</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
    </div>
</section>



</body>
</html>
