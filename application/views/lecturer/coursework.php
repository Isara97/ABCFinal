<html lang="en">
<head>
    <title>All Courses</title>
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
            <div class="line-rows"><a href="<?php echo base_url('LmsController/coursework'); ?>" >All Courses</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/course'); ?>" >Courses Details</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/lecturerRegister'); ?>" >Lecturers</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/studentRegister'); ?>" >Students</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/ltrAssignment'); ?>" >Assignment</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/adminSettings'); ?>" >Account Settings</a></div>
        </div>
        <div class="user-setting">
            <div class="line-rows"><a id="1stYear" onclick="clickFunction(this)">1'ˢᵗ Year Coursers</a></div>
            <div class="hiddenDiv" id="div_1stYear">
                <div class="line-rows"><a id="1stYear1Sem" onclick="clickFunction(this)">1'ˢᵗ Semester</a></div>
                <div class="hiddenDiv" id="div_1stYear1Sem">
                    <?php foreach($course as $row){
                        if ($row->year==1&&$row->semester==1){
                            echo '
                            <div class="line-rows"><a onclick="courseworkClick(this);" style="font-size: 15px;font-weight: normal" id="'.$row->id.'">'.$row->name.' - '.$row->course_id.'</a></div>
                            ';
                        }
                    }?>
                </div>
                <div class="line-rows"><a id="1stYear2Sem" onclick="clickFunction(this)">2'ⁿᵈ Semester</a></div>
                <div class="hiddenDiv" id="div_1stYear2Sem">
                    <?php foreach($course as $row){
                        if ($row->year==1&&$row->semester==2){
                            echo '
                            <div class="line-rows"><a onclick="courseworkClick(this);" style="font-size: 15px;font-weight: normal" id="'.$row->id.'">'.$row->name.' - '.$row->course_id.'</a></div>
                            ';
                        }
                    }?>
                </div>
            </div>
            <br>
            <div class="line-rows"><a id="2ndYear" onclick="clickFunction(this)">2'ⁿᵈ Year Coursers</a></div>
            <div class="hiddenDiv" id="div_2ndYear">
                <div class="line-rows"><a id="2ndYear1Sem" onclick="clickFunction(this)">1'ˢᵗ Semester</a></div>
                <div class="hiddenDiv" id="div_2ndYear1Sem">
                    <?php foreach($course as $row){
                        if ($row->year==2&&$row->semester==1){
                            echo '
                            <div class="line-rows"><a onclick="courseworkClick(this);" style="font-size: 15px;font-weight: normal" id="'.$row->id.'">'.$row->name.' - '.$row->course_id.'</a></div>
                            ';
                        }
                    }?>
                </div>
                <div class="line-rows"><a id="2ndYear2Sem" onclick="clickFunction(this)">2'ⁿᵈ Semester</a></div>
                <div class="hiddenDiv" id="div_2ndYear2Sem">
                    <?php foreach($course as $row){
                        if ($row->year==2&&$row->semester==2){
                            echo '
                            <div class="line-rows"><a onclick="courseworkClick(this);" style="font-size: 15px;font-weight: normal" id="'.$row->id.'">'.$row->name.' - '.$row->course_id.'</a></div>
                            ';
                        }
                    }?>
                </div>
            </div>
            <br>
            <div class="line-rows"><a id="3rdYear" onclick="clickFunction(this)">3'ʳᵈ Year Coursers</a></div>
            <div class="hiddenDiv" id="div_3rdYear">
                <div class="line-rows"><a id="3rdYear1Sem" onclick="clickFunction(this)">1'ˢᵗ Semester</a></div>
                <div class="hiddenDiv" id="div_3rdYear1Sem">
                    <?php foreach($course as $row){
                        if ($row->year==3&&$row->semester==1){
                            echo '
                            <div class="line-rows"><a onclick="courseworkClick(this);" style="font-size: 15px;font-weight: normal" id="'.$row->id.'">'.$row->name.' - '.$row->course_id.'</a></div>
                            ';
                        }
                    }?>
                </div>
                <div class="line-rows"><a id="3rdYear2Sem" onclick="clickFunction(this)">2'ⁿᵈ Semester</a></div>
                <div class="hiddenDiv" id="div_3rdYear2Sem">
                    <?php foreach($course as $row){
                        if ($row->year==3&&$row->semester==2){
                            echo '
                            <div class="line-rows"><a onclick="courseworkClick(this);" style="font-size: 15px;font-weight: normal" id="'.$row->id.'">'.$row->name.' - '.$row->course_id.'</a></div>
                            ';
                        }
                    }?>
                </div>
            </div>
            <br>
            <div class="line-rows"><a id="4thYear" onclick="clickFunction(this)">4'ᵗʰ Year Coursers</a></div>
            <div class="hiddenDiv" id="div_4thYear">
                <div class="line-rows"><a id="4thYear1Sem" onclick="clickFunction(this)">1'ˢᵗ Semester</a></div>
                <div class="hiddenDiv" id="div_4thYear1Sem">
                    <?php foreach($course as $row){
                        if ($row->year==4&&$row->semester==1){
                            echo '
                            <div class="line-rows"><a onclick="courseworkClick(this);" style="font-size: 15px;font-weight: normal" id="'.$row->id.'">'.$row->name.' - '.$row->course_id.'</a></div>
                            ';
                        }
                    }?>
                </div>
                <div class="line-rows"><a id="4thYear2Sem" onclick="clickFunction(this)">2'ⁿᵈ Semester</a></div>
                <div class="hiddenDiv" id="div_4thYear2Sem">
                    <?php foreach($course as $row){
                        if ($row->year==4&&$row->semester==2){
                            echo '
                            <div class="line-rows"><a onclick="courseworkClick(this);" style="font-size: 15px;font-weight: normal" id="'.$row->id.'">'.$row->name.' - '.$row->course_id.'</a></div>
                            ';
                        }
                    }?>
                </div>
            </div>
        </div>
    </div>

    <form action="enrollment" method="post" id="courseworkIds">
        <input type="hidden" id="courseworkId" name="courseworkId">
        <input type="hidden" id="courseName" name="courseName">
    </form>

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
