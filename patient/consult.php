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
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Patient Dashboard</title>
		<!-- Bootstrap -->
		<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="assets/css/material.css" rel="stylesheet">
		<link href="assets/css/default/style.css" rel="stylesheet">
		<!-- <link href="assets/css/default/style1.css" rel="stylesheet"> -->
		<link href="assets/css/default/blocks.css" rel="stylesheet">
		<link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
		<link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">
		<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
		<!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> -->
		<!--Font Awesome (added because you use icons in your prepend/append)-->
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" />

		<style>
			#searchbar{ 
				padding:15px; 
				border-radius: 10px; 
				margin-bottom: 20px;
				margin-top: 15px;
			} 

			input[type=text] { 
				width: 60%; 
				-webkit-transition: width 0.15s ease-in-out; 
				transition: width 0.15s ease-in-out; 
			} 

			/* When the input field gets focus, 
					change its width to 100% */
			input[type=text]:focus { 
				width: 80%; 
			} 

			.an{ } 

			.box{
				background:white;
				border: 1px solid;
				padding: 10px;
				box-shadow: 5px 10px 18px #888888;
                border-radius: 25px;
				margin-bottom: 20px;
				margin-right: 4%;
				margin-left: 4%}
			.box:hover{
				background:white;
				border: 1px solid;
				padding: 10px;
				box-shadow: 5px 10px 18px #000000;
                border-radius: 25px;
				margin-bottom: 20px;
				margin-right: 4%;
				margin-left: 4%
			}
		</style>
		
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
		
		<!-- 1st section start -->
		<section id="promo-1">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-8">
						
						
						<?php if ($userRow['patientMaritialStatus']=="") {
						// <!-- / notification start -->
						echo "<div class='row'>";
							echo "<div class='col-lg-12'>";
								echo "<div class='alert alert-danger alert-dismissable'>";
									echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
									echo " <i class='fa fa-info-circle'></i>  <strong>Please complete your profile.</strong>" ;
								echo "  </div>";
							echo "</div>";
							// <!-- notification end -->
							
							} else {
							}
							?>
							<!-- notification end -->
							<h2>Hi <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?>.</h2> <p class="h4">Choose your problem category</h3>
							
							<!-- input tag -->
							<input id="searchbar" onkeyup="search_animal()" type="text"
								name="search" placeholder="Search your problem category"> 
							
					</div>
				</div>
				<!-- /.row -->
			</div>
		</section>
		<!-- first section end -->

		<section id="features" class="">
<!-- 1st row -->
        <div class="jumbotron">
			<div class="container">
				<div class="row">

<!-- 1st -->
        <a href="#" data-toggle="modal" data-target="#details1" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box">
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p1.jpg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);">Acidity</p>
		</div>
		</div>
		</div></a>

<!-- 2nd -->
       <a href="#" data-toggle="modal" data-target="#details2" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box">
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p2.jpg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);" >Abdominal pain</p>
		</div>
		</div>
		</div></a>
<!-- 3rd -->
        <a href="#" data-toggle="modal" data-target="#details3" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box">
		<div class="card text-center" >
		<img class="card-img" style="border-radius: 25px;" src="assets/img/p3.jpg" alt="Card image cap" height="60%" width="60%" class="center">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);">Loose Motion</p>
		</div>
		</div>
		</div></a>
<!-- 4th -->
		<a href="#" data-toggle="modal" data-target="#details4" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box">
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p4.jpg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);">Stool Related Issue</p>
		</div>
		</div>
		</div></a>
<!-- 5th -->
<a href="#" data-toggle="modal" data-target="#details5" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box">
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p5.jpg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);" >Breathlessness</p>
		</div>
		</div>
		</div></a>
<!-- 6th -->
<a href="#" data-toggle="modal" data-target="#details6" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box" >
		<div class="card text-center" >
		<img class="card-img" style="border-radius: 25px;" src="assets/img/p6.jpg" alt="Card image cap" height="60%" width="60%" class="center">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);">Common Cold</p>
		</div>
		</div>
		</div></a>
<!-- 7th -->
<a href="#" data-toggle="modal" data-target="#details7" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box" >
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p7.jpeg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);">Fever</p>
		</div>
		</div>
		</div></a>
<!-- 8th -->
<a href="#" data-toggle="modal" data-target="#details8" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box">
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p8.jpg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);" >Ear Discomfort</p>
		</div>
		</div>
		</div></a>
<!-- 9th -->
<a href="#" data-toggle="modal" data-target="#details9" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box" >
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p9.jpg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);">Nose Bleeding</p>
		</div>
		</div>
		</div></a>

<!-- 10th -->

