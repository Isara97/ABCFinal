<html lang="en">
<head>
    <title>Lecturers</title>
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
    <script src="<?php echo base_url(); ?>assets/js/student.js"></script>

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
            <div class="line-rows"><a id="add_student" onclick="clickFunction(this)">Lecturer Registration</a></div>
            <div class="hiddenDiv" id="div_add_student">
                <form action="lecturerRegister" method="post" onsubmit="return checkLecturer(this)">
                    <p>First Name</p>
                    <input type="text" name="fname" pattern="[A-Za-z]+" placeholder="Enter First Name" required>
                    <p>Last Name</p>
                    <input type="text" name="lname" pattern="[A-Za-z]+" placeholder="Enter Last Name" required>
                    <p>Surname</p>
                    <input type="text" name="sname" pattern="[A-Za-z]+" placeholder="Enter Last Name" required>
                    <p>NIC No</p>
                    <input type="text" name="nic" maxlength="10" pattern="[0-9]{9}[V]" placeholder="Enter NIC No." required>
                    <p>Phone Number</p>
                    <input type="text" name="phone" maxlength="10" placeholder="Enter Phone Number" pattern="[0-9]{9,10}" required>
                    <p>Email</p>
                    <input type="email" name="email" placeholder="Enter Email" required>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="addLecturer">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="course_change" onclick="clickFunction(this)">Edit Lecturer Details</a></div>
            <div class="hiddenDiv" id="div_course_change">
                <form action="lecturerRegister" method="post" onsubmit="return checkStudentEdit(this)">
                    <p>Student Registration Number</p>
                    <select name="regNum" id="stdRegNum" onchange="setStudent()" required>
                        <option value="">Select Registration Number</option>
                        <?php foreach($lecturer as $row){
                            echo '
                            <option value="'.$row->id.'">'.$row->regNum.'</option>
                            ';
                        }?>
                    </select>
                    <br><br>
                    <p>First Name</p>
                    <input type="text" name="fname" id="editF_name" pattern="[A-Za-z]+" placeholder="Enter First Name" required>
                    <p>Last Name</p>
                    <input type="text" name="lname" id="editL_name" pattern="[A-Za-z]+" placeholder="Enter Last Name" required>
                    <p>Surname</p>
                    <input type="text" name="sname" id="editS_name" pattern="[A-Za-z]+" placeholder="Enter Last Name" required>
                    <p>NIC No</p>
                    <input type="text" name="nic" id="editNic" maxlength="10" pattern="[0-9]{9}[V]" placeholder="Enter NIC No." required>
                    <p>Phone Number</p>
                    <input type="text" name="phone" id="editPhone" maxlength="10" placeholder="Enter Phone Number" pattern="[0-9]{9,10}" required>
                    <p>Email</p>
                    <input type="email" name="email" id="editEmail" placeholder="Enter Email" required>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="editLecturer">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="std_delete" onclick="clickFunction(this)">Remove Lecturer</a></div>
            <div class="hiddenDiv" id="div_std_delete">
                <form action="studentRegister" method="post" onsubmit="return checkLecturerDelete(this)">
                    <p>Student Registration Number</p>
                    <select name="regNum" id="deleteRegNum" onchange="setStudentDelete()" required>
                        <option value="">Select Registration Number</option>
                        <?php foreach($student as $row){
                            echo '
                            <option value="'.$row->id.'">'.$row->regNum.'</option>
                            ';
                        }?>
                    </select>
                    <br><br>
                    <p>First Name</p>
                    <input type="text" name="fname" id="deleteF_name" pattern="[A-Za-z]+" placeholder="Enter First Name" readonly>
                    <p>Last Name</p>
                    <input type="text" name="lname" id="deleteL_name" pattern="[A-Za-z]+" placeholder="Enter Last Name" readonly>
                    <p>Surname</p>
                    <input type="text" name="sname" id="deleteS_name" pattern="[A-Za-z]+" placeholder="Enter Last Name" readonly>
                    <p>NIC No</p>
                    <input type="text" name="nic" id="deleteNic" maxlength="10" pattern="[0-9]{9}[V]" placeholder="Enter NIC No." readonly>
                    <p>Phone Number</p>
                    <input type="text" name="phone" id="deletePhone" maxlength="10" placeholder="Enter Phone Number" pattern="[0-9]{9,10}" readonly>
                    <p>Email</p>
                    <input type="email" name="email" id="deleteEmail" placeholder="Enter Email" readonly>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="deleteLecturer">
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
<div class="hiddenDiv">
    <?php foreach($lecturer as $row){
        echo '
            <input type="hidden" value="'.$row->fname.'" id="fname'.$row->id.'" >
            <input type="hidden" value="'.$row->lname.'" id="lname'.$row->id.'" >
            <input type="hidden" value="'.$row->sname.'" id="sname'.$row->id.'" >
            <input type="hidden" value="'.$row->nic.'" id="nic'.$row->id.'" >
            <input type="hidden" value="'.$row->phone.'" id="phone'.$row->id.'" >
            <input type="hidden" value="'.$row->email.'" id="email'.$row->id.'" >
        ';
    }?>
</div>
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
            swal("Registration Successful!", "Registration Number <?php if(isset($_SESSION['reg_No'])){ echo $_SESSION['reg_No'];} ?>", "success");
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
            showErrorMsg("This NIC Number Already Exists !");
            <?php $this->session->set_flashdata("error",null); ?>
        }else if ("2"==y) {
            showErrorMsg("This Email Already Exists !");
            <?php $this->session->set_flashdata("error",null); ?>
        }
    }

</script>
