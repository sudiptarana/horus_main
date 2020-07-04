<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if(!isset($_SESSION['patientSession']))
{
header("Location: ../index.php");
}

$usersession = $_SESSION['patientSession'];


$res=mysqli_query($con,"SELECT * FROM patient WHERE icPatient=".$usersession);

if ($res===false) {
	echo mysql_error();
} 

$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Patient Dashboard</title>
    <!-- Bootstrap -->
    
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bd-wizard.css">
		<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="assets/css/material.css" rel="stylesheet">
		<link href="assets/css/default/style.css" rel="stylesheet">
		<!-- <link href="assets/css/default/style1.css" rel="stylesheet"> -->
		<link href="assets/css/default/blocks.css" rel="stylesheet">
		<link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
		<link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">
		<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<!--Font Awesome (added because you use icons in your prepend/append)-->
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" />
		
	</head>
	<body>
		
		<!-- navigation -->
		<nav class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header" style="padding-bottom:15px">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="patient.php"><img alt="Brand" src="assets/img/logo1.png" height="40px"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<ul class="nav navbar-nav">
							<li><a href="patient.php">Home</a></li>
							<!-- <li><a href="profile.php?patientId=<?php echo $userRow['icPatient']; ?>" >Profile</a></li> -->
							<li><a href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>">Appointment</a></li>
						</ul>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="profile.php?patientId=<?php echo $userRow['icPatient']; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
								</li>
								<li>
									<a href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>"><i class="glyphicon glyphicon-file"></i> Appointment</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- navigation -->
    <main class="d-flex align-items-center">
    <div class="container">
        <div id="wizard">
          
        <h3>Step 1 Title</h3>
          <section>
            <h2 class="section-heading">What is your complaint ?</h2>
            <div class="form-group">
              <label for="text1" class="sr-only">What is your complaint?</label>
              <input type="text" name="text1" id="text1" class="form-control" placeholder="Start typing your complaint here...">
            </div>
          </section>

          <h3>Step 2 Title</h3>
          <section>
            <h2 class="section-heading">Since when you are suffering ?</h2>
            <div class="form-group">
              <label for="text2" class="sr-only">What is your complaint?</label>
              <input type="text" name="text2" id="text2" class="form-control" placeholder="Write here...">
            </div>
          </section>

         
          
          <h3>Step 3 Title</h3>
          <section>
          <h2 class="section-heading">Does burning sensation increase or decrease with meal?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio1" checked>&nbsp; Increase</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="radio1" checked>&nbsp; Decrease</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="radio1" checked>&nbsp; unchanged</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 4 Title</h3>
          <section>
          <h2 class="section-heading">Do you have any of these associated symptoms?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio2" checked>&nbsp; Headache</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="radio2" checked>&nbsp; Nausea</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="radio2" checked>&nbsp; Burning  sensation in throat</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="radio2" checked>&nbsp; None of the above</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="radio2" checked>&nbsp; Others</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 5 Title</h3>
          <section>
          <h2 class="section-heading">Do you usually suffer from Such problem?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio3" checked>&nbsp; Sometime</h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="radio3" checked>&nbsp; Always</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 6 Title</h3>
          <section>
          <h2 class="section-heading">If you eat something outside recently?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Yes <input type="text" name="text2" id="text2" class="form-control" placeholder="What..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; No</h4> </label>
                </div>
            </div>
          </section>



          <h3>Step 7 Title</h3>
          <section>
          <h2 class="section-heading">Do you usually take spicy food?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Yes </h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 8 Title</h3>
          <section>
          <h2 class="section-heading">Any history of taking alcohol or tobacco recently?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Yes <input type="text" name="text2" id="text2" class="form-control" placeholder="What..."> &nbsp; &nbsp; <input type="text" name="text2" id="text2" class="form-control" placeholder="Duration..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 9 Title</h3>
          <section>
          <h2 class="section-heading">Do you have any chest pain?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Yes </h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 10 Title</h3>
          <section>
          <h2 class="section-heading">Do you have any of these symptoms?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Frequently <input type="text" name="text2" id="text2" class="form-control" placeholder="What..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Always</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 11 Title</h3>
          <section>
          <h2 class="section-heading">Do you have any of these symptoms?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Frequently <input type="text" name="text2" id="text2" class="form-control" placeholder="What..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Always</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 12 Title</h3>
          <section>
          <h2 class="section-heading">History of Any long term or chronic illness and medicine taken?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Yes <input type="text" name="text2" id="text2" class="form-control" placeholder="What..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 13 Title</h3>
          <section>
          <h2 class="section-heading">If recently taking any medicine for this illness?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Yes <input type="text" name="text2" id="text2" class="form-control" placeholder="mention..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 14 Title</h3>
          <section>
          <h2 class="section-heading">Can our doctor call you on the registered number?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; Yes <input type="text" name="text2" id="text2" class="form-control" placeholder="Alternate no..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="radio4" checked>&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step final Title</h3>
          <section>
              <h5 class="bd-wizard-step-title">review</h5>
              <h2 class="section-heading mb-5">Review your Details and Submit</h2>
              <h6 class="font-weight-bold">Select business type</h6>
              <p class="mb-4" id="business-type">Branding</p>
              <h6 class="font-weight-bold">Enter your Account Details</h6>
              <p class="mb-4"><span id="enteredFirstName">Cha</span> <span id="enteredLastName">Ji-Hun C</span> <br>
                  Phone: <span id="enteredPhoneNumber">+230-582-6609</span> <br>
                  Email: <span id="enteredEmailAddress">willms_abby@gmail.com</span></p>

          </section>
        </div>
    </div>
  </main>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/date/bootstrap-datepicker.js"></script>
		<script src="assets/js/moment.js"></script>
		<script src="assets/js/transition.js"></script>
		<script src="assets/js/collapse.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.steps.min.js"></script>
  <script src="assets/js/bd-wizard.js"></script>
		<!-- date start -->
		<script>
		$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
		format: 'yyyy-mm-dd',
		container: container,
		todayHighlight: true,
		autoclose: true,
		})
		})
		</script>
		<!-- date end -->
		
		
	</body>
</html>