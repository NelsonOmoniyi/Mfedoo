<?php include("inc/header.php"); ?>
  
  <!-- Intro Section -->
 <section class="inner-intro bg-img light-color overlay-before parallax-background">
    <div class="container">
      <div class="row title">
      	<div class="title_row">
      		<h1 data-title="Blank"><span>Send Us Your Request.</span></h1>
      		<div class="page-breadcrumb">
							<a>Home</a>/ <span>Make a request!</span>
						</div>
      		
      	</div>
        
      </div>
    </div>
  </section>
 <!-- Intro Section End-->
  
  <!-- CONTENT --> 
    <section id="feadback" class="padding ptb-xs-40 img_bg1">
        <div class="container">
            <div class="row text-center mb-30  light-color">
                <div class="col-sm-12">
                    <div class="sec_hedding">
                        <h2><span>Make A</span> Request</h2>
                        <span class="b-line"></span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class=" col-md-12 col-lg-12">

                    <!-- Contact FORM -->
                    <form class="quote-form" id="form1" onsubmit="return false">
                    <input type="hidden" name="op" value="Message.save_message">
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <div class="form-field">
                                    <input class="input-sm form-full" id="name" type="text" name="form-name" placeholder="Your Name">
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4">
                                <div class="form-field">
                                    <input class="input-sm form-full" id="email" type="text" name="form-email" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4">
                                <div class="form-field">
                                    <input class="input-sm form-full" id="sub" type="text" name="form-subject" placeholder="Subject">
                                </div>
                            </div>

                            <div class="col-md-10 col-lg-10">
                                <div class="form-field">
                                    <textarea class="form-full" id="message" rows="7" name="message" placeholder="I was wondering about availability and rates, I need help with the following:"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-2 col-lg-2 d-flex align-items-center">
                                <button onclick="sendLogin()" class="bnt btn-text sent-but mt-xs-30" type="button" id="submit">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- END Contact FORM -->
                </div>

            </div>

        </div>
    </section>


  <?php include("inc/footer.php"); ?>
