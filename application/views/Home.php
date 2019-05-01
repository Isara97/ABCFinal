<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>

    <!-- Main Css
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/CustomCss/main.css"> -->
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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></link>

    <style>
        *{
            margin: 0;
            padding: 0;
            height: auto;
            width: 100%;
        }


        /* -----Navigation bar -------*/
        #nav-bar{
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .navbar-brand img{
            padding-left: 30px;
            padding-top: 0;
            padding-bottom: 0;
            height: 30px;
            width: 200px;
        }
        img{
            float: left;
            width: 100%;
        }

        .navbar-nav li{
            padding: 0 8px;
            width: 120px;

        }

        .navbar-nav li a{
            float: right;
            text-align: left;
        }

        #nav-bar ul li a:hover{
            color: crimson;
        }

        .navbar{
            background: #fff;
        }

        .navbar-toggler{
            border: none!important;
        }

        .nav-link{
            color: #555!important;
            font-weight: 600;
            font-size: 16px;
        }

        /* ------- Slider ----------------- */
        #slider{
            width: 100%;
        }

        .carousel-caption{
            top: 50%;
            transform: translateY(-50%);
            bottom: initial!important;
        }

        .carousel-caption h3{
            color: white;
            font-size: 42px;
        }

        /*------------------About----------------------*/
        #about{
            padding-top: 50px;
            padding-bottom: 50px;
            color: #555;
        }

        #about .btn{
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .about-content{
            padding-top: 20px;

        }
        .skills-bar p{
            margin-bottom: 6px;
            font-weight: 600;
        }

        .progress-bar{
            border-radius: 16px;
        }

        .progress{
            border-radius: 16px;
            margin-bottom: 20px;
        }

        /* -----------------------------Services --------------------------*/
        #services{
            background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)), url('/assets/CustomImages/Images/Services/services.jpg') ;
            background-size: cover;
            background-position: center;
            color: #efefef!important;
            background-attachment: fixed;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        #services h1{
            text-align: center;
            color: #efefef!important;
            padding-bottom: 10px;
        }

        #services h1:after{
            content: '';
            background: #efefef;
            display: block;
            height: 3px;
            width: 170px;
            margin: 20px auto 5px;
        }

        .services{
            margin-top: 40px;
        }

        .icon{
            font-size: 40px;
            margin: 20px auto;
            padding: 20px;
            height: 80px;
            width: 80px;
        }

        #services p{
            font-size: 14px;
            margin-top: 20px;
            color: #ccc;
        }

        .services .col-md-3:hover{
            background: #007bff;
            cursor: pointer;
            transition: 0.7s;
        }


        /* --------------------- Team Members -------------------------------*/

        #team{
            padding-top: 50px;
            padding-bottom: 50px;
            color: #555;
        }

        h1{
            text-align: center;
            color: grey!important;
            padding-bottom: 10px;
        }

        h1:after{
            content: '';
            background: crimson;
            display: block;
            height: 3px;
            width: 170px;
            margin: 20px auto 5px;
        }

        .profile-pic{
            margin-top: 25px;
        }

        .profile-pic .img-box{
            opacity: 1;
            display: block;
            position: relative;
        }

        .profile-pic .img-box img{
            filter: grayscale(1);
        }


        .profile-pic .img-box :hover{
            filter: grayscale(0);
            cursor: pointer;
        }

        .profile-pic h2{
            font-size: 22px;
            font-weight: bold;
            margin-top: 15px;
            color: #007bff!important;
        }

        .profile-pic h3{
            font-size: 15px;
            font-weight: bold;
            margin-top: 15px;
        }

        #team .fa{
            height: 25px;
            width: 25px;
            color: #007bff!important;
            background: #fff;
            padding: 4px;
            border-radius: 50%;
        }

        .img-box ul{
            padding: 15px 0;
            position: absolute;
            z-index: 2;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
        }

        .img-box ul li{
            padding: 5px;
            display: inline-block;
        }

        .img-box:hover ul{
            opacity: 1;
        }
        .img-box ul, .img-box ul li{
            transition: 0.5s;
        }

        /*----------Testimonials--------------------*/
        #testimonials{
            padding-top: 50px;
            padding-bottom: 50px;
        }

        #testimonials .row{
            margin-top: 30px;
        }

        .col-md-4{
            margin: 40px auto;
        }

        .profile{
            padding: 70px 10px 10px;
            background-color: antiquewhite;
        }

        .user{
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }

        .profile img{
            top: -60px;
            position: absolute;
            left: calc(50% - 60px);
            border: 10px solid #fff;
        }

        .profile h3{
            font-size: 20px;
            margin-top: 15px;
            color: crimson;
        }

        blockquote{
            font-size: 16px;
            line-height: 30px;
        }

        /*
        blockquote::before{
            content: '\93';
            font-size: 50px;
            color: #007bff;
            position: relative;
            line-height: 20px;
            bottom: -15px;
            right: 5px;
        }

        blockquote:after{
            content: '\94';
            font-size: 50px;
            color: #007bff;
            position: relative;
            line-height: 10px;
            bottom: -15px;
            left: 5px;
        }

        */

        .profile:hover{
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            cursor: pointer;
            transition: 0.5s;
        }

        /*---------------------Get in Touch ----------------------------*/

        #contact{
            background-color: #efefef;
            padding-top: 40px;
            padding-bottom: 40px;
            color: #777;
        }

        .contact-form{
            padding: 15px;
        }

        .form-control{
            border-radius: 0!important;
            border: none!important;
        }

        ::placeholder{
            color: #999!important;
        }

        .follow{
            background: #fff;
            padding: 10px;
            margin: 15px;
        }

        .contact-info .fa{
            margin: 10px;
            color: #007bff;
            font-weight: bold;
        }

        /*------------Footer ---------------------*/
        #footer{
            background: #333;
            color: #ffffff;
            padding: 12px;
        }

        .fa-heart-o{
            margin: 3px;
            color: red;
        }

        /*Smooth scroll of the page*/
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>

