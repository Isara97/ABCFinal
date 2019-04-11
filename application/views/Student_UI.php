<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/CustomCss/Stud_UI.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            padding: 10px;
            background: #f1f1f1;
        }

        /* Create two unequal columns that floats next to each other */
        /* Left column */
        .leftcolumn {
            float: left;
            width: 75%;
        }

        /* Right column */
        .rightcolumn {
            float: left;
            width: 25%;
            background-color: #f1f1f1;
            padding-left: 20px;
        }

        /* Fake image */
        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        /* Add a card effect for articles */
        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Footer */
        .footer {
            padding: 20px;
            text-align: center;
            background: #ddd;
            margin-top: 20px;
            background-color: #DC143C;
            color: white;
            text-align: center;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 800px) {
            .leftcolumn, .rightcolumn {
                width: 100%;
                padding: 0;
            }
        }

        /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
        @media screen and (max-width: 400px) {
            .topnav a {
                float: none;
                width: 100%;
            }
        }

        .footer2{
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #2E4053;
            height: 287px;
        }

        /* footer calender */
        ul {list-style-type: none;}


        /* Month header */
        .mycalender{
            width: 30%;
        }
        .month {
            padding: 10px 5px;
            width: 100%;
            background: #DC143C;
            text-align: center;
        }

        /* Month list */
        .month ul {
            margin: 0;
            padding: 0;
        }

        .month ul li {
            color: white;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        /* Previous button inside month header */
        .month .prev {
            float: left;
            padding-top: 10px;
        }

        /* Next button */
        .month .next {
            float: right;
            padding-top: 10px;
        }

        /* Weekdays (Mon-Sun) */
        .weekdays {
            margin: 0;
            padding: 2px 0;
            background-color:#ddd;
        }

        .weekdays li {
            display: inline-block;
            width: 12.6%;
            color: #666;
            text-align: center;
        }

        /* Days (1-31) */
        .days {
            padding: 10px 0;
            background: #eee;
            margin: 0;
        }

        .days li {
            list-style-type: none;
            display: inline-block;
            width: 12.6%;
            text-align: center;
            margin-bottom: 12px;
            font-size:12px;
            color: #777;
        }

        /* Highlight the "current" day */
        .days li .active {
            padding: 10px;
            background: #DC143C;
            color: white !important
        }


    </style>
</head>
<body>

<div class="head">
    <div class="row1">
        <div class="column1">
            <div class="logo">
                <img src="<?php echo base_url()?>assets/CustomImages/Images/logo.png">
            </div>
        </div>
        <div class="column2">
            <div class="myname">
                <div class="dropdown">
                    <span style="text-transform: uppercase;font-size: 14px;color: #DC143C"><b><?php echo $_SESSION['first_name'];  ?></span><span style="text-transform: uppercase;font-size: 14px"> <?php echo $_SESSION['last_name'];  ?></b></span>
                    <div class="dropdown-content4">
                        <a href="<?php echo base_url()?>user/profile"><i class="fa fa-user-circle"></i>  Profile</a>
                        <a href="#news"><i class="fa fa-asterisk"></i>  Preferences</a>
                        <a href="<?php echo base_url()?>user/logout"><i class="fa fa-sign-out"></i>  Logout</a>
                    </div>
                </div>
            </div>
            <div class="user">
                <a href="<?php echo base_url()?>user/profile"><img src="<?php echo base_url()?>upload<?php echo $_SESSION['image']?>"></a><br>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="topnav" id="myTopnav">
        <a href="#home" class="active">ABC INSTITUTE</a>
        <a href="#services">Student Services</a>
        <a href="#contact">Contact</a>
        <a href="#about">Library</a>
        <a href="#about">About</a>
        <div class="dropdown">
            <button class="dropbtn">Exams & Assignments <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content1">
                <a href="#">Exams</a>
                <a href="#">Assignments</a>
                <a href="#">Notices</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Courses
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content2">
                <div class="header">
                    <h2>Courses  Menu</h2>
                </div>
                <div class="row">
                    <div class="column">
                        <h3>Information Techology</h3>
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                    <div class="column">
                        <h3>Software Engineering</h3>
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                    <div class="column">
                        <h3>Networking</h3>
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                    <div class="column">
                        <h3>Cyber Security</h3>
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
</section>

<div class="row">
    <div class="leftcolumn">
        <div class="card">
            <h2>Dashboard</h2>
            <h5>Welcome <span style="color: #006600;font-size: 18px"><?php echo $_SESSION['username'];  ?></span>, Dec 7, 2017</h5>
            <div class="notices">
                <button class="collapsible1" style="font-family: Arial;font-size: 14px"><i class="fa fa-bell" style="color: white"></i> <span>  </span> Latest Announcements</button>
                <div class="content1">
                    <br>
                    <br>
                    <span><a href="#Announcement1" style="text-decoration: none;color: #21618C">Announcement1</a></span><br>
                    <br>
                    <span><a href="#Announcement2" style="text-decoration: none;color: #21618C">Announcement2</a></span><br>
                    <br>
                    <span><a href="#Announcement3" style="text-decoration: none;color: #21618C">Announcement3</a></span><br>
                    <br>
                    <span><a href="#Announcement4" style="text-decoration: none;color: #21618C">Announcement4</a></span><br>
                    <br>
                    <span><a href="#Announcement5" style="text-decoration: none;color: #21618C">Announcement5</a></span><br>
                    <br>
                    <span><a href="#Announcement6" style="text-decoration: none;color: #21618C">Announcement6</a></span><br>
                    <br>
                    <span><a href="#Announcement6" style="text-decoration: none;color: #21618C">Older....</a></span><br>
                    <br>
                    <br>
                </div>
            </div>




        </div>

        <div class="card">
            <div class="courseOverview" style="cursor: pointer">
                <p><i class="fa fa-cogs"></i> Course Overview</p>
            </div>
            <div class="OverviewContent" style="cursor: pointer">
                <p>Courses Time Lines </p>
                <p>Over dues </p>
                <span></span>
                <span></span>
                <span></span>
                <p>Next 30 days</p>

            </div>
        </div>

        <div class="card">
            <div class="courseOverview" style="cursor: pointer">
                <p><i class="fa fa-th-list"></i> Your Courses</p>
            </div>
            <div class="OverviewContent" style="cursor: pointer">
                <p>ITPM</p>
                <span></span>
                <span></span>
                <span></span>
                <p>OOP</p>
                <p>IP</p>
                <p>IWT</p>
                <P>PS</P>

            </div>
        </div>
    </div>
    <br>
    <div class="rightcolumn">
        <div class="card">
            <h4>Student HelpDesk</h4>
               <a href="#" style="text-decoration: none;">
                <div class="helpdesk" style="background-color: #F39C12;color: #fff;padding-top: 48px;padding-bottom: 48px;padding-left: 20px;cursor: pointer">
                    <p>ABC_StudentHelp@gmail.com</p>
                </div>
               </a>
                <P>Provide your feed back to us</P>
        </div>
        <div class="card" style="font-family: Arial">
            <h3><i class="fa fa-sitemap" style="font-size:20px;color:red"></i> Navigation</h3>
            <div class="navigator" style="background-color: #1565C0;padding-top: 6px;color: white">
                <h4 style="padding-left: 20px">Dashboard</h4>
                <div class="naviContent" style="background-color: #4FC3F7;padding-top: 10px;padding-left: 20px">
                    <a href="#" style="text-decoration: none;color: #17202A">Link 1</a><br><br>
                    <a href="#" style="text-decoration: none;color: #17202A">Link 2</a><br><br>
                    <a href="#" style="text-decoration: none;color: #17202A">Link 3</a><br><br>
                    <a href="#" style="text-decoration: none;color: #17202A">Link 4</a><br><br>
                    <a href="#" style="text-decoration: none;color: #17202A">Link 6</a><br><br>
                </div>
            </div>
        </div>
        <div class="card">
            <h4><i class="fa fa-file-text"></i> Private Files Folder</h4>
            <div class="fileUp" style="padding-top: 30px;padding-bottom: 30px;padding-left: 10px;background-color: #28B463;color: white">
                <p>No file Uploaded</p>
            </div>
        </div>
    </div>
</div>

<div class="footer2" style="margin-top: 10px">
    <div class="mycalender" style="margin-left: 69%">
        <div class="month">
            <ul>
                <li class="prev">&#10094;</li>
                <li class="next">&#10095;</li>
                <li>August<br><span style="font-size:14px">2017</span></li>
            </ul>
        </div>

        <ul class="weekdays">
            <li>Mo</li>
            <li>Tu</li>
            <li>We</li>
            <li>Th</li>
            <li>Fr</li>
            <li>Sa</li>
            <li>Su</li>
        </ul>

        <ul class="days">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
            <li>6</li>
            <li>7</li>
            <li>8</li>
            <li>9</li>
            <li><span class="active">10</span></li>
            <li>11</li>
            <li>12</li>
            <li>13</li>
            <li>14</li>
            <li>15</li>
            <li>16</li>
            <li>17</li>
            <li>18</li>
            <li>19</li>
            <li>20</li>
            <li>21</li>
            <li>22</li>
            <li>23</li>
            <li>24</li>
            <li>25</li>
            <li>26</li>
            <li>27</li>
            <li>28</li>
            <li>29</li>
            <li>30</li>
            <li>31</li>
        </ul>

    </div>
<div class="contactStudent">

</div>

<div class="footer">
    <p>Copyright 2018 © ABC. All Rights Reserved.</p>
</div>
</div>
<script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

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

</body>
</html>
