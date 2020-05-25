<?php
session_start();
?>

<!DOCTYPE html>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact - Mustache Enthusiast</title>
	<!-- Bootstrap 3 -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous"
    />
    <!-- Minified version of jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap validator-->
    <script
      type="text/javascript"
      src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"
    ></script>
    <!-- External Stylesheet -->
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen and (max-width : 568px)">
</head>
<body>
		<div id="header">
				<a href="index.php" class="logo">
					<img src="images/logo.jpg" alt="">
				</a>
				<ul id="navigation">
					<li>
						<a href="index.php">home</a>
					</li>
					<li>
						<a href="about.php">about</a>
					</li>
					<li>
						<a href="gallery.php">gallery</a>
					</li>
					<li>
						<a href="blog.php">blog</a>
					</li>
					<li class="selected">
						<a href="lab1.php">contact</a>
					</li>
				</ul>
        </div>
        <?php
			// $date = "";
			$fn = "";
			// $mn = "";
			$ln = "";
			$gender = "";
            $department = "";
            $status = "";
			// $date = $_SESSION['date'];
			$fn = $_SESSION['first_name'];
			// $mn = $_SESSION['middleName'];
			$ln = $_SESSION['last_name'];
            $em = $_SESSION['email'];
            $confirm_em = $_SESSION['confirm_email'];
            $pass = $_SESSION['password'];
            $confirm_pass = $_SESSION['confirm_password'];

			$gender = $_SESSION['gender'];
            $department = $_SESSION['department'];
            $status = $_SESSION['status'];

        ?>
        
	<div class="container">
      <form class="well form-horizontal" action="" method="" id="contact_form">	
	  	<h1>User Registration Confirmation</h1>
        <div class="form-group">
        	<label class="col-md-4 control-label">
			<h4>
			First Name: <?php print $fn; ?> <br />
			Last Name: <?php print $ln; ?> <br />
			Email:	<?php print $em; ?> <br />
            Confirm Email:	<?php print $confirm_em; ?> <br />
            Password:	<?php print $pass; ?> <br />
            Confirm Password:	<?php print $confirm_pass; ?> <br />
            Gender: <?php print $gender; ?> <br />
            Status: <?php print $status; ?> <br />
			Department: <?php print $department; ?> <br />
			</h4>
			</label>
        </div>
      </form>
    </div>

</body>
</html>