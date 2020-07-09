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

$id = mysqli_real_escape_string($con,$_POST['icPatient']);   //needs to implement in html
$category = mysqli_real_escape_string($con,$_POST['category']);   //its the category of consultation,like Headache, Coughing, etc
$r = mysqli_real_escape_string($con,$_POST['response']);   

$query = " INSERT INTO patient (  icPatient, category, response  )
    VALUES ( '$id','$category',$r') ";
    //inserting into the table in JSON type column named response

    //here response's keys are the response to the questions 
    $result = mysqli_query($con, $query);
echo "$r";

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

<main class="d-flex align-items-center">
<div class="container">
<div id="wizard">
<form id="test" action="#" method="post">
<h3>Step 1 Title</h3>
          <section>
            <h2 class="section-heading">What is your complaint ?</h2>
            <div class="form-group">
              <label for="text1" class="sr-only">What is your complaint?</label>
              <input type="text" name="text" id="text1" class="form-control" placeholder="Start typing your complaint here...">
            </div>
          </section>

          <h3>Step 2 Title</h3>
          <section>
            <h2 class="section-heading">Since when you are suffering ?</h2>
            <div class="form-group">
              <label for="text2" class="sr-only">What is your complaint?</label>
              <input type="text" name="text" id="text2" class="form-control" placeholder="Write here...">
            </div>
          </section>

         
          
          <h3>Step 3 Title</h3>
          <section>
          <h2 class="section-heading">Does burning sensation increase or decrease with meal?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Increase" >&nbsp; Increase</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="Decrease"> &nbsp; Decrease</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="unchanged" >&nbsp; unchanged</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 4 Title</h3>
          <section>
          <h2 class="section-heading">Do you have any of these associated symptoms?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Headache" >&nbsp; Headache</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="Nausea" >&nbsp; Nausea</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="Burning  sensation in throat" >&nbsp; Burning  sensation in throat</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="None of the above" >&nbsp; None of the above</h4> </label>
                </div>
                <div class="radio">
                <label><h4><input type="radio" name="Others" >&nbsp; Others</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 5 Title</h3>
          <section>
          <h2 class="section-heading">Do you usually suffer from Such problem?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Sometime" >&nbsp; Sometime</h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="Always" >&nbsp; Always</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 6 Title</h3>
          <section>
          <h2 class="section-heading">If you eat something outside recently?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Yes" >&nbsp; Yes <input type="text" name="text2" id="text2" class="form-control" placeholder="What..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="No" >&nbsp; No</h4> </label>
                </div>
            </div>
          </section>



          <h3>Step 7 Title</h3>
          <section>
          <h2 class="section-heading">Do you usually take spicy food?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Yes" >&nbsp; Yes </h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="No" >&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 8 Title</h3>
          <section>
          <h2 class="section-heading">Any history of taking alcohol or tobacco recently?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Yes" >&nbsp; Yes <input type="text" name="text2" id="text2" class="form-control" placeholder="What..."> &nbsp; &nbsp; <input type="text" name="text2" id="text2" class="form-control" placeholder="Duration..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="No" >&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 9 Title</h3>
          <section>
          <h2 class="section-heading">Do you have any chest pain?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Yes" >&nbsp; Yes </h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="No" >&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 10 Title</h3>
          <section>
          <h2 class="section-heading">Do you have any of these symptoms?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Frequently" >&nbsp; Frequently <input type="text" name="text2" id="text2" class="form-control" placeholder="What..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="Always" >&nbsp; Always</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 11 Title</h3>
          <section>
          <h2 class="section-heading">Do you have any of these symptoms?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Frequently" >&nbsp; Frequently <input type="text" name="text2" id="text2" class="form-control" placeholder="What..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="Always" >&nbsp; Always</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 12 Title</h3>
          <section>
          <h2 class="section-heading">History of Any long term or chronic illness and medicine taken?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Yes" >&nbsp; Yes <input type="text" name="text2" id="text2" class="form-control" placeholder="What..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="No" >&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 13 Title</h3>
          <section>
          <h2 class="section-heading">If recently taking any medicine for this illness?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Yes" >&nbsp; Yes <input type="text" name="text2" id="text2" class="form-control" placeholder="mention..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="No" >&nbsp; No</h4> </label>
                </div>
            </div>
          </section>

          <h3>Step 14 Title</h3>
          <section>
          <h2 class="section-heading">Can our doctor call you on the registered number?</h2>
            <div class="purpose-radios-wrapper">
                <div class="radio">
                <label><h4><input type="radio" name="Yes" >&nbsp; Yes <input type="text" name="text2" id="text2" class="form-control" placeholder="Alternate no..."></h4> </label>
                </div>

                <div class="radio">
                <label><h4><input type="radio" name="No" >&nbsp; No</h4> </label>
                </div>
            </div>
          </section>
    <p>
        <input type="submit" value="Send" class="btn btn-primary btn-block" />
    </p>





</form> 

</div>
    </div>
  </main>

<pre id="output">
</pre>


<script type="text/javascript">
    //HERE IS THE MAIN CODE FOR CONVERSION OF INPUTS INTO JSON OUTPUT
    (function() {
    function toJSONString( form ) {
        var questions = ['What is your complaint?',"Since when you are suffering?",'If you eat something uncooked or spicy?',
'History of any recent medicine taken?','If Diarrhea associated with the following?','Do you have vomiting?',
  'How many time loose stool passed?','Any other problem or not?','Do you have any of these symptoms?','History of Any long term or chronic illness and medicine taken?',
'If recently taking any medicine for this illness?','Can our doctor call you on the registered number?'];
        var obj = {};
        var obj3 = {};
        var obj2 = {"icPatient":"12345",//fetch icPatient here
                    "category":"Whatever"} 
                    //fetch category of consult here
        var elements = form.querySelectorAll( "input, select, textarea" );
        
        for( var i = 0; i < elements.length; i++ ) {
            var element = elements[i];
            var name = element.name;
            var value = element.value;

            if( name == "text")
                obj[ value ] = questions[i];
            else
                obj[ name ] = questions[i];
        }
        obj2['response']=obj;
        var response = JSON.stringify( obj2);
        //$.post(response); //uncomment for posting to server as JSON
        return response;    //will show json output on screen
    }

    document.addEventListener( "DOMContentLoaded", function() {
        var form = document.getElementById( "test" );
        var output = document.getElementById( "output" );
        form.addEventListener( "submit", function( e ) {
            e.preventDefault();
            var json = toJSONString( this );
            output.innerHTML = json;

        }, false);

    });

})();
</script>

</body>
</html>