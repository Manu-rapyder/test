<?php require_once("includes/header2.php");?>

<style>
	.timeline li {
		list-style-type: disc;
	}

	.stream-proc h4 {
		font-weight: 600;
	}
</style>


<div class="btc-light">
	<div class="banner-block-new"> 
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-10 col-xl-7">
					<div class="banner-content">

						<h1 class="banner-heading">Join Our Team</h1>
						<span class="brd-main"><a href="index.php">Home</a></span><span> / Join our team</span>
					</div>
				</div>
			</div>
		</div>
		<div class="bg-image">
			<img src="assets/img/inside-banner-grad.jpg" alt="banner">
		</div>
	</div>
</div>

<div class="section section-x tc-grey-alt">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-10 col-sm-9 text-center">
				<div class="section-head m-0">

					<p>Do you have a passion for science and the drive, enthusiasm and technical ability to create new
						medicines supporting the world’s most innovative life sciences companies?</p>
					<p>If so, Intonation could be the next career step for you. We aim to attract the best talent
						offering varied careers in drug discovery across multiple scientific disciplines.</p>
					<p>As a growing Indian company with offices in Europe and the USA, we strive to provide platforms
						for career development underpinned by training opportunities that unlock people’s potential. We
						look to attract and reward passionate, client-centric scientists who want to contribute to
						projects and world-class science. </p>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="section bg-secondary section-x tc-grey-alt">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">
				<div class="section-head section-md">
					<h2>Drop your details in the form given below, and we will get back to you:</h2>

					<div class="alert alert-danger errmsg text-center" style="display: none;"></div>

					<form class="genox-form form-alt" >
						<div class="form-results"></div>
						<div class="row">
							<div class="form-field col-md-6">
								<input name="cf_name" id="cf_name" type="text" placeholder="First Name" class="input bdr-b "
									aria-required="true">
							</div>
							<div class="form-field col-md-6">
								<input name="cf_phone" id="cf_phone" type="text" placeholder="Mobile" class="input bdr-b "
									aria-required="true">
							</div>
						</div>
						<div class="row">
							<div class="form-field col-md-6">
								<input name="cf_email" id="cf_email" type="email" placeholder="Email" class="input bdr-b "
									aria-required="true">
							</div>
							<div class="form-field col-md-6">
								<input name="cf_city" id="cf_city" type="text" placeholder="City" class="input bdr-b "
									aria-required="true">
							</div>
						</div>
						<div class="row">
							<div class="form-field col-md-6">
								<input name="cf_edu" id="cf_edu" type="text" placeholder="Education" class="input bdr-b ">
							</div>
							<div class="form-field col-md-6">
								<input name="cf_dept" id="cf_dept" type="text" placeholder="Department" class="input bdr-b ">
							</div>
						</div>
						<br />
						<div class="row pb-20">
							<div class="form-field col-md-12 custom-file">
								<input type="file" class="custom-file-input " id="customFile">
								<label class="custom-file-label" for="customFile">Upload Resume</label>
							</div>
						</div>
						<div class="row">
							<div class="form-field col-md-12">
								<input type="text" class="d-none" name="form-anti-honeypot" value="">
								<button type="submit" class="btn" id="submit_career">SUBMIT APPLICATION</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">

 $("#submit_career").click(function(){
  var cr_name = $("#cf_name").val().trim();
  var nameValid = /^[a-zA-Z' ]+$/;
  var cr_email = $("#cf_email").val();
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
  var cr_phone = $("#cf_phone").val();  
  var phonevalid = /^\d{10}$/;    
  var cr_upload = $("#customFile").val();
  var cr_post_applied = $("#cr_post_applied").val(); 
  var fileinput1= document.getElementById("customFile");
  var cr_message = $("#cr_message").val();


  var city = $("#cf_city").val().trim(); 
  var education = $("#cf_edu").val().trim();
  var dept = $("#cf_dept").val().trim();
   //var uploaded_file = $("#uploaded_file").val();

   if (cr_name==""){
    $("#cf_name").focus();
    $(".errmsg").html("Please Enter Your Full Name");
    $("#cf_name").val("");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }
  else if(cr_name!="" && !nameValid.test(cr_name)){
    $("#cr_name").focus();
    $(".errmsg").html("Please Enter Valid Name");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }
   else if(cr_phone==""){
    $("#cr_phone").focus();
    $(".errmsg").html("Please Enter Your Mobile Number");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }
  else if(cr_phone!="" && !phonevalid.test(cr_phone)){
    $("#cr_phone").focus();
    $(".errmsg").html("Please Enter your Valid Mobile Number");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }
  else if(cr_email==""){
    $("#cr_email").focus();
    $(".errmsg").html("Please Enter Your Email Address");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }

  else if(cr_email!="" && !filter.test(cr_email)){
    $("#cr_email").focus();
    $(".errmsg").html("Please Enter Your Valid  Email Address");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }
  else if(city == ""){
  	$("#cf_city").focus();
    $(".errmsg").html("Please Enter City");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }else if(city != "" && !nameValid.test(city)){
    $("#cf_city").focus();
    $(".errmsg").html("Please Enter Valid City");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }
  else if(education == ""){
  	$("#cf_edu").focus();
    $(".errmsg").html("Please Enter Education");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }
  else if(education != "" && !nameValid.test(education)){
    $("#cf_edu").focus();
    $(".errmsg").html("Please Enter Valid Education ");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }
  else if(dept == ""){
  	$("#cf_dept").focus();
    $(".errmsg").html("Please Enter Department");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }
  else if(dept != "" && !nameValid.test(dept)){
    $("#cf_dept").focus();
    $(".errmsg").html("Please Enter Valid Department ");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }
  else if(cr_upload==""){
    $("#cr_upload").focus();
    $(".errmsg").html("Please Upload File");
    $("#cr_upload").val("");
    $(".errmsg").slideDown("slow").delay(3000).slideUp();
    return false;
  }


  

  else
  {
    var formdata= new FormData();
    
    for (var i = 0; i < fileinput1.files.length; ++i) {
     formdata.append('cr_upload[]',fileinput1.files[i]);
   }


   formdata.append('cr_name',cr_name);
   formdata.append('cr_email',cr_email);         
   formdata.append('cr_phone',cr_phone);
   formdata.append('cr_city',city);
   formdata.append('cr_edu',education);
   formdata.append('cr_dept',dept);    
   //formdata.append('cr_post_applied',cr_post_applied);
   //formdata.append('cr_message',cr_message);

   formdata.append('type',"careersform");
   $.ajax({
     type:"post",
     data: formdata,
     processData: false,
     contentType: false,
     url:"team_action.php",
     beforeSend:function(){ 
		$("#submit_career").prop('disabled', true);
		$("#submit_career").text('SUBMITING ...');
	},
     success:function(msg){
         $("#submit_career").prop('disabled', false);
		$("#submit_career").text('SUBMIT APPLICATION');
      msg=msg.trim();
 //alert(msg);
if(msg == "3"){
    $(".errmsg").html("Your Have already applied for this position!!");
     $(".errmsg").slideDown("slow").delay(5000).slideUp();
     $("#cf_name").val("");
     $("#cf_email").val("");
     $("#cf_phone").val("");
     $("#cf_edu").val("");
     $("#cf_dept").val("");
     $("#cf_city").val("");
     return false;
}else if(msg == "1"){
 $(".errmsg").html("Your Enquiry is sent Successfully!!");
 $(".errmsg").addClass("alert-success");
 $(".errmsg").removeClass("alert-danger");
 $(".errmsg").slideDown("slow").delay(5000).slideUp();
 $("#cf_name").val("");
     $("#cf_email").val("");
     $("#cf_phone").val("");
     $("#cf_edu").val("");
     $("#cf_dept").val("");
     $("#cf_city").val("");
$("#customFile").val("");
     $('.custom-file-label').text("Upload Resume");

}
else{
 $(".errmsg").html("Sorry!! Some Error occured. Please try after some time.");
 $(".errmsg").slideDown("slow").delay(5000).slideUp();
 $("#cf_name").val("");
     $("#cf_email").val("");
     $("#cf_phone").val("");
     $("#cf_edu").val("");
     $("#cf_dept").val("");
     $("#cf_city").val("");
     $("#customFile").val("");
     $('.custom-file-label').text("Upload Resume");
}
return false;
}

});
   return false;
 }
});
 

 $('#customFile').bind('change', function()
 {

  var ext = $(this).val().split('.').pop().toLowerCase();
  var filename = $(this).val().split('/').pop().toLowerCase();
  $("#file_type").val(ext);
  if(this.files[0].size > '3000000')
  {
   alert('Please Upload File upto 3MB');
   $(this).val("");
   $("#file_type").val("");
 }
 else
 {
   if($.inArray(ext, ['pdf','doc','docx']) == -1) {
    alert('Invalid Format');
    $(this).val("");
    $("#file_type").val("");
  }
  else if($(this).val().indexOf("_") > 0)
  {
    alert('Please remove underscore ( _ ) before uploading file');
    $(this).val("");
    $("#file_type").val("");
  }else{
        var filem = filename.replace(/^.*[\\\/]/, '');   
      $('.custom-file-label').text(filem);
  }
}
});

</script>


<?php require_once("includes/footer.php");?>