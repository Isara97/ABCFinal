<html lang="en">
<head>
    <title>Home</title>
    <link rel="icon" href="<?php echo base_url(); ?>siteimage/site.jpg" type="image/ico">

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/menu_toggle.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/croppie.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/croppie.css" />

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stylesheet.css">
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/profile.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/course.js"></script>

</head>
<body style="background-image: url('<?php echo base_url(); ?>siteimage/wall.jpg');">

<div class="mainDiv">

    <div class="menu-toggle" id="hamburger">
        <i class="fas fa-bars"></i>
    </div>
    <div class="overlay"></div>
    <div class="container">
        <nav>
			<h1 class="brand"><a href="<?php echo base_url('LmsController/home'); ?>">A<span>BC</span> Institute </a><span> Admin Panel</span></h1>
            <ul>
                <li><a href="<?php echo base_url('LmsController/home'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('LmsController/profile'); ?>">Profile</a></li>
                <li><a href="<?php echo base_url('LmsController/logout'); ?>">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="profileLine"></div>
    <div class="profileBox">
        <img src="<?php if(!isset($_SESSION['imagePath'])||$_SESSION['imagePath']==null){echo base_url().'siteimage/user.png';}else{ echo base_url().base64_decode($_SESSION['imagePath']);} ?>" class="userImage">
        <img src="<?php echo base_url(); ?>siteimage/update.png" class="updateImage" onclick="uploadImage()">
        <div class="hiddenfile">
            <input type="file" id="upload_image" name="upload_image" accept="image/*" >
        </div>
        <div class="profile-links">
            <div class="line-rows"><a href="<?php echo base_url('LmsController/coursework'); ?>" >All Courses</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/course'); ?>" >Courses Details</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/lecturerRegister'); ?>" >Lecturers</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/studentRegister'); ?>" >Students</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/ltrAssignment'); ?>" >Assignment</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/adminSettings'); ?>" >Account Settings</a></div>
        </div>
        <div class="user-setting">
            <div class="line-rows"><a id="add_course" onclick="clickFunction(this)">Add New Course</a></div>
            <div class="hiddenDiv" id="div_add_course">
                <form action="course" method="post" onsubmit="return newCourse(this)">
                    <p>Course ID</p>
                    <input type="text" name="id" placeholder="Enter Course ID" required>
                    <p>Course Name</p>
                    <input type="text" name="name" id="new_course" placeholder="Enter Course Name" required>
                    <p>Course Enrollment Key</p>
                    <input type="text" name="enrollment" placeholder="Enter Course Enrollment Key" required>
                    <p>Year</p>
                    <select name="year" required>
                        <option value="">Select Year</option>
                        <option value="1">1'ˢᵗ Year</option>
                        <option value="2">2'ⁿᵈ Year</option>
                        <option value="3">3'ʳᵈ Year</option>
                        <option value="4">4'ᵗʰ Year</option>
                    </select>
                    <p>Semester</p>
                    <select name="semester" required>
                        <option value="">Select Semester</option>
                        <option value="1">1'ˢᵗ Semester</option>
                        <option value="2">2'ⁿᵈ Semester</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="addCourse">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="course_change" onclick="clickFunction(this)">Edit Course</a></div>
            <div class="hiddenDiv" id="div_course_change">
                <form action="course" method="post" onsubmit="return edit_Course(this)">
                    <p>Course ID</p>
                    <select name="old_id" id="old_id" onchange="setCourse()" required>
                        <option value="">Select Course ID</option>
                        <?php foreach($course as $row){
                            echo '
                            <option value="'.$row->id.'">'.$row->course_id.'</option>
                            ';
                        }?>
                    </select>
                    <br><br>
                    <p>Course ID</p>
                    <input type="text" name="id" id="edit_id" placeholder="Enter Course ID" required>
                    <p>Course Name</p>
                    <input type="text" name="name" id="edit_course" placeholder="Enter Course Name" required>
                    <p>Course Enrollment Key</p>
                    <input type="text" name="enrollment" id="edit_enrollment" placeholder="Enter Course Enrollment Key" required>
                    <p>Year</p>
                    <select name="year" id="edit_year" required>
                        <option value="">Select Year</option>
                        <option value="1">1'ˢᵗ Year</option>
                        <option value="2">2'ⁿᵈ Year</option>
                        <option value="3">3'ʳᵈ Year</option>
                        <option value="4">4'ᵗʰ Year</option>
                    </select>
                    <p>Semester</p>
                    <select name="semester" id="edit_semester" required>
                        <option value="">Select Semester</option>
                        <option value="1">1'ˢᵗ Semester</option>
                        <option value="2">2'ⁿᵈ Semester</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="editCourse" id="old_course">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="course_delete" onclick="clickFunction(this)">Delete Course</a></div>
            <div class="hiddenDiv" id="div_course_delete">
                <form action="course" method="post" onsubmit="return delete_Course(this)">
                    <p>Course ID</p>
                    <select name="deleteId" id="deleteId" onchange="setDeleteCourse()" required>
                        <option value="">Select Course ID</option>
                        <?php foreach($course as $row){
                            echo '
                            <option value="'.$row->id.'">'.$row->course_id.'</option>
                            ';
                        }?>
                    </select>
                    <br><br>
                    <p>Course ID</p>
                    <input type="text" name="id" id="delete_id" placeholder="Enter Course ID" readonly>
                    <p>Course Name</p>
                    <input type="text" name="name" id="delete_course" placeholder="Enter Course Name" readonly>
                    <p>Course Enrollment Key</p>
                    <input type="text" name="enrollment" id="delete_enrollment" placeholder="Enter Course Enrollment Key" readonly>
                    <p>Year</p>
                    <select name="year" id="delete_year" disabled>
                        <option value="">Select Year</option>
                        <option value="1">1'ˢᵗ Year</option>
                        <option value="2">2'ⁿᵈ Year</option>
                        <option value="3">3'ʳᵈ Year</option>
                        <option value="4">4'ᵗʰ Year</option>
                    </select>
                    <p>Semester</p>
                    <select name="semester" id="delete_semester" disabled>
                        <option value="">Select Semester</option>
                        <option value="1">1'ˢᵗ Semester</option>
                        <option value="2">2'ⁿᵈ Semester</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Delete Course">
                    <input type="hidden" name="deleteCourse">
                    <br><br>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="headDiv">