<!-----navigationBar---->
<section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>assets/CustomImages/Images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">COURSES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">NOTICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#team">OUR TEAM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">CONTACT</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LOGIN</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>Auth/login">Student</a>
                        <a class="dropdown-item" href="#">Lecturer</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</section>

<!--------- Slider ------------------------>
<div id="slider">
    <div class="bd-example">
        <div id="headerSlider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
                <li data-target="#headerSlider" data-slide-to="1"></li>
                <li data-target="#headerSlider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Slider/bg-1.jpg" class="d-block img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>ABC INSTITUTE OF SRILANKA</h3>
                        <h5>Information & Technology Institue</h5>
                        <a href="#" class="btn btn-lg btn-common animated fadeInUp">Get Started</a>
                        <a href="#" class="btn btn-lg btn-border animated fadeInUp">Learn More</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Slider/bg-2.jpg" class="d-block img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>NEW - era of Information Technology</h3>
                        <p>Providing the best IT Developers<br>
                            Unbelivable University Environment </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Slider/b-3.jpg" class="d-block img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>10000+ Students</h3>
                        <h5>Undergraduates | Graduates | Labs | Lecturers | Researches</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<!-------------- About ------------>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>About Us</h2>
                <div class="about-content" id="#about">
                    <p>The ABC Institute of Technology which is Sri Lanka’s premiere IT and Business campus,
                        has now paved the path for their first year students to have the option of transferring
                        to the world.
                        Initially the institute was focused on providing British higher education to the youth of
                        SriLanka.
                        this goal however expanded to provide students with a more hands-on experience by giving students
                        a chance to obtain work experience during the course of their degree. This comes as a mandatory one
                        year industrial placement which will not only empower a student with only a degree but also with the
                        necessary work experience. With this added advantage, IIT students have a 100% employment assurance
                        and is most often selected for high income employment at renowned organizations.<br>
                        Students of IIT have not only excelled in academic work; they have also shone in sports such as Cricket,
                        Rugby and Basketball, being their favourite games. Students play an active part in the Rotract Club and
                        show cases a concert ‘stagecraft’ which brings to light the talent in song, music and drama. Cutting Edge,
                        an exhibition which demonstrates the final year projects to academia and the industry, is another yearly
                        event which has won the appreciation of those who viewed these projects.
                    </p>
                </div>
                <button type="button" class="btn btn-primary">Read More >> </button>
            </div>
            <div class="col-md-6 skills-bar">
                <h2>Why Study at ABC</h2><br>
                <p>An Internationally recognised degree
                    At ABC you will obtain an internationally
                    recognised degree from the University of Westminster, UK.
                    Cost saving
                    Students studying at ABC save almost 72% of course fees compared to studying in the UK.
                    International student save almost 68% on living expenditure compared to studying in the UK.
                </p><br>

                <p>Industry employees from ABC</p>
                <div class="progress">
                    <div class="progress-bar" style="width: 90%;">90%</div>
                </div><br>
                <p>Island wide All student in ABC</p>
                <div class="progress">
                    <div class="progress-bar" style="width: 95%;">95%</div>
                </div><br>
                <p>Graduated Per Year</p>
                <div class="progress">
                    <div class="progress-bar" style="width: 85%;">85%</div>
                </div><br>
                <p>World wide Lecturers are in ABC</p>
                <div class="progress">
                    <div class="progress-bar" style="width: 65%;">65%</div>
                </div><br>
            </div>
        </div>
    </div>
