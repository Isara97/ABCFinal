<!DOCTYPE html>
<html>
<head>
    <title>Square Profile  with Flat Responsive widget Design :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Square Profile Widget a Flat Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />

    <link href="<?php echo base_url();?>assets/profile/css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="<?php echo base_url();?>assets/profile/css/style.css" rel='stylesheet' type='text/css' />

    <!--webfonts-->

    <link href="//fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    <!--//webfonts-->

</head>
<body>



<!-- main -->

<div class="center-container">

    <div class="w3ls_banner_info">


        <h1>Student Profile  </h1>




        <div class="profile">
            <div class="wrap">
                <div class="profile-main">
                    <div class="profile-pic wthree">
                        <img src="<?php echo base_url()?>upload<?php echo $_SESSION['image']?>" style="width: 160px;height: 160px">
                        <div class="col-lg-5 col-lg-offset-2">
                            <?php if (isset($_SESSION['success'])) { ?>
                                <div class="alert alert-success"> <?php echo $_SESSION['success']; ?> </div>
                                <?php
                            } ?>
                            <?php
                            echo validation_errors('<div class="alert alert-danger">','</div>');
                            ?>
                            <h3>Hello</h3><h2> <?php echo $_SESSION['username'];  ?> </h2>
                        </div>
                        <br>
                        <h4 style="color: #DC143C">Profile Details</h4>
                        <br>
                        <br>

                        <div class="w3ls-agile-left" style="width: 600px">
                            <!---728x90--->
                            <div class="myprofile text-center" style="float: left;margin-left: 30px;font-family: sans-serif;font-size: 20px">
                                <div class="row">
                                    <span><b style="font-size: 22px">User Name - </b><?php echo $_SESSION['username'];  ?></span>
                                </div><br>
                                <div class="row">
                                    <span><b style="font-size: 22px">Name - </b><?php echo $_SESSION['first_name'];  ?></span><span> <?php echo $_SESSION['last_name'];  ?></span>
                                </div><br>
                                <div class="row">
                                    <span><b style="font-size: 22px">Email - </b><?php echo $_SESSION['email'];  ?></span>
                                </div><br>
                                <div class="row">
                                    <span><b style="font-size: 22px">Address - </b><?php echo $_SESSION['address'];  ?></span>
                                </div><br>
                                <div class="row">
                                    <span><b style="font-size: 22px">Gender - </b><?php echo $_SESSION['gender'];  ?></span>
                                </div><br>
                                <div class="row">
                                    <span><b style="font-size: 22px">Phone - </b><?php echo $_SESSION['phone'];  ?></span>
                                </div><br>
                                <div class="clear"></div>
                            </div>
                        </div>

                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="profile-ser">
                        <h4 >Performances</h4>
                        <div class="awards-agileinfo  w3ls-section">
                            <div class="awardsw3-agileits banner-agileinfo">
                                <div class="container">
                                    <div class="w3ls_banner_bottom_grids">
                                        <div class=" w3ls_about_guage">
                                            <div class="demo">

                                                <div class="demo-1" data-percent="70"></div>
                                                <h4>Attendance</h4>
                                            </div>
                                        </div>
                                        <div class=" w3ls_about_guage">
                                            <div class="demo">

                                                <div class="demo-1" data-percent="75"></div>
                                                <h4>Exams</h4>
                                            </div>
                                        </div>
                                        <div class=" w3ls_about_guage">
                                            <div class="demo">

                                                <div class="demo-1" data-percent="85"></div>
                                                <h4>Assignments</h4>
                                            </div>
                                        </div>
                                        <div class="clear"> </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- //Awards-->

                    </div>
                    <div class="clear"> </div>

                </div>
            </div>
        </div>






        <!--footer-->
        <div class="footer-w3">
            <p>ABC IT institute Students profiles</p>
            <p>Copyright 2018 © ABC. All Rights Reserved.</p>
        </div>
        <!--//footer-->

    </div>
</div>
<!-- //main -->

<script  src="<?php echo base_url();?>assets/profile/js/jquery.min.v3.js"></script>
<script src="<?php echo base_url();?>assets/profile/js/jquery.circlechart.js"></script>
<script>
    $('.demo-1').percentcircle();

    $('.demo-2').percentcircle({
        animate : false,
        diameter : 100,
        guage: 3,
        coverBg: '#000',
        bgColor: '#ff0000',
        fillColor: '#000',
        percentSize: '50px',
        percentWeight: 'normal'
    });

    $(document).ready(function() {
        var user_id = $(this).attr("id");
        $.ajax({
            url: "<?php echo base_url(); ?>Stuadmin_controller/fetch_singleuser",
            method: "POST",
            data: {user_id: user_id},
            dataType: "json",
            success: function (data) {
                $('#username').val(data.username);
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#password').val(data.password);
                $('#email').val(data.email);
                $('#address').val(data.address);
                $('#gender').val(data.gender);
                $('#phone').val(data.phone);
                $('#user_id').val(user_id);
                $('#user_uploaded_image').html(data.user_image);
                $('#action').val("Update");
            }
        });
    });



</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>


</body>
</html>