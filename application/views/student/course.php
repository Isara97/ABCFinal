<html lang="en">
<head>
    <title><?php if (isset($_SESSION['courseName'])){ echo $_SESSION['courseName'];} ?></title>
    <!--<link rel="icon" href="<?php /*echo base_url(); */?>siteimage/site.jpg" type="image/ico">-->

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
			<h1 class="brand"><a href="<?php echo base_url('LmsController/home'); ?>">A<span>BC</span> Institute</a></h1>
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
            <div class="line-rows"><a href="<?php echo base_url('LmsController/stdNotification'); ?>" >Notifications</a> <?php if (isset($_SESSION['userNotification'])){ if ($_SESSION['userNotification']==1){ echo '<span class="dot">!</span>';}} ?></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/stdSettings'); ?>" >Account Settings</a></div>
        </div>
        <div class="user-setting">
            <div class="line-rows"><a>Notices</a></div>
            <?php
            foreach($notices as $row){
                echo '<p>'.$row->date.'</p>
                      <p>'.$row->note.'</p>';
            }
            ?>
            <div class="line-rows"><a>1'ˢᵗ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==1){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==1){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==1){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==1){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==1){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>2'ⁿᵈ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==2){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==2){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==2){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==2){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==2){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>3'ʳᵈ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==3){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==3){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==3){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==3){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==3){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>4'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==4){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==4){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==4){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==4){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==4){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>5'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==5){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==5){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==5){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==5){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==5){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>6'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==6){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==6){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==6){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==6){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==6){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>7'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==7){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==7){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==7){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==7){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==7){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>8'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==8){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==8){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==8){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==8){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==8){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>9'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==9){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==9){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==9){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==9){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==9){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>10'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==10){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==10){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==10){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==10){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==10){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>11'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==11){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==11){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==11){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==11){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==11){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>12'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==12){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==12){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==12){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==12){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==12){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>13'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==13){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==13){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==13){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==13){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==13){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>14'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==14){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==14){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==14){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==14){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==14){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>15'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==15){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==15){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==15){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==15){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==15){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <br>
            <div class="line-rows"><a>16'ᵗʰ Week</a></div>
            <?php $i=0; foreach($material as $row){
                if ($row->week==16){
                    if ($row->type==1){
                        if ($i==0){
                            echo '<p>Lecture</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==16){
                    if ($row->type==2){
                        if ($i==0){
                            echo '<p>Tutorial</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==16){
                    if ($row->type==3){
                        if ($i==0){
                            echo '<p>Practical Sheet</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($material as $row){
                if ($row->week==16){
                    if ($row->type==4){
                        if ($i==0){
                            echo '<p>Others</p>';
                            $i++;
                        }
                        echo '<div>
                                    <p style="cursor: pointer" id="'.base_url().$row->path.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->fileName.'</p> 
                                    <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                              </div>';
                    }
                }
            } ?>
            <?php $i=0; foreach($assignment as $row){
                if ($row->week==16){
                    if ($i==0){
                        echo '<p>Assignment</p>';
                        $i++;
                    }
                    if ($row->document!=""){
                        echo '<p style="cursor: pointer" id="'.base_url().$row->document.'" onclick="clickUrl(this)">&emsp;<img src="'.base_url().'siteimage/doc.png" style="width:20px"> '.$row->assignmentName.'</p>';
                    }
                    echo '
                       <div>
                            <p style="font-size: 15px;font-weight: normal">&emsp;'.$row->description.'</p>
                            <p style="font-size: 15px;font-weight: normal">&emsp;Due date : '.$row->assignmentDate.'</p>
                            <p style="cursor: pointer" id="assignment_id_'.$row->assignmentId.'" onclick="assignmentUrl(this)">&emsp;<img src="'.base_url().'siteimage/assignmentIcon.png" style="width:20px;"> Add Submission</p>
                            <div class="hiddenDiv">
                                <form action="stdCourse" method="post" id="assignment_id_'.$row->assignmentId.'_form">
                                    <input type="hidden" name="assignment_id" value="'.$row->assignmentId.'">
                                </form>
                            </div>
                      </div>';
                }
            } ?>
            <div class="line-rows"><a href="participants">Participants</a></div>
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

    function clickUrl(id) {

        var id=id.id;

        if(id != ""){
            window.open(id, '_blank');
        }

    }

    function assignmentUrl(id) {

        var id=id.id+'_form';

        document.getElementById(id).submit();

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
            swal({
                title: "Overdue !",
                text: "Assignment is Overdue !",
                icon: "warning",
                dangerMode: true,
            });
            <?php $this->session->set_flashdata("error",null); ?>
        }
    }

</script>
