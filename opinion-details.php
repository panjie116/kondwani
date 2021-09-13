<?php
session_start();
include('admin/includes/conn.php');



// time ago function  
function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
} 

//Generating CSRF Token
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
  //Verifying CSRF Token
  if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];
      $postid = intval($_GET['nid']);
      $st1 = '0';
      $query = mysqli_query($con, "insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
      if ($query) :
        echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
        unset($_SESSION['token']);
      else :
        echo "<script>alert('Something went wrong. Please try again.');</script>";

      endif;
    }
  }
}
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
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
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
								<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
								
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>OPINION DETAILS</h2>
						<div class="page_link">
							<a href="index.php">Home</a>
							<a href="#">OPINION DETAILS</a>
						</div>
						
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">

 <?php
                      if(isset($_GET['nid'])){
                                       
                  $pid=intval($_GET['nid']);
                  $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                   $query=mysqli_query($con,"select * FROM tblposts where tblposts.id='$pid'");
                  while ($row=mysqli_fetch_array($query)) {
                  ?>
                                
                                <div class="row">
                                      <h2> <?php echo $row['PostTitle']; ?> </h2>
                                    


                                    <div class="col-lg-12 mt-25">
                                        <div class="col-6">
                                               
                                                 <img class="img-fluid" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="">
                                         </div>  
                                        <p>
                                           <?php echo $row['PostDetails']; ?> 
                                        </p>
                                        											
                                    </div>									
                                </div>
                                    <?php }     } 
                       ?>
                            </div>

                        </div>
                        <div class="comments-area">
                            <h4>Comments</h4>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="col">
                                         <?php 
                                             $sts=1;
                                             $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
                                            while ($row=mysqli_fetch_array($query)) {
                                            ?>
                                        <div class="thumb pt-4">
                                            <img src="img/user.png" alt="">
                                        </div>
                                        <div class="desc">
                                           <h5><?php echo htmlentities($row['name']);?></h5>
                                            <p class="date">

                                                <?php 
                                                    $time =htmlentities($row['postingDate']);
                                                    
                                                    echo get_time_ago( strtotime (".$time."))  ?>
                                             </p>
                                            <p class="comment">
                                                  <blockquote class="generic-blockquote"> <?php echo htmlentities($row['comment']);?> </blockquote>
                                            </p>
                                        </div>

                                      <?php } ?>
                                    </div>

                                </div>
                            </div>		                                      				
                        </div>
                        <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form name="Comment" method="post">
                                 <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />

                                <div class="form-group form-inline">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                  </div>										
                                </div>
                                
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="comment" placeholder="Comment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                </div>

                                   <button type="submit" class="submit_btn" name="submit">Post Comment</button>
                             
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <div class="input-group">

                                    <form name="search" action="search.php" method="post">
                                       <input type="text" class="form-control" name="searchtitle"  placeholder="Search Posts">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                        </span>  
                                    </form>
                                   
                                </div><!-- /input-group -->
                                <div class="br"></div>
                            </aside>
                           
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Latest Posts</h3>
                                <?php 

                                $query = mysqli_query($con, "select * FROM tblposts ORDER BY id DESC Limit 4");

                                while ($row=mysqli_fetch_array($query))
                                        {

                                 ?>
                                <div class="media post_item">
                                    <img src="admin/postimages/<?php echo $row['PostImage']  ?>" alt="post" width="50px"; >
                                    <div class="media-body">
                                        <a href="opinion-details.php?nid=<?php echo htmlentities($row['id'])?>"><h3> <?php echo $row['PostTitle'] ?> </h3></a>
                                       
                                            <p class="date">

                                                <?php 
                                                    $time =htmlentities($row['PostingDate']);
                                                    
                                                    echo get_time_ago( strtotime (".$time."))  ?>
                                             </p>
                                        
                                    </div>
                                </div>

                                <?php } ?>
                               
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget ads_widget">
                                <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">

                                
                                <h4 class="widget_title">Post Categories</h4>
                                <ul class="list cat-list">
                                    <?php 

                                        $query=mysqli_query($con, "select * FROM tblcategory");

                                        while ($row=(mysqli_fetch_array($query))) 
                                                {

                                 ?>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <?php echo $row['CategoryName'] ?>
                                           
                                        </a>
                                    </li>

                            <?php } ?>
                                    
                                   
                                    															
                                </ul>
                                <div class="br"></div>

                            </aside>
                           
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        
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
        <script src="js/mail-script.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>