</section>

<!--------------------Services--------------------->
<section id="services">
    <div class="container">
        <h1>Our Services</h1>
        <div class="row services">
            <div class="col-md-3 text-center">
                <div class="icon">
                    <i class="fa fa-eye"></i>
                </div>
                <h3>Our Vision</h3>
                <p>To be recognized as a leader in
                    higher education and research
                    , providing a transformational
                    educational experience.</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="icon">
                    <i class="fa fa-shield"></i>
                </div>
                <h3>Our Contribution</h3>
                <p>We are committed to leadership in the advancement,
                    dissemination and application of knowledge
                    to solve real life problems, facilitating the
                    creation of new commercial opportunities
                    and startup companies.</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="icon">
                    <i class="fa fa-user-secret"></i>
                </div>
                <h3>Our Shareholders</h3>
                <p>We operate profitably and provide competitive
                    return on investment to our shareholders.</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <h3>Our People</h3>
                <p>The academic staff and other functional
                    staff are provided staff development
                    opportunities to keep up with current
                    developments in order to enhance the
                    quality of teaching and to follow
                    the global best practices.</p>
            </div>
        </div>
    </div>
</section>

<!---------------Team Members------------------------->
<section id="team">
    <div class="container">
        <h1>Our Team</h1>
        <div class="row">
            <div class="col-md-3 profile-pic text-center">
                <div class="img-box">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Team/p-6.jpg" class="img-responsive" width="260" height="270">
                    <ul>
                        <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                        <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                        <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                    </ul>
                </div>
                <h2>Isara</h2>
                <h3>Developer / Tester</h3>
                <p>Ask Questions ?</p>
            </div>
            <div class="col-md-3 profile-pic text-center">
                <div class="img-box">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Team/p-5.png" class="img-responsive" width="260" height="270">
                    <ul>
                        <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                        <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                        <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                    </ul>
                </div>
                <h2>Ishan</h2>
                <h3>Developer / Tester</h3>
                <p>Ask Questions ?</p>
            </div>
            <div class="col-md-3 profile-pic text-center">
                <div class="img-box">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Team/p-3.png" class="img-responsive" width="260" height="270">
                    <ul>
                        <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                        <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                        <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                    </ul>
                </div>
                <h2>Laleesha</h2>
                <h3>Developer / Tester</h3>
                <p>Ask Questions ?</p>
            </div>
            <div class="col-md-3 profile-pic text-center">
                <div class="img-box">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Team/p-1.png" class="img-responsive" width="260" height="270">
                    <ul>
                        <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                        <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                        <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                    </ul>
                </div>
                <h2>Dakshika</h2>
                <h3>Developer / Tester</h3>
                <p>Ask Questions ?</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 profile-pic text-center">
                <div class="img-box">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Team/p-2.png" class="img-responsive" width="260" height="270">
                    <ul>
                        <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                        <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                        <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                    </ul>
                </div>
                <h2>Shashi</h2>
                <h3>Developer / Tester</h3>
                <p>Ask Questions ?</p>
            </div>
            <div class="col-md-3 profile-pic text-center">
                <div class="img-box">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Team/p-4.png" class="img-responsive" width="260" height="270">
                    <ul>
                        <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                        <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                        <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                    </ul>
                </div>
                <h2>Dulsara</h2>
                <h3>Developer / Tester</h3>
                <p>Ask Questions ?</p>
            </div>
            <div class="col-md-3 profile-pic text-center">
                <div class="img-box">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Team/p-7.png" class="img-responsive" width="260" height="270">
                    <ul>
                        <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                        <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                        <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                    </ul>
                </div>
                <h2>Mrs. Kushnara</h2>
                <h3>Lecturer / Student Advisor</h3>
                <p>Ask Questions ?</p>
            </div>
            <div class="col-md-3 profile-pic text-center">
                <div class="img-box">
                    <img src="<?php echo base_url();?>assets/CustomImages/Images/Team/p-8.gif" class="img-responsive" width="260" height="270">
                    <ul>
                        <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                        <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                        <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                    </ul>
                </div>
                <h2>Mr. Dilshan</h2>
                <h3>Lecturer / Student Advisor</h3>
                <p>Ask Questions ?</p>
            </div>
        </div>
    </div>
