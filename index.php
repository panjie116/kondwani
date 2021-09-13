<?php 

include 'admin/includes/conn.php'



 ?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Portfolio</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
	        <!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		  <link href="css/aos.css" rel="stylesheet">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
	    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu" id="mainNav">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="#">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="#about">About</a></li> 
								<li class="nav-item"><a class="nav-link" href="#opinion">Opinion</a></li> 
								<li class="nav-item"><a class="nav-link" href="#autobiography">Auto-Biography</a>
								<li class="nav-item"><a class="nav-link" href="#ads">Ads</a>
								<li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
								<li class="nav-item"><a class="nav-link" href="admin/index.php">Admin</a>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="home_left_img">
								<img src="img/home.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="banner_content">
								<h5>Hello, I'm</h5>
								<h2>Munkhondiya</h2>
								<p> Writer/Author... </p>
								<a class="banner_btn" href="#">Hire me!</a>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area p_120" id="about">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<div class="welcome_text">
        					<h4>About Myself</h4>
        					<blockquote class="generic-blockquote">
									“Computer Engineering student seeking to gain more hands-on experience. Avid learner who is willing to tackle new challenges and deliver products that make an impact. Outside programming, I enjoy running, reading novels, and listening to podcasts.” 
								</blockquote>
        					
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="tools_expert">
        					<h3>What i do?</h3>
        					<div class="skill_main">
								<div class="skill_item">
									<h4>Writing <span class="counter">85</span>%</h4>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="skill_item">
									<h4>Research <span class="counter">90</span>%</h4>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="skill_item">
									<h4> Advertisment <span class="counter">80</span>%</h4>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Welcome Area =================-->


          <!--================Latest Blog Area =================-->
        <section class="latest_blog_area p_120" id="opinion">
        	<div class="container">
        		<div class="main_title">
        			<h2>Opinion Column</h2>
        			
        		</div>
        		<div class="row latest_blog_inner">

        			<?php
        			  $query = mysqli_query($con, "select * FROM tblposts where tblposts.Is_Active=1 LIMIT 4 ");

        			  	while ($row=mysqli_fetch_array($query)) {
        			  		
        			 
        			  ?>
        			<div class="col-lg-3">
        				<div class="l_blog_item">
        					<div class="l_blog_img">
        						 <a href="opinion-details.php?nid=<?php echo htmlentities($row['id']) ?>"><img src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['PostImage']);  ?>" width="230" height="180"></a>
        					</div>
        					<div class="l_blog_text">
        						<div class="date">
        							<a href=>  <?php  echo $row['PostingDate']; ?>  |  By Kondwani</a>
        						</div>
        						<a href="opinion-details.php?nid=<?php echo htmlentities($row['id']) ?>"><h4> <?php  echo $row['PostTitle']; ?> </h4></a>
        						
        					</div>
        				</div>
        			</div>

	<?php } ?>
        		</div>

        			
        	
        	</div>

        	

        	 
        </section>
        <!--================End Latest Blog Area =================-->
        
        <!--================Feature Area =================-->
        <section class="feature_area p_120" id="autobiography">
        	<div class="container">
					<div class="main_title">
						<h2>Auto-biography</h2>
					</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-md-12 col-lg-6">
				         <div class="timeline-centered">
				         		<?php
				        			  $query = mysqli_query($con, "select * FROM tblupdates where tblupdates.Is_Active=1 LIMIT 4 ");

				        			  	while ($row=mysqli_fetch_array($query)) {
				        			  		
				        			 
				        			  ?> 


								<div class="">
									<ul class="unordered-list">
										<li><a href="bio-details.php?bid=<?php echo htmlentities($row['id']) ?>"> <?php  echo $row['PostTitle']; ?></a>
											  <h4> <?php echo $row['PostingDate'] ?></h4>
					                  	<p><?php echo $row['PostDetails'] ?></p>

										</li>
										
									</ul>
								</div>
					         
					         	<?php } ?>

					        

					         <article class="timeline-entry begin animate-box" data-animate-effect="fadeInBottom">
					            <div class="timeline-entry-inner">
					               <div class="timeline-icon color-none">
					               </div>
					            </div>
					         </article>
					      </div>
					   </div>
					    </div>
				</div>
        </section>
        <!--================End Feature Area =================-->
        
      
        <!--================Testimonials Area =================-->
        <section class="testimonials_area p_120" id="ads">
        	<div class="container">
        		<div class="main_title">
        			<h2>Advertisments</h2>
        		</div>
        		<div class="testi_inner">
					<div class="testi_slider owl-carousel">
								<?php
				        			  $query = mysqli_query($con, "select * FROM tblads where tblads.Is_Active=1 LIMIT 4 ");

				        			  	while ($row=mysqli_fetch_array($query)) {
				        			  		
				        			 
				        			  ?> 
						<div class="item">
							<div  class="testi_item">
								<div id= "link_other" >
								 <a target="blank" href="https://www.<?php echo htmlentities($row['Link']) ?>"><img src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['PostImage']);  ?>" width="230" height="180"></a>
								
							</div>
							</div>
						</div>
						
						<?php } ?>
					</div>
        		</div>
        	</div>
        </section>
        <!--================End Testimonials Area =================-->


         <!--================Contact Area =================-->
        <section class="contact_area p_120" id="contact">
            <div class="container">
                                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>Mzuzu, Malawi</h6>
                                <p>Katoto</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="#">+265882795006</a></h6>
                                <p>Mon to Fri 9am to 6 pm</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="#">info@kho.com</a></h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        
      
        
        <!--================Footer Area =================-->
        <footer class="footer_area p_120">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget ab_widget">
        					<div class="f_title">
        						<h3>About Me</h3>
        					</div>
        				
        				</aside>
        			</div>
        	
        			<div class="col-lg-2">
        				<aside class="f_widget social_widget">
        					<div class="f_title">
        						<h3>Follow Me</h3>
        					</div>
        					<p>social</p>
        					<ul class="list">
        						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
        						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        					</ul>
        				</aside>
        			</div>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="js/mail-script.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
         <script src="js/aos.js"></script>


         <script>
		    $(function() {
		    AOS.init();
		  });

		  $(window).on('load', function() {
		    AOS.refresh();
		  });
		  </script>

		  <script>
			    $(".navbar-collapse a").click(function(){
			        $(".navbar-collapse").collapse('hide');
			    });
			</script>

			  <script>

				window.onload = function(){
				  var anchors = document.getElementById('link_other').getElementsByTagName('a');
				  for (var i=0; i<anchors.length; i++){
				    anchors[i].setAttribute('target', '_blank');
				  }
				}

				  </script>
    </body>
</html>