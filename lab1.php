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
	<!-- <link rel="stylesheet" href="style.css" type="text/css" /> -->
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
			$fn = "";
			$ln = "";
			$em = "";
      		$msg = "";
      		$msg2 = "";
      		$confirm_em = "";
      		$pass = "";
      		$confirm_pass = "";
      		$gender = "";
			$department = "";
			$status ="";
			  


			$fnre="*";
			$lnre="*";
      		$emre="*";
      		$confirm_emre="*";

      		$passre="*";
      		$confirm_passre="*";

			$male_checked = "";
			$female_checked = "";

			$student_checked = "";
			$faculty_checked = "";
			$staff_checked = "";
			
			
			

			if (isset($_POST["enter"])) { //check if this page is requested after Submit button is clicked
				
			//take the information submitted and send to the data file
				
			// First name and Last name
			$fn = trim($_POST['first_name']); 
			$ln = trim($_POST['last_name']);

				// Email and confirm email
			if (!filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL)) 
				$emre = '<span style="color:red">*</span>';
        	else $em = trim($_POST['email']);
        
        	if (!filter_input(INPUT_POST, 'confirm_email',FILTER_VALIDATE_EMAIL)) 
				$confirm_emre = '<span style="color:red">*</span>';
        	else $confirm_em = trim($_POST['confirm_email']);

        	// Validate emails
        	if (trim($_POST['email']) != trim($_POST['confirm_email']))
          		$confirm_emre = '<span style="color:red">*</span>';

        	// Password and confirm password
        	$pass = trim($_POST['password']); 
        	$confirm_pass = trim($_POST['confirm_password']);

        	// Validate passwords
        	if (trim($_POST['password']) != trim($_POST['confirm_password']))
          		$confirm_passre = '<span style="color:red">*</span>';
        
        	// Gender
			if (isset($_POST['gender']))
				$gender = trim($_POST['gender']);
		
			if ($gender=="Male") {
				$male_checked="checked";
				$female_checked="";
			}
			else {
				$male_checked="";
				$female_checked="checked";
			}
			
			// Status
			if (isset($_POST['status']))
				$status = trim($_POST['status']);

			if ($status=="Student") {
				$student_checked="checked";
				$faculty_checked="";
				$staff_checked="";
			}
			else if ($status=="Faculty") {
				$student_checked="";
				$faculty_checked="checked";
				$staff_checked="";
        	} else {
				$student_checked="";
				$faculty_checked="";
				$staff_checked="checked";
			}
        
        	// Department
			$department = trim($_POST['department']);
        
        	// Make the star red if value is empty for any of the required fields
			if ($fn== "")
         	$fnre = "<span style=\"color:red\">*</span>";
				
			if ($ln== "")
          		$lnre = '<span style="color:red">*</span>';

        	if ($em== "")
          		$emre = '<span style="color:red">*</span>';
          
        	if ($confirm_em== "")
				$confirm_emre = '<span style="color:red">*</span>';
          
        	if ($pass== "")
          		$passre = '<span style="color:red">*</span>';
          
        	if ($confirm_pass== "")
          		$confirm_passre = '<span style="color:red">*</span>';
          
        	// Validate checkbox is checked
        	if( empty($_POST["terms"]) )
        		$msg2 = "<br /><span style=\"color:red\">Please agree to Terms & Policies</span><br />";
				

			if (($fnre!="*") || ($lnre != "*") || ($emre != "*") || ($confirm_emre != "*") || ($passre != "*") || ($confirm_passre != "*"))				
			{	
				$msg = "<br /><span style=\"color:red\">Please enter valid data.</span><br />";
			}
			else {					
				//direct to another file to process using query strings
				$_SESSION['first_name']= $fn;
          		$_SESSION['last_name']= $ln;
          		$_SESSION['email']= $em;
          		$_SESSION['confirm_email']= $confirm_em;
          		$_SESSION['password']= $pass;
          		$_SESSION['confirm_password']= $confirm_pass;
				$_SESSION['gender']= $gender;
				$_SESSION['department']= $department;
				$_SESSION['status']= $status;
					
				Header ("Location:lab1info.php?");
			}
		}
		?>


    <div class="container">
      <form class="well form-horizontal" action="lab1.php" method="post" id="contact_form">
        <fieldset>
          <!-- Form Name -->

          <?php
            print $msg;
          ?>
          
          <?php
            print $msg2;
			    ?>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label">First Name <?php print $fnre; ?> </label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"
                  ><i class="glyphicon glyphicon-user"></i
                ></span>
                <input
                  value="<?php print $fn; ?>"
                  name="first_name"
                  placeholder="First Name"
                  class="form-control"
                  type="text"
                  id="first_name"
                />
              </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label">Last Name <?php print $lnre; ?> </label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input
                  value="<?php print $ln; ?>"
                  name="last_name"
                  placeholder="Last Name"
                  class="form-control"
                  type="text"
                  id="last_name"
                />
              </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label">E-Mail <?php print $emre; ?></label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"
                  ><i class="glyphicon glyphicon-envelope"></i
                ></span>
                <input
                  value="<?php print $em; ?>" 
                  name="email"
                  placeholder="E-Mail Address"
                  class="form-control"
                  type="text"
                  id="email"
                />
              </div>
            </div>
          </div>
          <!-- Text input I created-->
          <div class="form-group">
                <label class="col-md-4 control-label">Confirm E-Mail <?php print $confirm_emre; ?> </label>
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input
                      value="<?php print $confirm_em; ?>" 
                      name="confirm_email"
                      placeholder="Confirm E-Mail Address"
                      class="form-control"
                      type="text"
                      id="confirm_email"
                    />
                  </div>
                </div>
            </div>

            <!-- Text input-->
          <div class="form-group">
                <label class="col-md-4 control-label">Password <?php print $passre; ?> </label>
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"
                      ><i class="glyphicon glyphicon-lock"></i
                    ></span>
                    <input
                      value="<?php print $pass; ?>" 
                      name="password"
                      placeholder="Password"
                      class="form-control"
                      type="text"
                      id="password"
                    />
                  </div>
                </div>
              </div>
              <!-- Text input I created-->
              <div class="form-group">
                    <label class="col-md-4 control-label">Confirm Password <?php print $confirm_passre; ?> </label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input
                          value="<?php print $confirm_pass; ?>" 
                          name="confirm_password"
                          placeholder="Confirm Password"
                          class="form-control"
                          type="text"
                          id="confirm_password"
                        />
                      </div>
                    </div>
				</div>
				
          <!-- radio checks -->
          <div class="form-group">
            <label class="col-md-4 control-label">Selct your gender: </label>
            <div class="col-md-4">
              <div class="radio">
                <label>
                  <input type="radio" name="gender" value="Male" checked <?php print $male_checked; ?> /> Male
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="gender" value="Female" <?php print $female_checked; ?>  /> Female
                </label>
              </div>
            </div>
          </div>
          

          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">Department: </label>
            <div class="col-md-4 selectContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="department" class="form-control selectpicker">
                  	<option value = "Computer Engineering" selected>Computer Engineering</option>
  					<option value = "Biomedical Engineering">Biomedical Engineering</option>
  				    <option value = "Finance and Administration">Finance and Administration</option>
  				    <option value = "Geology">Geology</option>
					<option value = "Liberal Arts">Liberal Arts</option>
					<option value = "Mathematical Sciences">Mathematical Sciences</option>
  				    <option value = "Medicine">Medicine</option>
  				    <option value = "Neurology">Neurology</option>
  				    <option value = "Physics">Physics</option>
                </select>
              </div>
            </div>
		  </div>
		  

		  <!-- radio checks for status-->
          <div class="form-group">
            <label class="col-md-4 control-label">Status: </label>
            <div class="col-md-4">
              <div class="radio">
                <label>
                  <input type="radio" name="status" value="Student" checked <?php print $student_checked; ?> /> Student
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="status" value="Faculty" <?php print $faculty_checked; ?>  /> Faculty
                </label>
			  </div>
			  <div class="radio">
                <label>
                  <input type="radio" name="status" value="Staff" <?php print $staff_checked; ?>  /> Staff
                </label>
              </div>
            </div>
          </div>

          <!-- Terms and Policies -->
          <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <input type="checkbox" name="terms" id="terms"> Agree to Terms & Policies
                <br><br>
              </div>
            </div>
          </div>

          <!-- Success message -->
          <!-- <div class="alert alert-success" role="alert" id="success_message">
            Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for
            contacting us, we will get back to you shortly.
          </div> -->

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
              <button name="enter" type="submit" class="btn btn-success">Submit </button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>

    <!-- <script src="main.js"></script> -->
  </body>
</html>








