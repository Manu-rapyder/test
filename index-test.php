<?php require_once("includes/header.php");?>
<style type="text/css">
	.pos-rel{
		position: relative;
	}
	#myVideo {
  /*position: absolute;*/
 width:100%;
}
#myModal-vdo .modal-content{
    background-color: transparent;
    border: 0px;
}
#myModal-vdo .close{
        opacity: 1;
    color: #fff;
    font-size: 40px;
}

.vdo-play{
    position: absolute;top: 28%;left: 46%;z-index: 22;cursor:pointer;
}
.title-play{
    position: absolute;top: 60%;left: 41%;z-index: 22;cursor:pointer;color: #fff;
}
.pb0{
    padding-bottom:0px;
}
.parallax {
  /* The image used */
  background-image: url("assets/img/vdo-bg.png");

  /* Set a specific height */
  min-height: 400px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
@media only screen and (max-width: 767px){
.post-thumb{text-align: center;}
.vdo-play {
   
    top: 30%;
    left: 40%;
    }
    .title-play{
    	left: 30%
    }
}
</style>

<!-- banner / slider -->
<div class="banner banner-s4 has-slider">
	<!-- panel -->
	<div class="panel bantop-panel">

		<div class="container">
			<div class="row">
				<div class="col-md-10 col-xl-8">
					<div class="banner-content mob-ban-cont">
						<h1 class="banner-heading animate t-u ban-title" data-animate="fade-in-up" data-delay="0.5"
						data-duration="0.5">Welcome to Intonation Research Laboratories</h1>
						<p class="lead lead-lg animate" data-animate="fade-in-up" data-delay="0.12" data-duration="0.5">
						Delivering on your drug discovery goals </p>
						<div class="banner-btn animate" data-animate="fade-in-up" data-delay="0.20" data-duration="0.9">
							<a href="contact.php" class="menu-link btn">TALK TO OUR EXPERTS NOW </a>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
	<div id="particles-js" style="position: absolute;"></div>
	<div class="has-carousel" data-effect="true" data-items="1" data-loop="true" data-dots="false" data-auto="true"
	data-navs="true">
	<div class="banner-block tc-light d-flex">


		<div class="bg-image change-bg">

			<img src="assets/img/ban-img.jpg" alt="banner" class="img-responsive">


			<div
			style="position:absolute;top:0;width:100%;height:100%;left:0;right:0;background:  linear-gradient(95deg, rgba(255,255,255,0.33) 15%, rgba(148,148,148,0.86) 98%);">
		</div>

	</div>

</div>


</div>

</div>



<!-- section -->
<div class="section section-x tc-grey">
	<div class="container">
		<div class="row gutter-vr-30px justify-content-between align-items-start align-items-md-start">
			<div class="col-lg-6 order-lg-last">
				<div class="box-image">
					<div class="year-box">

						<div class="tc-light counter">
							<div class="row">
								<div class="counter-icon color-light">
									<img src="assets/img/icons/microscope.png" alt="Microscope">
								</div>
							</div>
							<div class="row abt-nc">
								<div class="counter-content">
									<h2 class="count" data-count="0">200</h2>
									<p>Years Of Chemistry Expertise</p>
								</div>
							</div>
						</div>

					</div>
					<img src="assets/img/abt-home.jpg" alt="">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="text-block block-pad-b-50 ">
					<h5 class="heading-xs dash">About Us</h5>
					<h2>Delivering on your drug discovery goals
						with actionable yet cost-effective outcomes
					</h2>
					<p>What sets our work at the Intonation Research laboratories apart
					from other life science services companies. </p>
					<div class="row about-exp">
						<div class="col-sm-6  d-none d-lg-block">
							<div class="row">
								<div class="col-md-3 p0">
									<div class="feature-icon">
										<img src="assets/img/icons/exp.png" alt="exp">
									</div>
								</div>
								<div class="col-md-9">
									<h3>Our<br /> Experience</h3>
								</div>
							</div>
							<hr>
						</div>
						<div class="col-sm-6 ml-12 d-none d-lg-block">
							<div class="row">
								<div class="col-md-3 p0">
									<div class="feature-icon">
										<img src="assets/img/icons/infrastructre.png" alt="infrastructre">
									</div>
								</div>
								<div class="col-md-9">

									<h3>Our<br /> Infrastructure</h3>

								</div>
							</div>
							<hr>
						</div>
						<div class="col-sm-6 d-none d-lg-block">
							<div class="row">
								<div class="col-md-3 p0">
									<div class="feature-icon">
										<img src="assets/img/icons/expertise.png" alt="expertise">
									</div>
								</div>
								<div class="col-md-9">

									<h3>Our<br /> Expertise </h3>


								</div>
							</div>
							<hr>
						</div>
						<div class="col-sm-6 ml-12 d-none d-lg-block">
							<div class="row">
								<div class="col-md-3 p0">
									<div class="feature-icon">
										<img src="assets/img/icons/confidentiality.png" alt="confidentiality">
									</div>
								</div>
								<div class="col-md-9">
									<h3>Our<br /> Confidentiality </h3>
								</div>
							</div>
							<hr>
						</div>
						<div class="col-sm-6 d-none d-lg-block">
							<div class="row">
								<div class="col-md-3 p0">
									<div class="feature-icon">
										<img src="assets/img/icons/commitment.png" alt="commitment">
									</div>
								</div>
								<div class="col-md-9">
									<h3>Our<br /> Commitment </h3>
								</div>
							</div>
						</div>
						<div class="col-sm-6 ml-12 d-none d-lg-block">
							<div class="row">
								<div class="col-md-3 p0">
									<div class="feature-icon">
										<img src="assets/img/icons/reliability.png" alt="reliability">

									</div>
								</div>
								<div class="col-md-9">
									<h3>Our<br /> Reliability </h3>
								</div>
							</div>
						</div>
					</div>

					<!-- For mobile only -->
					<div class="row about-exp text-center">
						<div class="col d-block d-lg-none mob-abt-us">
							<div class="feature-icon">
								<img src="assets/img/icons/exp.png" alt="Experience">
							</div>
							<h3>Our Experience</h3>
						</div>
						<div class="col d-block d-lg-none">
							<div class="feature-icon">
								<img src="assets/img/icons/infrastructre.png" alt="Infrastructure">
							</div>
							<h3>Our Infrastructure</h3>
						</div>
						<div class="w-100"></div>
						<div class="col d-block d-lg-none mob-abt-us" >
							<div class="feature-icon">
								<img src="assets/img/icons/expertise.png" alt="expertise">
							</div>
							<h3>Our Expertise </h3>
						</div>
						<div class="col d-block d-lg-none">
							<div class="feature-icon">
								<img src="assets/img/icons/confidentiality.png" alt="confidentiality">
							</div>
							<h3>Our Confidentiality </h3>
						</div>
						<div class="w-100"></div>
						<div class="col d-block d-lg-none">
							<div class="feature-icon">
								<img src="assets/img/icons/commitment.png" alt="commitment">
							</div>
							<h3>Our Commitment </h3>
						</div>
						<div class="col d-block d-lg-none">
							<div class="feature-icon">
								<img src="assets/img/icons/reliability.png" alt="reliability">
							</div>
							<h3>Our Reliability </h3>
						</div>
					</div>
					<!-- Ends Here -->

					<br><br>
					<div class="mob-cent">
						<a href="about.php" class="btn">Read more</a>
					</div>
					
				</div><!-- .text-block  -->
			</div>
		</div>

	</div>


</div>
<!-- .section -->



<!-- section -->
<div class="section section-l tc-grey-alt has-bg-image" id="services">

	<div class="section section-x tc-grey-alt services-hm">
		<div class="container">

			<h2 class="service-title">Achieve your R&D target in the Intonation way</h2>
			<div class="row text-center justify-content-center gutter-vr-30px">
				<div class="col-lg-6 col-sm-6">
					<div class="feature feature-alt shadow-alt">
						<div class="feature-icon">
							<img src="assets/img/icons/chemistry-services.png" alt="chemistry services">
						</div>
						<div class="feature-content">
							<h3>Chemistry Services </h3>
							<p>Chemistry is at the heart of Intonation with over 80 chemists supported by state of the
							art infrastructure and analytical capabilities.</p>
							<a href="chemistry-services.php" class="btn btn-arrow">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6">
					<div class="feature feature-alt shadow-alt">
						<div class="feature-icon">
							<img src="assets/img/icons/pharmacology.png" alt="pharmacology">
						</div>
						<div class="feature-content">
							<h3>Pharmacology Services </h3>
							<p>Our unique expertise in designing and executing validated disease relevant biological
							assays is pivotal to support a successful hit-to-lead campaign.</p>
							<a href="pharmacology-services.php" class="btn btn-arrow">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6">
					<div class="feature feature-alt shadow-alt">
						<div class="feature-icon">
							<img src="assets/img/icons/vitro.png" alt="vitro">
						</div>
						<div class="feature-content">
							<h3>In Vitro/In-Vivo ADME </h3>
							<p>Profiling the Physio-chemical characteristics and ADME/Tox of compounds play a crucial
							role in the success of a drug candidate. </p>
							<a href="vitro.php" class="btn btn-arrow">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6">
					<div class="feature feature-alt shadow-alt">
						<div class="feature-icon">
							<img src="assets/img/icons/integrated-project.png" alt="integrated project">
						</div>
						<div class="feature-content">
							<h3>Integrated Drug Discovery Solutions</h3>
							<p>We offer all the relevant capabilities required to support drug discovery projects from
							hit identification through to candidate selection and beyond.</p>
							<a href="integrated-drug.php" class="btn btn-arrow">Read More</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<!-- bg-image -->
	<div class="bg-image bg-fixed overlay-fall bg-image-loaded"
	style="background-image: url(&quot;assets/img/rnd.jpg&quot;);">
	<img src="assets/img/rnd.jpg" alt="">
	<div
	style="position:absolute;top:0;width:100%;height:100%;left:0;right:0;background:  linear-gradient(90deg, rgba(42,183,191,0.5) 0%, rgba(7,63,127,0.8) 100%);">
</div>

</div>
<!-- end bg -->
</div>
<!-- .section -->

<!-- section -->
<div class="section section-x pt-20">
	<div class="container">

		<div class="gap"></div>
		<div class="row gutter-vr-30px">
			<div class="col-md-6">
				<div class="bg-img has-bg-image">
					<div class="bg-image overlay-fall bg-image-loaded"
					style="background-image: url(&quot;images/image-d.jpg&quot;);background-position-x: 0;">
					<img src="assets/img/case study.jpeg" alt="">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="text-block fw-3 bg-secondary block-pad-xl">
				<!-- <h5 class="heading-xs no-line tc-alt">We Believe</h5> -->
				<h2>Our Infrastructure</h2>
				<p class="tc-grey">We operate a 21,000 sq.ft state of the art chemistry and bioscience facility in Hyderabad India. The laboratory complex with 60 fume hoods, cell culture, screening and radioisotope laboratories which are designed to facilitate effective communication and workflow between scientists.</p>
				<a href="intonation-way.php#infra" class="btn">View Now</a>
			</div>
		</div>
	</div>
</div>
</div>

<div class="section section-l tc-grey-alt has-bg-image">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-lg-5">
				<div class="text-block bg-light block-pad-80">
					<h5 class="heading-xs dash">Who we are</h5>
					<h2 class="fs-25">We are Auxiliary Research Organization (ARO) capable of independently pursuing
					drug discovery programs.</h2>
					<a href="about.php" class="btn">Know more</a>
				</div>
			</div>
		</div>
	</div>

	<!-- bg-image -->
	<div class="bg-image bg-fixed overlay-fall bg-image-loaded"
	style="background-image: url(&quot;assets/img/about.jpg&quot;);opacity: 0.3;">
	<img src="assets/img/about.jpg" alt="">
</div>
<!-- end bg -->
<img src="assets/img/gif1.gif" style="position: absolute;
top: 10%;
right: 10%;">
</div>



</div>
<!-- .section -->

<!-- section / testimonial -->
<div class="section section-x">
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-lg-8 text-center">
				<div class="section-head section-md">
					<h5 class="heading-xs dash dash-both">Testimonial</h5>
					<h2>Hear it from our happy and satisfied clients</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="tes-s1">
					<div class="has-carousel" data-items="1" data-loop="false" data-dots="true" data-auto="true"
					data-navs="true">
					<div class="tes-item">
						<div class="row">

							<div class="col-md-12">
								<div class="tes-block tc-light bg-primary">
									<div class="tes-content">

										<p class="lead">“I have to say – and I am known not to make such statements
											easily – it was a delightful experience to work with Intonation. The
											chemistry work was top standard. But not only that: we are a dynamic
											company and we had demanding ad hoc requests to enable us to meet the
											project milestones faster. The Intonation team did what in the back of
											my mind I expected to be impossible and it moved us ahead of
										expectations in the overall program.” </p>
									</div>
									<div class="author-con">
										<!-- <h6 class="author-name t-u">Person Name</h6> -->
										<h5><i>Vice President and Head of Project Management</i> </h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="tes-item hidden">
						<div class="row">
							<div class="col-md-12">
								<div class="tes-block tc-light bg-primary">
									<div class="tes-content">

										<p class="lead">“I have to say – and I am known not to make such statements
											easily – it was a delightful experience to work with Intonation. The
											chemistry work was top standard. But not only that: we are a dynamic
											company and we had demanding ad hoc requests to enable us to meet the
											project milestones faster. The Intonation team did what in the back of
											my mind I expected to be impossible and it moved us ahead of
										expectations in the overall program.” </p>
									</div>
									<div class="author-con">
										<h6 class="author-name t-u">Person Name</h6>
										<p>- Vice President and Head of Project Management</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tes-item hidden">
						<div class="row">
							<div class="col-md-12">
								<div class="tes-block tc-light bg-primary">
									<div class="tes-content">

										<p class="lead">“I have to say – and I am known not to make such statements
											easily – it was a delightful experience to work with Intonation. The
											chemistry work was top standard. But not only that: we are a dynamic
											company and we had demanding ad hoc requests to enable us to meet the
											project milestones faster. The Intonation team did what in the back of
											my mind I expected to be impossible and it moved us ahead of
										expectations in the overall program.” </p>
									</div>
									<div class="author-con">
										
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
				<!-- <div class="tes-arrow">
					<a class='slick-prev slick-arrow'><i class='icon ti ti-angle-left'></i></a>
					<a class='slick-next slick-arrow'><i class='icon ti ti-angle-right'></i></a>
				</div> -->
			</div>
		</div>
	</div>
</div>
</div>
<div class="section section-x pb0">
	<div class="container-fluid" style="padding: 0">

<div class="pos-rel">
	<div class="parallax"></div>
<!-- <img src="assets/img/vdo-bg.png" style="width: 100%;"> -->
<img src="assets/img/video-play.png" class="vdo-play" style="" data-toggle="modal" data-target="#myModal-vdo">
<h3 class="title-play">Click To Play Video</h3>
</div>

</div>
</div>

<div class="section section-x section-news" style="background: #f5f5f5;">
	<div class="container">
		<div class="row justify-content-center justify-content-md-start no-gutter">
					<div class="col-10 col-lg-7 text-center text-md-left">
						<div class="section-head section-sm">
							<h5 class="heading-xs dash">News</h5>
							<h2 class="fs-27">From the Intonation<br/> news room</h2>
						</div>
					</div>
				</div>
		<div class="row justify-content-center gutter-vr-60px">
			<div class="col-lg-6">
				
				<div class="row justify-content-center justify-content-md-start gutter-vr-30px">
					<div class="col-md-12">
						<div class="post post-v1 align-items-center">
							<div class="post-thumb">
								<img src="assets/img/news/art1.jpeg" alt="post">
							</div>
							<div class="post-content text-center text-md-left">
								<p class="post-tag post-date">May 19, 2019</p>
								<h4><a href="https://www.deccanchronicle.com/lifestyle/health-and-wellbeing/190519/hyderabad-eat-broccoli-to-avoid-cancer.html" target="_blank">Hyderabad: Eat broccoli to avoid cancer</a></h4>
								<a href="https://www.deccanchronicle.com/lifestyle/health-and-wellbeing/190519/hyderabad-eat-broccoli-to-avoid-cancer.html" target="_blank" class="btn-arrow">Read More</a>
							</div>
						</div><!-- .post -->
					</div>
					<div class="col-md-12">
						<div class="post post-v1 align-items-center">
							<div class="post-thumb">
								<img src="assets/img/news/art2.jpg" alt="post">
							</div>
							<div class="post-content text-center text-md-left">
								<p class="post-tag post-date">May 18, 2019</p>
								<h4><a href="https://www.natureasia.com/en/nindia/article/10.1038/nindia.2019.62" target="_blank">Harbour prostate cancer inhibiting compound</a></h4>
								<a href="https://www.natureasia.com/en/nindia/article/10.1038/nindia.2019.62" target="_blank" class="btn-arrow">Read More</a>
							</div>
						</div><!-- .post -->
					</div>
					
				</div>
			</div>
			<div class="col-lg-6">
				
				<div class="row justify-content-center justify-content-md-start gutter-vr-30px">
					<div class="col-md-12">
						<div class="post post-v1 align-items-center">
							<div class="post-thumb">
								<img src="assets/img/news/art3.jpg" alt="post">
							</div>
							<div class="post-content text-center text-md-left">
								<p class="post-tag post-date">May 17, 2019</p>
								<h4><a href="https://science.sciencemag.org/content/364/6441/eaau0159/tab-figures-data" target="_blank">Reactivation of PTEN tumor suppressor </a></h4>
								<a href="https://science.sciencemag.org/content/364/6441/eaau0159/tab-figures-data" target="_blank" class="btn-arrow">Read More</a>
							</div>
						</div><!-- .post -->
					</div>
					<div class="col-md-12">
						<div class="post post-v1 align-items-center">
							<div class="post-thumb">
							<img src="assets/img/news/art4.jpg" alt="post">
							</div>
							<div class="post-content text-center text-md-left">
								<p class="post-tag post-date">June 10, 2020</p>
								<h4><a href="https://www.biorxiv.org/content/10.1101/2020.06.05.137349v2" target="_blank">Synthetic antibodies neutralize SARS-CoV-2</a></h4>
								<a href="https://www.biorxiv.org/content/10.1101/2020.06.05.137349v2" target="_blank" class="btn-arrow">Read More</a>
							</div>
						</div><!-- .post -->
					</div>
					
				</div>
			</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
<div id="myModal-vdo" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" onclick="myFunction()">&times;</button>
       	<video controls loop id="myVideo">
  <source src="assets/img/intonation-film.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
      </div>
  
    </div>

  </div>
</div>

			<?php require_once("includes/footer.php");?>

			<script>
// Get the video
var video = document.getElementById("myVideo");

// Pause and play the video, and change the button text
function myFunction() { 
    video.pause();
  
}


document.getElementsByClassName("modal-backdrop").onclick = function() {myFunction1()}
function myFunction1() { 
    video.pause();
  
}
</script>
