<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>

    <!-- Main Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/CustomCss/main.css">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        EXAMS & ASSIGNMENTS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">DIGITAL LIBRARY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">STUDENT SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>User/profile">STUDENT PROFILE</a>
                </li>
            </ul>
        </div>
    </nav>
</section>

<!--------- Slider ------------------------>
<section>
    <div>
        <ul>
            <li>
                <a href="#">
                    <div class="icon"></div>
                        <i class="fa fa-home" aria-hidden="true"></i>
                    <div class="name" data-text="Home">Home</div>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">
                    <div class="icon"></div>
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <div class="name" data-text="About">About</div>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">
                    <div class="icon"></div>
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <div class="name" data-text="Services">Services</div>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">
                    <div class="icon"></div>
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                    <div class="name" data-text="Portfolio">Portfolio</div>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">
                    <div class="icon"></div>
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <div class="name" data-text="Team">Team</div>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">
                    <div class="icon"></div>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <div class="name" data-text="Contact">Contact</div>
                </a>
            </li>
        </ul>
    </div>
</section>

<!-------------- About ------------>

<!--------------------Services--------------------->

<!---------------Team Members------------------------->


<!--------- Testimonials----------------------->


<!-----------------Get in touch ---------------------->
<section id="contact">
    <div class="container">
        <h1>Student Affairs</h1>
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

<1----Footer end ----->
</body>
</html>