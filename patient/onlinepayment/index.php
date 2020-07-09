<?php
    require_once('config.php');
    require_once('database.php');
    
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Razorpay Integartion</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
        <style>
            .razorpay-payment-button{
                 background:#6c5ce7;
                 color:whitesmoke;
                 font-size:0.8rem;
                 text-transform:uppercase;
                 letter-spacing:1;
                 display:block;
                 width:15vw;
                 height:8vh;
                 border:none;
                 padding:0.3rem 0.3rem;
            }
            .img_size{
                 margin:0 auto;
                 width:180px;
                 height:180px;
            }
            figcaption{
                 text-align:center;
                 letter-spacing:1;
            }
            .card-body{
                 font-size:0.8rem;
                 font-weight:bold;
            }
        </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
     <div class="container" style="margin:0 auto;">

<div class="jumbotron jumbotron-fluid text-center shadow-lg p-3 mb-5 rounded">
<div class="container">

<h2>Complete Payment</h2>
<br/>

         <div class="row">
               <div class='col-sm-12 col-md-12 col-xs-12'>

            <div class="jumbotron jumbotron-fluid border border-primary shadow-lg p-3 mb-5 rounded" 
            style="background-color:#b3e0ff; border-radius: 20px;  padding-top: 1rem !important;padding-bottom: 1rem !important;">
                    <p style="color:#004d80;"><i class="fa fa-check-circle"></i> &nbsp; <b>Payment for this Consultation</b></p>
            </div>


<div class="card shadow-lg p-3 mb-5 rounded">

<div class="card-footer" style="color:#7575a3;">
        <span class="fa-stack fa-lg">
        <i class="fa fa-certificate fa-stack-2x"></i>
        <i class="fa fa-percent fa-stack-1x fa-inverse"></i>
        </span>Apply Coupon &nbsp; &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></div>

  <div class="card-body">
  <div class="shadow p-3 mb-5 bg-white rounded">
  <div class="text-left">

  
  <h3 style="color:#004d80;">invoice</h3>

  <div class="container">
  <div class="row justify-content-md-center">
  <div class="col col-lg-3 col-sm-6 col-md-6 col-xs-6">
  <h5> Doctor's Fee </h5>
  </div>
  <div class="col col-lg-3 col-sm-6 col-md-6 col-xs-6">
  <div class="text-right"><h5><del class="price-old">&#8377;200</del><span class="price-new"> &#8377;99 </span></h5></div>
  </div>
  </div></div>
  <br/>
  <div class="card-footer text-center border border-success" style="color: #00cc44; background-color: #ccffcc;"><b>You have saved &#8377;101 for this Consultation</b></div>
 
 <br/>
  <div class="container">
  <div class="row justify-content-md-center">
  <div class="col col-lg-3 col-sm-6 col-md-6 col-xs-6">
  <h5 style="color:#004d80;">To pay</h5>
  </div>
  <div class="col col-lg-3 col-sm-6 col-md-6 col-xs-6">
  <div class="text-right"><h5> <b>&#8377;99 </b></span></h5></div>
  </div>
  </div></div>
 
 
  </div>
  </div>
  
</div>
 <span style=" padding-left:2rem; padding-right:2rem;"><a href="javascript:void(0)" class="btn btn-primary btn-block shadow-lg p-3 mb-5 rounded float-right buy_now" data-amount="99" data-id="1">Pay NoW</a> </span>
</div>
</div>

        </div>
         </div>

       </div>
       </div>

                    <br/>
                    <div class="row" style="margin:0.4rem 0;">
                        <div class="col-sm-12 col-md-12 col-xs-12" >
                            <a href="table.php" target="_blank" class="btn btn-primary" style="float:right;">SHOW PAYMENT</a>
                        </div>
                    </div>

</div>
        
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  
  $('body').on('click', '.buy_now', function(e){
    var totalAmount = $(this).attr("data-amount");
    var product_id =  $(this).attr("data-id");
    var contact_number = $("#contact").attr("value");
    var options = {
    "key": "rzp_test_1dP9K0wAdtcR0z",
    "amount": totalAmount * 100, // 2000 paise = INR 20
    "name": "E-Commerce",
    "description": "Payment Cart",
    "currency":"INR",
    "image": "./img/eletter.png",
    "handler": function (response){
            $.ajax({
            url: 'razorPaySuccess.php',
            type: 'post',
            data: {
                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
            }, 
            success: function (msg) {
               
            //    window.location.href = 'thankyou.php';
            }
        });
      
    },
 
    "theme": {
        "color": "#528FF0"
    }
  };
  var rzp1 = new Razorpay(options);
   rzp1.open();
  e.preventDefault();
  });
 
</script>
    </body>
</html>