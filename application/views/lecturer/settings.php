<html lang="en">
<head>
    <title>Account Settings</title>
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

</head>
<body style="background-image: url('<?php echo base_url(); ?>siteimage/wall.png');">

<div class="mainDiv">

    <div class="menu-toggle" id="hamburger">
        <i class="fas fa-bars"></i>
    </div>
    <div class="overlay"></div>
    <div class="container">
        <nav>
            <h1 class="brand"><a href="<?php echo base_url('LmsController/home'); ?>">SLI<span>IT</span> LMS</a></h1>
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
            <div class="line-rows"><a href="<?php echo base_url('LmsController/myCourse'); ?>" >My Courses</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/coursework'); ?>" >All Courses</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/ltrAssignment'); ?>" >Assignment</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/lecturerSettings'); ?>" >Account Settings</a></div>
        </div>
        <div class="user-setting">
            <div class="line-rows"><a id="email_change" onclick="clickFunction(this)">Change Email</a></div>
            <div class="hiddenDiv" id="div_email_change">
                <form action="lecturerSettings" method="post" onsubmit="return changeEmail(this);">
                    <p>Current Email</p>
                    <input type="email" id="changeEmail1" placeholder="Enter Email" value="<?php foreach($user as $row){ echo $row->email; } ?>" readonly>
                    <p>New Email</p>
                    <input type="email" name="email" id="changeEmail2" placeholder="Enter New Email" required><br><br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="confirmEmail">
                </form>
            </div>
            <div class="line-rows"><a id="phone_change" onclick="clickFunction(this)">Change Phone Number</a></div>
            <div class="hiddenDiv" id="div_phone_change">
                <form action="lecturerSettings" method="post" onsubmit="return changePhone(this);">
                    <p>Phone Number</p>
                    <input type="tel" name="phone" placeholder="Enter Phone Number" id="editPhone" value="<?php foreach($user as $row){ echo $row->phone; } ?>" pattern="[0-9]{9|10}" required><br><br><br>
                    <input type="hidden" id="currentPhone" value="<?php foreach($user as $row){ echo $row->phone; } ?>">
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="confirmPhone">
                </form>
                <br>
            </div>
            <div class="line-rows"><a id="pass_change" onclick="clickFunction(this)">Change Password</a></div>
            <div class="hiddenDiv" id="div_pass_change">
                <form action="lecturerSettings" method="post" onsubmit="return changePassword(this);">
                    <p>Current Password</p>
                    <input type="password" name="currentPassword" id="confirmPassword3" placeholder="••••••••" required>
                    <p>Password</p>
                    <input type="password" name="password" id="confirmPassword" placeholder="••••••••" required>
                    <p>Confirm Password</p>
                    <input type="password" name="cpassword" id="confirmPassword2" placeholder="••••••••" required><br><br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="confirmPassword">
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
            swal("Success!", "Your Change Successful!", "success");
            <?php $this->session->set_flashdata("success",null); ?>
        }

        var y="<?php if(isset($_SESSION['error'])){ echo $_SESSION['error'];}?>";

        if("1"==y){
            showErrorMsg("This Email Already Used !");
            <?php $this->session->set_flashdata("error",null); ?>
        }else if("2"==y){
            showErrorMsg("Your Current Password Is Wrong !");
            <?php $this->session->set_flashdata("error",null); ?>
        }
    }

</script>