</div>
</body>
</html>
<div id="uploadimageModal" class="modal" role="dialog" style="margin-top: 5%">
    <div class="modal-dialog" style="width: 535px;height: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload & Crop Image</h4>
            </div>
            <div class="modal-body" >
                <div class="row" >
                    <div class="col-md-12 text-center" >
                        <div id="image_demo" style="width:150px;"></div>
                    </div>
                    <div class="col-md-12" style="padding-top:30px;margin-top: -4%;margin-left: 63.5%">
                        <button class="btn btn-primary crop_image">Crop & Upload Image</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>
<div class="hiddenDiv">
    <?php foreach($course as $row){
        echo '
            <input type="hidden" value="'.$row->course_id.'" id="courseId'.$row->id.'" >
            <input type="hidden" value="'.$row->name.'" id="name'.$row->id.'" >
            <input type="hidden" value="'.$row->enrollment.'" id="enrollment'.$row->id.'" >
            <input type="hidden" value="'.$row->year.'" id="year'.$row->id.'" >
            <input type="hidden" value="'.$row->semester.'" id="semester'.$row->id.'" >
        ';
    }?>
</div>
<script>

    $(document).ready(function(){

        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:400,
                height:400,
                type:'square' //circle
            },
            crop_size: {
                width:600,
                height:600,
                type:'square' //circle
            },
            boundary:{
                width:500,
                height:500
            }
        });

        $('#upload_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'crop_size'
            }).then(function(response){
                $.ajax({
                    url:'<?php echo site_url('UserController/image'); ?>',
                    type: "POST",
                    data:{"image": response},
                    success:function(data)
                    {
                        $('#uploadimageModal').modal('hide');
                        location.reload();
                    }
                });
            })
        });

    });

    function uploadImage() {
        $('#upload_image').trigger('click');
    }

</script>
<script>

    window.onload = function(e){
        var x="<?php if(isset($_SESSION['success'])){ echo $_SESSION['success'];}?>";
        if("1"==x){
            swal("Success!", "Recorded Successful!", "success");
            <?php $this->session->set_flashdata("success",null); ?>
        }else if("2"==x){
            swal("Success!", "Edit Successful!", "success");
            <?php $this->session->set_flashdata("success",null); ?>
        }else if("3"==x){
            swal("Success!", "Delete Successful!", "success");
            <?php $this->session->set_flashdata("success",null); ?>
        }

        var y="<?php if(isset($_SESSION['error'])){ echo $_SESSION['error'];}?>";

        if("1"==y){
            showErrorMsg("This Course ID Already Exists !");
            <?php $this->session->set_flashdata("error",null); ?>
        }
    }

</script>