<a href="#" data-toggle="modal" data-target="#details10" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box">
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p10.jpg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);" >Throat discomfort</p>
		</div>
		</div>
		</div></a>
<!-- 11th -->
<a href="#" data-toggle="modal" data-target="#details11" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box" >
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p11.jpg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);">Vertigo</p>
		</div>
		</div>
		</div></a>
<!-- 12th -->
<a href="#" data-toggle="modal" data-target="#details12" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box ">
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p12.jpg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);" >Headache</p>
		</div>
		</div>
		</div></a>
<!-- 13th -->
		<a href="#" data-toggle="modal" data-target="#details13" class="an">
		<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 box">
		<div class="card text-center" >
		<img class="card-img-top" style="border-radius: 25px;" src="assets/img/p13.jpg" alt="Card image cap" height="60%" width="60%">
		<div class="card-body">
		<p class="h6 card-title" style="font-size: calc(30% + 1vw + 1vh);">Other complains</p>
		</div>
		</div>
		</div></a>
</section>


<!-- 1st container start -->
<div class="modal fade" id="details1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p1.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>Around 7.6% in the Indian population suffering from acidity.</h5>
										<h4 class="modal-title"><b>Acidity may occurs due to :</b></h4>
										<ul style="font-size:16px;"> 
										<li>having irregular meal timing</li>
										<li>Consumption of spicy food</li>
										<li>Existing medical condition</li>
										<li>Stress, lack of sleep</li>
										<li>Side effect of medicine</li>
										</ul>

										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Burning sensation in the stomach</li>
										<li>Burning Sensation in the throat and chest</li>
										<li>Regurgitation</li>
										<li>Heaviness at chest</li>
										<li>Indigestation</li>
										<li>Prolong sour test in the mouth or others...</li>
										</ul>
										<a href="category1.php" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->

<!-- 2st container start -->
<div class="modal fade" id="details2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p2.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">

					<!-- form start -->
					<div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>When you have pain in your area between chest and pelvic region that is called Abdominal pain. <br /> Abdominal pain intensity varies from cramps, a dull ache or a sharp pain. </h5>
										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Cramping pain</li>
										<li>Passing of gas</li>
										<li>Bloating of abdomen</li>
										<li>Pain that worse on moving and others...</li>
										</ul>
                                        <a href="category.php#c2" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->  
    <!-- modal container end -->

	<!-- 3st container start -->
<div class="modal fade" id="details3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p3.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">

							 <!-- form start -->
							 <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>Loose motion is frequent passage of loose watery soft stool with or without abdominal bloating & cramps.<br /> Loose motion can be caused by contaminated food stress and anxiety.</h5>

										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Watery Stool</li>
										<li>Nausea</li>
										<li>Abdominal Cramps</li>
										<li>Vomiting</li>
										<li>Fever</li>
										<li>Dehydration</li>
										<li>Blood or Mucus in the stool and others...</li>
										</ul>
                                        <a href="category.php#c3" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->

<!-- 4th container start -->
<div class="modal fade" id="details4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p4.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                       <!-- form start -->
					   <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>Stool related issues are mainly constipations, piles, fissures etc.</h5>

										<h5 class="modal-title"><b>Constipation : </b></h5>
										<p style="font-size:16px;"> 
										 Infrequent bowel movement& stool is often hard & dry.
										 </p>

										 <h5 class="modal-title"><b>Piles : </b></h5>
										<p style="font-size:16px;"> 
										Referrers to painful or painless bleeding from anal region.
										 </p>

										 <h5 class="modal-title"><b>Anal Fissure :</b></h5>
										<p style="font-size:16px;"> 
										This is break or tear in the skin of anal canal
										 </p>

										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Constipation</li>
										<li>Discomfort or pain in your abdomen</li>
										<li>Gas and abdominal bloating</li>
										<li>Bloody stool & others...</li>
										</ul>
                                        <a href="#" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->

	<!-- 5th container start -->
<div class="modal fade" id="details5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p5.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>Breathlessness can be described as the feeling of shortness of breath. In India around 2 crore people suffering from asthma &I it prevalence between 10 -15% in 5 – 11 year old children. <br /> At present 25% population suffers from allergy. 5% of them suffering from asthma. COPD prevalence in India is now 5.5% - 7.5% .</h5>
										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Asthma</li>
										<li>COPD</li>
										<li>Obesity</li>
										<li>Panic Attack or Anxiety</li>
										<li>Allergies in dust in environment</li>
										<li>Heart problem and others...</li>
										</ul>
                                        <a href="#" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->

	<!-- 6th container start -->
