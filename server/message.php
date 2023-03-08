
<div class="container contact-form padding pt-xs-40 mt-up">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <h4>GET IN TOUCH</h4>
          <p> Tell us what you have in mind, send us a message! </p>
          <!-- Contact FORM -->
          <form class="user contact-form mt-45" id="form1" onsubmit="return false">  
          <input type="hidden" name="op" value="Message.save_message">         
                   
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-field">
                  <input class="input-sm form-full" id="name" type="text" name="form-name" placeholder="Your Name">
                </div>
                <div class="form-field">
                  <input class="input-sm form-full" id="email" type="text" name="form-email" placeholder="Email" >
                </div>
                <div class="form-field">
                  <input class="input-sm form-full" id="subject" type="text" name="form-subject" placeholder="Subject">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-field">
                  <textarea class="form-full" id="message" rows="7" name="message" placeholder="I was wondering about availability and rates, I need help with the following:" ></textarea>
                </div>
              </div>
              <div id="server_mssg">

              </div>
              <div class="col-md-12 col-lg-12 mt-30">
                <button onclick="sendLogin()" class="btn-text" id="submit"> Send Message</button>
              </div>
            </div>
          </form>
          <!-- END Contact FORM -->
        </div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.blockUI.js"></script>
	<script src="js/parsely.js"></script>
	
	<script src="js/sweet_alerts.js"></script>
	<script src="js/main.js"></script>
    <script>
      function sendLogin() {
        $("#submit").text("Loading......");
          var dd = $("#form1").serialize();
          $.post("utilities.php",dd,function(re)
          {
              console.log(re);
              $("#submit").text("Send Message");
              if(re.response_code == 200)
                  {
                      $("#server_mssg").text(re.response_message);
                      $("#server_mssg").css({'color':'green','font-weight':'bold'});
                      $("#submit").text("Send Message");
                      // $("#submit").prop('disabled', true);
                      // getpage('user_list.php','page');
                      // setTimeout(()=>{
                      //     $('#defaultModalPrimary').modal('hide');
                      // },1000)
                  }
              else
                  {
                    $("#submit").text("Send Message");
                      $("#server_mssg").text(re.response_message);
                        $("#server_mssg").css({'color':'red','font-weight':'bold'});
                       
                  }
                  
          },'json');
      }
    


    </script>