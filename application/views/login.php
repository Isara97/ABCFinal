<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Page</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/CustomCss/log.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<div class="col-lg-8 col-lg-offset-2 text-center" style="padding-top: 40px">
    <h1>Student Login</h1>
    <h3>Fill in the details to Login in to our website!!</h3>
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success"> <?php echo $_SESSION['success']; ?> </div>
        <?php
    } ?>
    <?php
    echo validation_errors('<div class="alert alert-danger">','</div>');
    ?>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card" style="background-color: #0c002b;box-shadow: 1px 1px 1px black, 0 0 10px blue, 0 0 5px darkblue;">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="<?php echo base_url();?>assets/CustomImages/Images/loginpage.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="" method="post" style="width: 240px">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user" style="width: 25px"></i></span>
                            </div>
                            <input class="form-control input_user" name="username" id="username" type="text" placeholder="username" style="height: 40px;width: 200px;font-size: 16px">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key" style="width: 25px"></i></span>
                            </div>
                            <input class="form-control input_pass" name="password" id="password" type="password" placeholder="password"  style="height: 40px;width: 200px;font-size: 16px">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox" style="padding-top: 8px">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline" style="font-size: 14px;color: white;">Remember me</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button class="btn login_btn" name="Login"  style="height: 40px;width: 200px;font-size: 16px;text-space: 2px">Login</button>
                        </div>
                    </form>
                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        <a href="#" style="font-size: 14px">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>







<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</body>
</html>