</section>

<!--------- Testimonials----------------------->
<section id="testimonials">
    <div class="container">
        <h1>Testimonials</h1>
        <p class="text-center"> Visit Our Web sites for New Courses</p>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="profile">
                    <a href="#"><img src="<?php echo base_url();?>assets/CustomImages/Images/Profile/pro-1.png" class="user"></a>
                    <blockquote>Students Who willing to join ABC institute. You all are welcome.
                        Don't forget to vist our pages for new Courses. Remember Education is 1st</blockquote>
                    <h3> ABC CO - Producer</h3>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="profile">
                    <a href="#"><img src="<?php echo base_url();?>assets/CustomImages/Images/Profile/pro-2.jpg" class="user"></a>
                    <blockquote>Lecturers from world wide. We all welcome you for our campus. Vist our portal for more details</blockquote>
                    <h3> ABC CEO</h3>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="profile">
                    <a href="#"><img src="<?php echo base_url();?>assets/CustomImages/Images/Profile/pro-3.png" class="user"></a>
                    <blockquote>This is your responsibilty to overcome your targets and achieve it. Don't wait to longer Visit our web site </blockquote>
                    <h3> ABC CO - Admin</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-----------------Get in touch ---------------------->
<section id="contact">
    <div class="container">
        <h1>Get In Touch</h1>
        <div class="row">
            <div class="col-md-6">
                <form class="contact-form" action="<?php echo base_url('Services/submit') ?>"  method="post">
                    <div class="form-group">
                        <input type="text" name="my_name" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="number" name="my_phone" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <input type="email" name="my_email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="txt_description" rows="4" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" name="btnSave" class="btn btn-primary">Send Message >></button>
                </form>
            </div>
            <div class="col-md-6 contact-info">
                <div class="follow"><b>Address : </b><i class="fa fa-map-marker"></i> New Kandy Rd,Malabe</div>
                <div class="follow"><b>Phone : </b><i class="fa fa-phone"></i> +94 11 754 4801</div>
                <div class="follow"><b>Email : </b><i class="fa fa-envelope-o"></i> abc@gmail.com</div>
            </div>
        </div>
    </div>
</section>

<!------------------Footer------------------------->
<section id="footer">
    <div class="container text-center">
        <p>ABC INSTITUTE OF SRI LANKA <i class="fa fa-heart-o"></i> ALL ARE WELCOME</p>
    </div>
</section>

<!----Footer end ----->
</body>
</html>
