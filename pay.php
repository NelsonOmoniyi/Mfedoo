
<?php

// var_dump($_REQUEST);
$price = $_REQUEST['price'];
$item = $_REQUEST['item'];
// $tx_ref = hash('sha512',"Benue State".date('Ymd').'TK_y95k6U4LO2ot+bcenEkq');
// echo "This are the info's {$price} - {$item}";
?>
<!DOCTYPE html>
<html lang="en">
	
<!--  01:03 GMT -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mfedoo - Real Estate & Automobiles</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="assets/css/owl.carousel.css" rel="stylesheet" type="text/css">
		<link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css">
		<link href="assets/css/ionicons.css" rel="stylesheet" type="text/css">
		<link href="assets/css/flaticon.css" rel="stylesheet" type="text/css">
		<link href="assets/css/simple-line-icons.css" rel="stylesheet" type="text/css">
		<link href="assets/css/animate.css" type="text/css" rel="stylesheet">
		<link href="assets/css/jquery-ui.min.css" type="text/css" rel="stylesheet">
		<!--Main Slider-->
		<link href="assets/css/settings.css" type="text/css" rel="stylesheet" media="screen">
		<link href="assets/css/layers.css" type="text/css" rel="stylesheet" media="screen">

		<link href="assets/css/style.css" type="text/css" rel="stylesheet">
		<link href="assets/css/index.css" type="text/css" rel="stylesheet">
		<link href="assets/css/header.css" type="text/css" rel="stylesheet">
		<link href="assets/css/footer.css" type="text/css" rel="stylesheet">
		<link href="assets/css/theme-color/default.css" rel="stylesheet" type="text/css" id="theme-color" />

</head>
	<body>
		<!--loader-->
		<div id="preloader">
			<div class="sk-circle">
				<div class="sk-circle1 sk-child"></div>
				<div class="sk-circle2 sk-child"></div>
				<div class="sk-circle3 sk-child"></div>
				<div class="sk-circle4 sk-child"></div>
				<div class="sk-circle5 sk-child"></div>
				<div class="sk-circle6 sk-child"></div>
				<div class="sk-circle7 sk-child"></div>
				<div class="sk-circle8 sk-child"></div>
				<div class="sk-circle9 sk-child"></div>
				<div class="sk-circle10 sk-child"></div>
				<div class="sk-circle11 sk-child"></div>
				<div class="sk-circle12 sk-child"></div>
			</div>
		</div>
		<!--loader-->

		<!-- header Start -->
		<header id="header" class="header">

			<div class="nav-wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="logo">
								<a href="index.php"><img src="assets/images/banner/mfedoo-logo.jpg" alt="" style="max-width: 35%;"></a>
							</div>
							<!-- Phone Menu button -->
							<button id="menu" class="menu hidden-md-up" ></button>
						</div>
						<div class="col-md-9 nav-bg d-flex align-items-center">
							<nav class="navigation">
								<ul>
									<li>
										<a href="index.php">Home</a><i class="ion-ios-plus-empty hidden-md-up"></i>
									</li>

									<li>
										<a href="about.php">About us</a><i class="ion-ios-plus-empty hidden-md-up"></i>
									</li>
									<li>
										<a href="services.php">Services</a><i class="ion-ios-plus-empty hidden-md-up"></i>
									</li>
									<li>
										<a href="project.php">Project</a><i class="ion-ios-plus-empty hidden-md-up"></i>
									</li>
									<li>
										<a href="training.php">Training</a><i class="ion-ios-plus-empty hidden-md-up"></i>
									</li>
									<li>
										<a href="javascript:avoid(0);">pages</a><i class="ion-ios-plus-empty hidden-md-up"></i>
										<ul class="sub-nav">

											<li>
												<a href="faq.php">Faq</a>
											</li>
											<li>
										<a href="blog.php">News</a><i class="ion-ios-plus-empty hidden-md-up"></i>
											</li>
											<li>
												<a href="server/login.html">login</a>
											</li>
											<li>
												<a href="testimonial.php">Testimonials</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="./server/contact.php">Contact Us</a><i class="ion-ios-plus-empty hidden-md-up"></i>
									</li>

								</ul>

							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--Header End-->
        <!-- Intro Section -->
        <section class="inner-intro bg-img light-color overlay-before parallax-background">
            <div class="container">
            <div class="row title">
                <div class="title_row">
                    <h1 data-title="Checkouts1"><span>Payment Form</span></h1>
                    <div class="page-breadcrumb">
                        <a>Home</a>/ <span>P-Form-1</span>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- Intro Section End-->
        <section class="padding pt-xs-40 align-items-center" style="margin:0 auto;">
            <div class="container center ">
                <form class="form" id="form1" onsubmit="return false">
                    <input type="hidden" name="op" value="Payment.process_payment">
                    <div class="row">
                        <div class="col-md-6 col-lg-6" style="margin:0 auto;" >
                            <div class="form-field">
                                <input class="form-full" id="name" type="text" name="fullname" placeholder="Your Name" required style="border-radius: 5px; border: 1px solid rgb(255, 165, 0);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6" style="margin:0 auto;">
                            <div class="form-field">
                                <input class=" form-full" id="email" type="email" name="email" placeholder="Email Address" required style="border-radius: 5px; border: 1px solid rgb(255, 165, 0);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6" style="margin:0 auto;">
                            <div class="form-field">
                                <input class="form-full" id="phone" type="text" name="phone" placeholder="Phone Number" required style="border-radius: 5px; border: 1px solid rgb(255, 165, 0);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6" style="margin:0 auto;">
                            <div class="form-field">
                                <input class="form-full" id="item" type="text" name="item" value="<?php echo $item ?>" readonly style="border-radius: 5px; border: 1px solid rgb(255, 165, 0);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6" style="margin:0 auto;">
                            <div class="form-field">
                                <input class="form-full" id="price" type="text" name="price" value="<?php echo $price ?>" readonly style="border-radius: 5px; border: 1px solid rgb(255, 165, 0);">
                            </div>
                        </div>
                    </div>
					<div id="server_mssg">

					</div>
                    <div class="row">
                        <div class="col-md-2 col-lg-2 d-flex" style="margin:0 auto;">
                            <button class="bnt btn-text sent-but mt-xs-30" id="pay">
                                Send
                            </button>
                        </div>
                    </div>  
                </form>
            </div>
        </section>


