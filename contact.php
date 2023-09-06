<?php require_once("includes/header2.php");?> 

<style>
@media (max-width: 767px){
.text-box {
    line-height: .8;
    margin-top: 0%;
    margin-left: 0%;
}
}
</style>

<br/>

<div style="margin-top: 6%;">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.539358811694!2d78.55278321435388!3d17.433880406052552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9bfd33916243%3A0xc59904593b0222aa!2sIntonation+Laboratories!5e0!3m2!1sen!2sin!4v1564382511501!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>


<div class="secdtion section-x tc-grey-alt">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-8">
				<div class="section-head">
					<h5 class="heading-xs dash">Fill the form</h5>
					<h2 class="blue-dark">DROP US A LINE</h2>
				</div>
			</div><!-- .col -->
		</div><!-- .row -->
		<div class="row gutter-vr-30px">
			<div class="col-lg-4 order-lg-last">
				<div class="contact-text contact-text-s2 bg-secondary box-pad cont-box">
					<div class="text-box">
						<h4 class="blue-dark">Intonation Research Laboratories

						</h4>
		
					</div>
					<ul class="contact-list">
						<li>
							<em class="contact-icon ti-location-pin"></em>
							<div class="address-content">
							<p class="add-line">A1/B, IDA Nacharam Hyderabad-500076, Andhra Pradesh, INDIA</p>
							</div>
						</li>
						<li>
							<em class="contact-icon ti-mobile"></em>
							<div class="conatct-content">
								<a href="tel:16174698756">+1 (617) 469-8756</a>
							</div>
						</li>
						<li>
							<em class="contact-icon ti-email"></em>
							<div class="conatct-content">
								<a href="mailto:	info@intotech.net">	info@intotech.net</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!-- .col -->
			<div class="col-lg-8">
				<form class="genox-form mt-10" method="POST" >
					<div class="alert alert-danger errmsg text-center" style="display: none;"></div>
					<div class="row">
						<div class="form-field col-md-6">
							<input name="c_name" id="c_name" type="text" placeholder="Full Name" class="input bdr-b" aria-required="true">
						</div>
						<div class="form-field col-md-6">
							<input name="c_email" id="c_email" type="email" placeholder="Email Address" class="input bdr-b" aria-required="true">
						</div>
					</div>
					<div class="row">
						<div class="form-field col-md-6">
							<input name="c_phone" id="c_phone" type="text" placeholder="Contact No." class="input bdr-b" aria-required="true">
						</div>
						<div class="form-field col-md-6">
							<input name="c_subject" id="c_subject" type="text" placeholder="Subject" class="input bdr-b" aria-required="true">
						</div>
					</div>
					
					<div class="row">
						<div class="form-field col-md-12">
							<textarea name="c_message" id="c_message" placeholder="Message " class="input input-msg bdr-b " aria-required="true"></textarea>
							<input type="text" class="d-none" name="form-anti-honeypot" id="form-anti-honeypot" value="">
							<button type="submit" class="btn"id="contact_submit" name="contact_submit" >Send Message</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<?php require_once("includes/footer.php");?> 

<script type="text/javascript">
  		$("#contact_submit").click(function () {
  			var c_name = $("#c_name").val().trim();
  			var nameValid = /^[a-zA-Z' ]+$/;
  			var c_phone = $("#c_phone").val();
  			var phonevalid = /^\d{10}$/;
  			var c_email = $("#c_email").val();
  			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  			var c_subject = $("#c_subject").val();
  			var subjectValid = /^[a-zA-Z' ]+$/;
  			var c_message = $("#c_message").val();

  			if (c_name == "") {
  				$("#c_name").focus();
  				$(".errmsg").html("Please enter your Full Name");
  				$("#c_name").val("");
  				$(".errmsg").slideDown("slow").delay(3000).slideUp();
  				return false;
  			} else if (c_name != "" && !nameValid.test(c_name)) {
  				$("#c_name").focus();
  				$(".errmsg").html("Please enter valid Name");
  				$(".errmsg").slideDown("slow").delay(3000).slideUp();
  				return false;
  			} else if (c_email == "") {
  				$("#c_email").focus();
  				$(".errmsg").html("Please Enter your Email Address");
  				$(".errmsg").slideDown("slow").delay(3000).slideUp();
  				return false;
  			} else if (c_email != "" && !filter.test(c_email)) {
  				$("#c_email").focus();
  				$(".errmsg").html("Please enter your valid  Email Address");
  				$(".errmsg").slideDown("slow").delay(3000).slideUp();
  				return false;
  			} else if (c_phone == "") {
  				$("#c_phone").focus();
  				$(".errmsg").html("Please enter your Contact Number");
  				$(".errmsg").slideDown("slow").delay(3000).slideUp();
  				return false;
  			} else if (c_phone != "" && !phonevalid.test(c_phone)) {
  				$("#c_phone").focus();
  				$(".errmsg").html("Please enter your valid Contact Number");
  				$(".errmsg").slideDown("slow").delay(3000).slideUp();
  				return false;
  			} else if (c_subject == "") {
  				$("#c_subject").focus();
  				$(".errmsg").html("Please Enter your Subject");
  				$("#c_subject").val("");
  				$(".errmsg").slideDown("slow").delay(3000).slideUp();
  				return false;
  			} else if (c_subject != "" && !subjectValid.test(c_subject)) {
  				$("#c_subject").focus();
  				$(".errmsg").html("Please enter valid Subject");
  				$(".errmsg").slideDown("slow").delay(3000).slideUp();
  				return false;
  			} else if (c_message == "") {
  				$("#c_message").focus();
  				$(".errmsg").html("Please enter your Message");
  				$("#c_message").val("");
  				$(".errmsg").slideDown("slow").delay(3000).slideUp();
  				return false;
  			} else {
  				var formdata = new FormData();

  				formdata.append('c_name', c_name);
  				formdata.append('c_email', c_email);
  				formdata.append('c_phone', c_phone);
  				formdata.append('c_subject', c_subject);
  				formdata.append('c_message', c_message);
  				formdata.append('type', "contactform");
  				$.ajax({
  					type: "post",
  					data: formdata,
  					processData: false,
  					contentType: false,
  					url: "contact_action.php",
beforeSend:function(){ 
                		$("#contact_submit").prop('disabled', true);
                		$("#contact_submit").text('SENDING ...');
                	},
  					success: function (msg) {
$("#contact_submit").prop('disabled', false);
		                $("#contact_submit").text('SEND MESSAGE');
  						msg = msg.trim();
  						// 			alert(msg);
  						if (msg == "1") {
  							$(".errmsg").html("Your Enquiry is sent Successfully!!");
  							$(".errmsg").addClass("alert-success");
  							$(".errmsg").removeClass("alert-danger");
  							$(".errmsg").slideDown("slow").delay(3000).slideUp();
  							$("#c_name").val("");
  							$("#c_email").val("");
  							$("#c_phone").val("");
  							$("#c_subject").val("");
  							$("#c_message").val("");
  						} else {
  							$(".errmsg").html(
  							"Sorry!! Some Error occured. Please try after some time.");
  							$(".errmsg").slideDown("slow").delay(3000).slideUp();
  							$("#c_name").val("");
  							$("#c_email").val("");
  							$("#c_phone").val("");
  							$("#c_subject").val("");
  							$("#c_message").val("");
  						}
  						return false;
  					}

  				});
  				return false;
  			}
  		});
  	</script>