<div class="modal fade" id="details6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p6.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>Common cold referrers to viral infection of your upper respiratory tract frequently affecting your nose throat sinus and larynx.<br />Generally adults affects 2 -3 times annually children's affects 6- 10 times annually rate of infection in old age increase due to low immunity.</h5>
										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Cough</li>
										<li>Runny nose</li>
										<li>Sneezing</li>
										<li>Headache</li>
										<li>Fever</li>
										<li>Fatigue & others...</li>
										</ul>
                                        <a href="#" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->

	<!-- 7th container start -->
<div class="modal fade" id="details7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p7.jpeg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>When your body temperature goes above the normal range is called fever.<br />Normal body temperature is  98.6&#x2109;
								<br />Mild fever -  99&#x2109; to  100.3&#x2109;
								<br />Moderate fever -  100.4&#x2109; to 102&#x2109;
								<br />Severe fever -  102&#x2109; to 105&#x2109;
								<br />Very danger more than 103&#x2109;
								</h5>

										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Chills and shivering</li>
										<li>Feeling cold</li>
										<li>Headache</li>
										<li>Muscle ache</li>
										<li>Weakness in the whole body</li>
										<li>Flushed</li>
										<li>Sweating and others...</li>
										</ul>
                                        <a href="#" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->

	<!-- 8th container start -->
<div class="modal fade" id="details8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p8.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>Ear discomfort usually developed from ear infection or ear injury. Prevalence of ear infection in India 25-27% in children.</h5>
										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Ear pain</li>
										<li>Impaired Hearing</li>
										<li>Fluid discharge from ear</li>
										<li>Headache & others...</li>
										</ul>
                                        <a href="#" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->

	<!-- 9th container start -->
<div class="modal fade" id="details9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p9.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>Nose bleeding in children is usually caused by trauma or induced by nose pricking. In old age it is mainly due to hypertension.</h5>
										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Sudden bleeding form the nose</li>
										<li>Foreign body in the nose</li>
										<li>Burning sensation in the nose</li>
										<li>Pain in the nose</li>
										<li>Discomfort in the nose & others...</li>
										</ul>
                                        <a href="#" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->

	<!-- 10th container start -->
<div class="modal fade" id="details10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p10.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>Inflammation of nose, throat, tonsil, larynx, and upper respiratory tract. <br />Mainly caused by various bacteria & virus infection. Also allergy plays a vital role in throat discomfort. </h5>
										
										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Pharyngitis</li>
										<li>Difficulty in Swallowing</li>
										<li>Feeling of itchiness feeling</li>
										<li>Tonsillitis in throat & others...</li>
										</ul>
                                        <a href="#" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->

	<!-- 11th container start -->
<div class="modal fade" id="details11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p11.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>When you are perfectly still but you are feeling spinning sensation around you, you are suffering from vertigo.</h5>
										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Sense of world moving around you</li>
										<li>Loss of balance</li>
										<li>Nausea, Vomiting</li>
										<li>Ringing in the ears & others...</li>
										</ul>
                                        <a href="#" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->

<!-- 12th container start -->
<div class="modal fade" id="details12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p12.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
								<h5>A painful sensation in any part of the head ranging from sharp to dull that may occurs with other symptoms is called headache. Type :Stress headache, Migraine, Tension type headache, Cluster headache, concussion. Cause due to stress Anxiety, depression, missing a meal etc.</h5>
										<h4 class="modal-title"><b>Symptoms : </b></h4>
										<ul style="font-size:16px;"> 
										<li>Dizziness</li>
										<li>Pain in the eyes when looking in the bright light</li>
										<li>Fatigue</li>
										<li>Epileptic seizure</li>
										<li>Feeling lethargic & other...</li>
										</ul>
                                        <a href="#" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->


<!-- 13th container start -->
	<div class="modal fade" id="details13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="card text-center" >
						<img class="card-img-top" style="border-radius: 35px;" src="assets/img/p13.jpg" alt="Card image cap" height="60%" width="60%">
					</div></div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
										<h4 class="modal-title"><b>The complains which are not mentioned in the above case list.</b></h4>
                                        <a href="#" class="btn btn-lg btn-primary btn-block signup-btn" role="button" name="next">NEXT</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    <!-- modal container end -->


		
		<!-- footer start -->
		<div class="copyright-bar bg-black">
			<div class="container">
				<p class="pull-left small">© Horus Healthcare</p>
			</div>
		</div>
		<!-- footer end -->

		<!-- linking javscript -->
		<script src="./animals.js"></script> 
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/date/bootstrap-datepicker.js"></script>
		<script src="assets/js/moment.js"></script>
		<script src="assets/js/transition.js"></script>
		<script src="assets/js/collapse.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="assets/js/bootstrap.min.js"></script>
		
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