<!-- FOOTER -->
	<footer class="footer pt-80 pt-xs-60">
			<div class="container">
				<!--Footer Info -->
				<div class="row footer-info mb-60">
					<div class="col-lg-6 col-md-8 col-xs-12 mb-sm-30">
						<h4 class="mb-30">CONTACT Us</h4>
						<address>
							<i class="ion-ios-location fa-icons"></i> 69 Road, Gwarinpa, Abuja.
						</address>
						<ul class="link-small">
							<li>
								<a href="mailto:business@support.com"><i class="ion-ios-email fa-icons"></i>mfedoorealestateandautomobiles@gmail.com</a>
							</li>
							<li>
								<a><i class="ion-ios-telephone fa-icons"></i>+234 810 391 0593</a>
							</li>
						</ul>
						<div class="icons-hover-black">
							<a href="javascript:avoid(0);"> <i class="fa fa-facebook"></i> </a><a href="javascript:avoid(0);"> <i class="fa fa-twitter"></i> </a><a href="javascript:avoid(0);"> <i class="fa fa-youtube"></i> </a><a href="javascript:avoid(0);"> <i class="fa fa-dribbble"></i> </a><a href="javascript:avoid(0);"> <i class="fa fa-linkedin"></i> </a>
						</div>
					</div>
					<div class="col-lg-6 col-md-4 col-xs-12 mb-sm-30">
						<h4 class="mb-30">Links</h4>
						<ul class="link blog-link">
							<li>
								<a href="faq.php"><i class="fa fa-angle-double-right"></i> Frequently Asked Questions</a>
							</li>
							<li>
								<a href="terms.php"><i class="fa fa-angle-double-right"></i> Terms &amp; condition</a>
							</li>
							<li>
								<a href="testimonial.php"><i class="fa fa-angle-double-right"></i> Testimonials</a>
							</li>
							<li>
								<a href="contact.php"><i class="fa fa-angle-double-right"></i> Contact Us</a>
							</li>
							<li>
								<a href="services.php"><i class="fa fa-angle-double-right"></i> Services</a>
							</li>
							<li>
								<a href="about.php"><i class="fa fa-angle-double-right"></i> About Us</a>
							</li>							
							<li>
								<a href="server/login.html"><i class="fa fa-angle-double-right"></i> Login</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- End Footer Info -->
			</div>
			<!-- Copyright Bar -->
			<div class="copyright">
				<div class="container">
					<p class="">Powered BY:
						<a href="https://omoniyi.netlify.app/" target="_blank">Nelson Omoniyi</a>
					</p>
				</div>
			</div>
			<!-- End Copyright Bar -->
		</footer>
		<!-- END FOOTER -->

		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="assets/js/tether.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/owl.carousel.js"></script>
		<script type="text/javascript" src="assets/js/wow.min.js"></script>
        <!-- fancybox Js -->
		<script src="assets/js/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>
		<script src="assets/js/jquery.fancybox.pack.js" type="text/javascript"></script>
		<!-- carousel Js -->
		<script src="assets/js/owl.carousel.js" type="text/javascript"></script>
		<!-- masonry,isotope Effect Js -->
		<script src="assets/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
		<script src="assets/js/isotope.pkgd.min.js" type="text/javascript"></script>
		<script src="assets/js/masonry.pkgd.min.js" type="text/javascript"></script>
		<script src="assets/js/jquery.appear.js" type="text/javascript"></script>
		<!-- revolution Js -->
		<script type="text/javascript" src="assets/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="assets/extensions/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="assets/extensions/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="assets/extensions/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="assets/extensions/revolution.extension.parallax.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.revolution.js"></script>
		<!-- Mail Function Js -->
		<script src="assets/js/validation.js" type="text/javascript"></script>
		<!-- Compiled and minified JavaScript -->
		<script src="assets/js/jquery.appear.js" type="text/javascript"></script>
		<script src="assets/js/custom.js" type="text/javascript"></script>
        <script src="assets/js/jquery.easing.js" type="text/javascript"></script>

     <script>
      $("#pay").click(function() {
        // alert("Hello");
        // console.log("Nelson");
        $("#pay").text("Loading......");
		$("#pay").prop('disabled', true);
          var dd = $("#form1").serialize();
          $.post("server/utilities.php",dd,function(re)
          {
            console.log(re);
            $("#pay").text("Send");
            if(re.response_code == 200)
                {
                    console.log(re.response_message);
					console.log(re.redirect);
					$("#server_mssg").text(re.response_message);
                 	$("#server_mssg").css({'color':'green','font-weight':'bold'});
                    $("#pay").text("Loading..........");
                    $("#pay").prop('disabled', true);
                    setTimeout(() => {
						window.location.replace(re.redirect);
					}, 1000);
                }
            else
                {
                $("#pay").text("Send");
                    console.log(re.response_message);
					$("#server_mssg").text(re.response_message);
                    $("#server_mssg").css({'color':'red','font-weight':'bold'});
                    
                }
                  
          },'json');
      })
	</script>

	</body>

<!--  08:21 GMT -->
</html>
