<html lang="en">
<head>
    <title>admin</title>
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
            <div class="line-rows"><a id="add_course" onclick="clickFunction(this)">Upload Course Material</a></div>
            <div class="hiddenDiv" id="div_add_course">
                <form action="courseView" method="post" enctype="multipart/form-data" onsubmit="return courseMaterial(this)">
                    <p>Type</p>
                    <select name="type" required>
                        <option value="">Select Type</option>
                        <option value="1">Lecture</option>
                        <option value="2">Tutorial</option>
                        <option value="3">Practical Sheet</option>
                        <option value="4">Others</option>
                    </select>
                    <p>Description</p>
                    <input type="text" name="description" placeholder="Enter Description">
                    <p>File</p>
                    <p id="file_name" style="font-weight: normal;"></p>
                    <input type="button" value="Upload" onclick="uploadCourseFile()">
                    <div class="hiddenDiv">
                        <input type="file" name="upload_File" id="upload_File" onchange="setFileName()" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                    </div>
                    <p>File Name</p>
                    <input type="text" name="fileName" placeholder="Enter File Name" required>
                    <p>Week</p>
                    <select name="week" required>
                        <option value="">Select Week</option>
                        <option value="1">1'ˢᵗ Week</option>
                        <option value="2">2'ⁿᵈ Week</option>
                        <option value="3">3'ʳᵈ Week</option>
                        <option value="4">4'ᵗʰ Week</option>
                        <option value="5">5'ᵗʰ Week</option>
                        <option value="6">6'ᵗʰ Week</option>
                        <option value="7">7'ᵗʰ Week</option>
                        <option value="8">8'ᵗʰ Week</option>
                        <option value="9">9'ᵗʰ Week</option>
                        <option value="10">10'ᵗʰ Week</option>
                        <option value="11">11'ᵗʰ Week</option>
                        <option value="12">12'ᵗʰ Week</option>
                        <option value="13">13'ᵗʰ Week</option>
                        <option value="14">14'ᵗʰ Week</option>
                        <option value="15">15'ᵗʰ Week</option>
                        <option value="16">16'ᵗʰ Week</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="addCourseMaterial">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="change_course" onclick="clickFunction(this)">Change Course Material</a></div>
            <div class="hiddenDiv" id="div_change_course">
                <form action="courseView" method="post" enctype="multipart/form-data" onsubmit="return uploadEditFileCheck(this)">
                    <p>File Name</p>
                    <select name="old_id" id="old_id" onchange="setCourseMaterial()" required>
                        <option value="">Select File Name</option>
                        <?php foreach($material as $row){
                            echo '
                            <option value="'.$row->materialsId.'">'.$row->fileName.'</option>
                            ';
                        }?>
                    </select>
                    <br><br>
                    <p>Type</p>
                    <select name="type" id="editType" required>
                        <option value="">Select Type</option>
                        <option value="1">Lecture</option>
                        <option value="2">Tutorial</option>
                        <option value="3">Practical Sheet</option>
                        <option value="4">Others</option>
                    </select>
                    <p>Description</p>
                    <input type="text" name="description" id="editDescription" placeholder="Enter Description">
                    <p>File</p>
                    <input type="text" id="filePath" style="cursor: pointer" onclick="clickUrl()" readonly>
                    <br>
                    <input type="button" value="Upload" onclick="uploadCourseFileChange()">
                    <div class="hiddenDiv">
                        <input type="file" name="upload_File_Change" id="upload_File_Change" onchange="setChangeFileName()" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                        <input type="text" name="editUrl" id="editUrl">
                        <input type="text" name="file_Path" id="file_Path">
                    </div>
                    <p>File Name</p>
                    <input type="text" name="fileName" id="editFileName" placeholder="Enter File Name" required>
                    <p>Week</p>
                    <select name="week" id="editWeek" required>
                        <option value="">Select Week</option>
                        <option value="1">1'ˢᵗ Week</option>
                        <option value="2">2'ⁿᵈ Week</option>
                        <option value="3">3'ʳᵈ Week</option>
                        <option value="4">4'ᵗʰ Week</option>
                        <option value="5">5'ᵗʰ Week</option>
                        <option value="6">6'ᵗʰ Week</option>
                        <option value="7">7'ᵗʰ Week</option>
                        <option value="8">8'ᵗʰ Week</option>
                        <option value="9">9'ᵗʰ Week</option>
                        <option value="10">10'ᵗʰ Week</option>
                        <option value="11">11'ᵗʰ Week</option>
                        <option value="12">12'ᵗʰ Week</option>
                        <option value="13">13'ᵗʰ Week</option>
                        <option value="14">14'ᵗʰ Week</option>
                        <option value="15">15'ᵗʰ Week</option>
                        <option value="16">16'ᵗʰ Week</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="editCourseMaterial">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="delete_course" onclick="clickFunction(this)">Remove Course Material</a></div>
            <div class="hiddenDiv" id="div_delete_course">
                <form action="courseView" method="post" enctype="multipart/form-data" onsubmit="return delete_Course(this)">
                    <p>File Name</p>
                    <select name="remove_id" id="remove_id" onchange="setRemoveMaterial()" required>
                        <option value="">Select File Name</option>
                        <?php foreach($material as $row){
                            echo '
                            <option value="'.$row->materialsId.'">'.$row->fileName.'</option>
                            ';
                        }?>
                    </select>
                    <br><br>
                    <p>Type</p>
                    <select name="type" id="removeType" disabled>
                        <option value="">Select Type</option>
                        <option value="1">Lecture</option>
                        <option value="2">Tutorial</option>
                        <option value="3">Practical Sheet</option>
                        <option value="4">Others</option>
                    </select>
                    <p>Description</p>
                    <input type="text" name="description" id="removeDescription" placeholder="Enter Description" readonly>
                    <p>File</p>
                    <input type="text" id="removeFilePath" style="cursor: pointer" onclick="removeClickUrl()" readonly>
                    <div class="hiddenDiv">
                        <input type="text" id="removeUrl">
                    </div>
                    <p>File Name</p>
                    <input type="text" name="fileName" id="removeFileName" placeholder="Enter File Name" readonly>
                    <p>Week</p>
                    <select name="week" id="removeWeek" disabled>
                        <option value="">Select Week</option>
                        <option value="1">1'ˢᵗ Week</option>
                        <option value="2">2'ⁿᵈ Week</option>
                        <option value="3">3'ʳᵈ Week</option>
                        <option value="4">4'ᵗʰ Week</option>
                        <option value="5">5'ᵗʰ Week</option>
                        <option value="6">6'ᵗʰ Week</option>
                        <option value="7">7'ᵗʰ Week</option>
                        <option value="8">8'ᵗʰ Week</option>
                        <option value="9">9'ᵗʰ Week</option>
                        <option value="10">10'ᵗʰ Week</option>
                        <option value="11">11'ᵗʰ Week</option>
                        <option value="12">12'ᵗʰ Week</option>
                        <option value="13">13'ᵗʰ Week</option>
                        <option value="14">14'ᵗʰ Week</option>
                        <option value="15">15'ᵗʰ Week</option>
                        <option value="16">16'ᵗʰ Week</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="removeCourseMaterial">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="new_assignment" onclick="clickFunction(this)">New Assignment</a></div>
            <div class="hiddenDiv" id="div_new_assignment">
                <form action="courseView" method="post" enctype="multipart/form-data">
                    <p>Week</p>
                    <select name="week" required>
                        <option value="">Select Week</option>
                        <option value="1">1'ˢᵗ Week</option>
                        <option value="2">2'ⁿᵈ Week</option>
                        <option value="3">3'ʳᵈ Week</option>
                        <option value="4">4'ᵗʰ Week</option>
                        <option value="5">5'ᵗʰ Week</option>
                        <option value="6">6'ᵗʰ Week</option>
                        <option value="7">7'ᵗʰ Week</option>
                        <option value="8">8'ᵗʰ Week</option>
                        <option value="9">9'ᵗʰ Week</option>
                        <option value="10">10'ᵗʰ Week</option>
                        <option value="11">11'ᵗʰ Week</option>
                        <option value="12">12'ᵗʰ Week</option>
                        <option value="13">13'ᵗʰ Week</option>
                        <option value="14">14'ᵗʰ Week</option>
                        <option value="15">15'ᵗʰ Week</option>
                        <option value="16">16'ᵗʰ Week</option>
                    </select>
                    <p>Submission Date</p>
                    <input type="date" name="date" data-date-format="YYYY-MM-DD" min="<?php echo date('Y-m-d'); ?>" required>
                    <p>Description</p>
                    <input type="text" name="description" placeholder="Enter Description">
                    <p>Upload Document</p>
                    <input type="text" name="assignmentDocument" id="assignmentDocument" style="cursor: pointer" readonly>
                    <div class="hiddenDiv">
                        <input type="file" name="assignmentFile" id="assignmentFile" onchange="setAssignmentDocument()" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                    </div>
                    <br>
                    <input type="button" value="Upload" onclick="uploadAssignment()">
                    <p>Assignment Name</p>
                    <input type="text" name="assignmentName" placeholder="Enter Assignment Name" required>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="addAssignment">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="edit_assignment" onclick="clickFunction(this)">Edit Assignment</a></div>
            <div class="hiddenDiv" id="div_edit_assignment">
                <form action="courseView" method="post" enctype="multipart/form-data" onsubmit="return confirmEditCourse(this)">
                    <p>Assignment Name</p>
                    <select name="assignment_id" id="assignment_id" onchange="setAssignment()" required>
                        <option value="">Select Assignment Name</option>
                        <?php foreach($assignment as $row){
                            echo '
                            <option value="'.$row->assignmentId.'">'.$row->assignmentName.'</option>
                            ';
                        }?>
                    </select>
                    <br><br>
                    <p>Week</p>
                    <select name="week" id="assignmentWeek" required>
                        <option value="">Select Week</option>
                        <option value="1">1'ˢᵗ Week</option>
                        <option value="2">2'ⁿᵈ Week</option>
                        <option value="3">3'ʳᵈ Week</option>
                        <option value="4">4'ᵗʰ Week</option>
                        <option value="5">5'ᵗʰ Week</option>
                        <option value="6">6'ᵗʰ Week</option>
                        <option value="7">7'ᵗʰ Week</option>
                        <option value="8">8'ᵗʰ Week</option>
                        <option value="9">9'ᵗʰ Week</option>
                        <option value="10">10'ᵗʰ Week</option>
                        <option value="11">11'ᵗʰ Week</option>
                        <option value="12">12'ᵗʰ Week</option>
                        <option value="13">13'ᵗʰ Week</option>
                        <option value="14">14'ᵗʰ Week</option>
                        <option value="15">15'ᵗʰ Week</option>
                        <option value="16">16'ᵗʰ Week</option>
                    </select>
                    <p>Submission Date</p>
                    <input type="date" name="date" id="submitDate" data-date-format="YYYY-MM-DD" min="<?php echo date('Y-m-d'); ?>" required>
                    <p>Description</p>
                    <input type="text" name="description" id="assignmentDescription" placeholder="Enter Description">
                    <p>Upload Document</p>
                    <input type="text" name="assignmentDocument" id="editAssignmentDocument" onclick="assignmentClickUrl()" style="cursor: pointer" readonly>
                    <div class="hiddenDiv">
                        <input type="file" name="assignmentFile" id="editAssignmentFile" onchange="setAssignmentDocumentEdit()" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                        <input type="text" name="assignmentFileUrl" id="assignmentFileUrl">
                        <input type="text" name="file_Path" id="assignment_File_Path">
                    </div>
                    <br>
                    <input type="button" value="Upload" onclick="uploadAssignmentEdit()">
                    <p>Assignment Name</p>
                    <input type="text" name="assignmentName" id="assignmentName" placeholder="Enter Assignment Name" required>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="editAssignment">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="remove_assignment" onclick="clickFunction(this)">Remove Assignment</a></div>
            <div class="hiddenDiv" id="div_remove_assignment">
                <form action="courseView" method="post" enctype="multipart/form-data" onsubmit="return delete_Course(this)">
                    <p>Assignment Name</p>
                    <select name="assignmentRemove_id" id="assignmentRemove_id" onchange="setRemoveAssignment()" required>
                        <option value="">Select Assignment Name</option>
                        <?php foreach($assignment as $row){
                            echo '
                            <option value="'.$row->assignmentId.'">'.$row->assignmentName.'</option>
                            ';
                        }?>
                    </select>
                    <br><br>
                    <p>Week</p>
                    <select id="assignmentWeekRemove" disabled>
                        <option value="">Select Week</option>
                        <option value="1">1'ˢᵗ Week</option>
                        <option value="2">2'ⁿᵈ Week</option>
                        <option value="3">3'ʳᵈ Week</option>
                        <option value="4">4'ᵗʰ Week</option>
                        <option value="5">5'ᵗʰ Week</option>
                        <option value="6">6'ᵗʰ Week</option>
                        <option value="7">7'ᵗʰ Week</option>
                        <option value="8">8'ᵗʰ Week</option>
                        <option value="9">9'ᵗʰ Week</option>
                        <option value="10">10'ᵗʰ Week</option>
                        <option value="11">11'ᵗʰ Week</option>
                        <option value="12">12'ᵗʰ Week</option>
                        <option value="13">13'ᵗʰ Week</option>
                        <option value="14">14'ᵗʰ Week</option>
                        <option value="15">15'ᵗʰ Week</option>
                        <option value="16">16'ᵗʰ Week</option>
                    </select>
                    <p>Submission Date</p>
                    <input type="date" id="submitDateRemove" data-date-format="YYYY-MM-DD" min="<?php echo date('Y-m-d'); ?>" readonly>
                    <p>Description</p>
                    <input type="text" id="assignmentDescriptionRemove" readonly>
                    <p>Document</p>
                    <input type="text" id="editAssignmentDocumentRemove" onclick="assignmentRemoveClickUrl()" style="cursor: pointer" readonly>
                    <div class="hiddenDiv">
                        <input type="text" id="assignmentFileUrlRemove">
                    </div>
                    <p>Assignment Name</p>
                    <input type="text" id="assignmentNameRemove" readonly>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="removeAssignment">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="add_notices" onclick="clickFunction(this)">Add Notices</a></div>
            <div class="hiddenDiv" id="div_add_notices">
                <form action="courseView" method="post">
                    <p>Note</p>
                    <textarea name="note" required></textarea>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="addNotices">
                    <br><br>
                </form>
            </div>
            <div class="line-rows"><a id="edit_notices" onclick="clickFunction(this)">Edit/Remove Notices</a></div>
            <div class="hiddenDiv" id="div_edit_notices">
                <form action="courseView" method="post" onsubmit="return confirmEditCourse(this)">
                    <p>Notice Date</p>
                    <select name="notice_id" id="notice_id" onchange="setNoticeDetails()" required>
                        <option value="">Select Notice Date</option>
                        <?php foreach($notice as $row){
                            echo '
                            <option value="'.$row->id.'">'.$row->date.'</option>
                            ';
                        }?>
                    </select>
                    <p>Note</p>
                    <textarea name="note" id="noticeNote" required></textarea>
                    <br><br>
                    <input type="submit" value="Confirm Edit">
                    <input type="hidden" name="editNotices">
                    <br><br>
                </form>
                <form action="courseView" method="post" onsubmit="return delete_Notice_Check(this)">
                    <input type="hidden" name="removeNoticeId" id="removeNoticeId" required>
                    <input type="submit" value="Confirm Remove">
                    <input type="hidden" name="removeNotices">
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
    <?php foreach($material as $row){
        echo '
            <input type="hidden" value="'.$row->type.'" id="editType'.$row->materialsId.'" >
            <input type="hidden" value="'.$row->description.'" id="editDescription'.$row->materialsId.'" >
            <input type="hidden" value="'.$row->fileName.'" id="editFileName'.$row->materialsId.'" >
            <input type="hidden" value="'.$row->course_id.' - '.$row->fileName.'" id="file'.$row->materialsId.'" >
            <input type="hidden" value="'.base_url().$row->path.'" id="filePath'.$row->materialsId.'" >
            <input type="hidden" value="'.$row->week.'" id="editWeek'.$row->materialsId.'" >
            <input type="hidden" value="'.$row->path.'" id="file_Path'.$row->materialsId.'" >
        ';
    }?>
    <?php foreach($assignment as $row){
        echo '
            <input type="hidden" value="'.$row->week.'" id="assignmentWeek'.$row->assignmentId.'" >
            <input type="hidden" value="'.$row->assignmentDate.'" id="submitDate'.$row->assignmentId.'" >
            <input type="hidden" value="'.$row->description.'" id="assignmentDescription'.$row->assignmentId.'" >
            <input type="hidden" value="'.base_url().$row->document.'" id="assignmentFileUrl'.$row->assignmentId.'" >
            <input type="hidden" value="'.$row->course_id.' - '.$row->assignmentName.'" id="assignmentFileName'.$row->assignmentId.'" >
            <input type="hidden" value="'.$row->assignmentName.'" id="assignmentName'.$row->assignmentId.'" >
            <input type="hidden" value="'.$row->document.'" id="assignment_File_Path'.$row->assignmentId.'" >
        ';
    }?>
    <?php foreach($notice as $row){
        echo '
            <input type="hidden" value="'.$row->note.'" id="noticeNote'.$row->id.'" >
            <input type="hidden" value="'.$row->id.'" id="noticeId'.$row->id.'" >
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

    function uploadCourseFile() {
        $('#upload_File').trigger('click');
    }

    function uploadAssignment() {
        $('#assignmentFile').trigger('click');
    }

    function uploadAssignmentEdit() {
        $('#editAssignmentFile').trigger('click');
    }

    function uploadCourseFileChange() {
        var id = document.getElementById("old_id").value;
        if (id != ""){
            $('#upload_File_Change').trigger('click');
        }
    }

    function setFileName() {

        var fileInput = document.getElementById('upload_File');
        var filename = fileInput.files[0].name;

        document.getElementById("file_name").innerHTML = filename;

    }

    function setChangeFileName() {

        var fileInput = document.getElementById('upload_File_Change');
        var filename = fileInput.files[0].name;

        document.getElementById('filePath').value = filename;

        document.getElementById("editUrl").value = "";

    }

    function setAssignmentDocument() {

        var fileInput = document.getElementById('assignmentFile');
        var filename = fileInput.files[0].name;

        document.getElementById('assignmentDocument').value = filename;

    }

    function setAssignmentDocumentEdit() {

        var fileInput = document.getElementById('editAssignmentFile');
        var filename = fileInput.files[0].name;

        document.getElementById('editAssignmentDocument').value = filename;

        document.getElementById("assignmentFileUrl").value = "";

    }

    function clickUrl() {

        var url = document.getElementById("editUrl").value;

        if(url != ""){
            window.open(url, '_blank');
        }

    }

    function removeClickUrl() {

        var url = document.getElementById("removeUrl").value;

        if(url != ""){
            window.open(url, '_blank');
        }

    }

    function assignmentClickUrl() {

        var url = document.getElementById("assignmentFileUrl").value;

        if(url != ""){
            window.open(url, '_blank');
        }

    }

    function assignmentRemoveClickUrl() {

        var url = document.getElementById("assignmentFileUrlRemove").value;

        if(url != ""){
            window.open(url, '_blank');
        }

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
            showErrorMsg("This Enrollment Key Is Wrong !");
            <?php $this->session->set_flashdata("error",null); ?>
        }
    }

</script>
